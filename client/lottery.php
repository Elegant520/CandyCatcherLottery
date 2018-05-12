<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

require_once 'ServerSetting.php';

$sn = '';
if(isset($_GET["sn"])){
    $sn = $_GET["sn"];
}

$pwd = '';
if(isset($_GET["pwd"])){
    $pwd = $_GET["pwd"];
}

//for debug

$conn = $LotteryDB->createNewConnect();
$stmt = $conn->prepare("SELECT reward, userName, userPhone, useDate FROM sn_list WHERE sn = ? AND pwd = ?");
$stmt->bind_param("ss", $sn, $pwd);
$stmt->execute();

$stmt->bind_result($rewardId, $userName, $userPhone, $useDate);
$rs = $stmt->fetch();
$stmt->close();
$conn->close();

if(!$rs){
    $sn = "";
    $isUsedSn = true;
    $isGetReward = false;
    $isWriteUserData = false;
}else{
    $isUsedSn = ($rewardId != 0);
    
    if($isUsedSn){
        $isGetReward = ($rewardId != 1);
        if($isGetReward){
            $rewardData = $LotteryDB->executeSQL("SELECT id, name, img, getRate FROM rewards WHERE id = $rewardId");
            $rewardData = $rewardData[0];
        }
    } else {
        //sn還沒用過,進行抽獎機率運算
        $totalRate = 0;
        $rewards = $LotteryDB->executeSQL("SELECT id, name, img, getRate FROM rewards WHERE amount > 0");
        $reward_size = count($rewards);
        
        if($reward_size == 0){
            die("<script>alert('噢！獎項全部被抽光囉，來的太慢啦！敬請期待下次的活動唷~');</script>");
        }
        
        for($i=0;$i<$reward_size;$i++){
            $totalRate += $rewards[$i]["getRate"];
            $rewards[$i]["getRate"] = $totalRate;
        }
        
        $totalRate = $totalRate * 5;    //5分之一的機率中獎
        
        $idx = rand(0, $totalRate);
        
        $rewardId = 1;
        for($i=0;$i<$reward_size;$i++){
            if($idx <= $rewards[$i]["getRate"]){
                $rewardId = $rewards[$i]["id"];
                $rewardData = $rewards[$i];
                break;
            }
        }
        
        $isGetReward = ($rewardId != 1);
        if($isGetReward){
            $LotteryDB->executeSQL("UPDATE rewards SET amount = amount - 1 WHERE id = $rewardId", false);
        }
        
        $conn = $LotteryDB->createNewConnect();
        $stmt = $conn->prepare("UPDATE sn_list SET reward = ?, useDate = NOW() WHERE sn = ? AND pwd = ?");
        $stmt->bind_param("iss", $rewardId, $sn, $pwd);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }
    
    if($isGetReward){
        $isWriteUserData = ($userName != "" && $userPhone != "");
    }
}
?>
<!doctype html>
<!--Quite a few clients strip your Doctype out, and some even apply their own. Many clients do honor your doctype and it can make things much easier if you can validate constantly against a Doctype.-->
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>出貨高手大抽獎</title>
<link rel="stylesheet" type="text/css" href="main.css">
</head>

<script src="https://code.createjs.com/createjs-2015.11.26.min.js"></script>
<?php 
if($isGetReward){
    echo "<script src=\"images/Roulette_R.js\"></script>";
}else{
    echo "<script src=\"images/Roulette_W.js\"></script>";
}
?>

<script>
var canvas, stage, exportRoot, anim_container, dom_overlay_container, fnStartAnimation;
var bRoulettePlayEnd = true;
function init() {
	<?php if($sn != ""){ ?>
	if(<?php echo ( $isUsedSn ? "true" : "false") ?>){
		if(<?php echo ( $isGetReward ? "true" : "false") ?>){
			document.getElementById("rouletteFormDiv").innerHTML = document.getElementById("userDataDiv").innerHTML;
		}else{
			document.getElementById("rouletteFormDiv").innerHTML = "<br/><br/><br/>很可惜，這張QRCode序號沒有中獎，趕快再去蒐集！<br/><br/><br/><br/>";
		}
	}else{
		canvas = document.getElementById("canvas");
		anim_container = document.getElementById("animation_container");
		dom_overlay_container = document.getElementById("dom_overlay_container");
		var comp=AdobeAn.getComposition("6CDB229C4C56E24CA273329784E09E86");
		var lib=comp.getLibrary();
		var loader = new createjs.LoadQueue(false);
		loader.addEventListener("fileload", function(evt){handleFileLoad(evt,comp)});
		loader.addEventListener("complete", function(evt){handleComplete(evt,comp)});
		var lib=comp.getLibrary();
		loader.loadManifest(lib.properties.manifest);

		bRoulettePlayEnd = false;
	}
	<?php } ?>
}
function handleFileLoad(evt, comp) {
	var images=comp.getImages();	
	if (evt && (evt.item.type == "image")) { images[evt.item.id] = evt.result; }	
}
function handleComplete(evt,comp) {
	//This function is always called, irrespective of the content. You can use the variable "stage" after it is created in token create_stage.
	var lib=comp.getLibrary();
	var ss=comp.getSpriteSheet();
	var queue = evt.target;
	var ssMetadata = lib.ssMetadata;
	for(i=0; i<ssMetadata.length; i++) {
		ss[ssMetadata[i].name] = new createjs.SpriteSheet( {"images": [queue.getResult(ssMetadata[i].name)], "frames": ssMetadata[i].frames} )
	}
	exportRoot = new lib.Roulette();
	stage = new lib.Stage(canvas);	
	//Registers the "tick" event listener.
	fnStartAnimation = function() {
		stage.addChild(exportRoot);
		createjs.Ticker.setFPS(lib.properties.fps);
		createjs.Ticker.addEventListener("tick", stage);
	}	    
	//Code to support hidpi screens and responsive scaling.
	function makeResponsive(isResp, respDim, isScale, scaleType) {		
		var lastW, lastH, lastS=1;		
		window.addEventListener('resize', resizeCanvas);		
		resizeCanvas();		
		function resizeCanvas() {			
			var w = lib.properties.width, h = lib.properties.height;			
			var iw = window.innerWidth, ih=window.innerHeight;			
			var pRatio = window.devicePixelRatio || 1, xRatio=iw/w, yRatio=ih/h, sRatio=1;			
			if(isResp) {                
				if((respDim=='width'&&lastW==iw) || (respDim=='height'&&lastH==ih)) {                    
					sRatio = lastS;                
				}				
				else if(!isScale) {					
					if(iw<w || ih<h)						
						sRatio = Math.min(xRatio, yRatio);				
				}				
				else if(scaleType==1) {					
					sRatio = Math.min(xRatio, yRatio);				
				}				
				else if(scaleType==2) {					
					sRatio = Math.max(xRatio, yRatio);				
				}			
			}			
			canvas.width = w*pRatio*sRatio;			
			canvas.height = h*pRatio*sRatio;
			canvas.style.width = dom_overlay_container.style.width = anim_container.style.width =  w*sRatio+'px';				
			canvas.style.height = anim_container.style.height = dom_overlay_container.style.height = h*sRatio+'px';
			stage.scaleX = pRatio*sRatio;			
			stage.scaleY = pRatio*sRatio;			
			lastW = iw; lastH = ih; lastS = sRatio;            
			stage.tickOnUpdate = false;            
			stage.update();            
			stage.tickOnUpdate = true;		
		}
	}
	makeResponsive(false,'both',false,1);	
	AdobeAn.compositionLoaded(lib.properties.id);
	fnStartAnimation();
}

function showRouletteResult(){
	bRoulettePlayEnd = true;
	var isGetReward = <?php echo ($isGetReward ? "true" : "false"); ?>;
	if(isGetReward){
		alert("恭喜您中獎了！");

		document.getElementById("rouletteFormDiv").innerHTML = document.getElementById("userDataDiv").innerHTML;
	}else{
		alert("太可惜了，這次沒中，趕快再去蒐集QRCode序號紙進行抽獎吧！");
	}
}

function toRewardListPage(){
	if(!bRoulettePlayEnd && !confirm("您還沒有玩轉轉樂呢!\n就這樣跳轉頁面的話系統會直接幫您抽獎唷，\n確定要讓系統自動幫您抽獎？")){
		return;
	}
	location.href = "index.php";
}
</script>

<body onload="init();">
<table width="100%"  cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td><table width="600"  align="center" cellpadding="0" cellspacing="0">
          <!-- Main Wrapper Table with initial width set to 60opx -->
          <tbody>
            <tr> </tr>
            <tr> 
              <!-- HTML Spacer row -->
              <td style="font-size: 0; line-height: 0;" height="20"><table width="96%" align="left"  cellpadding="0" cellspacing="0">
                  <tr>
                    <td style="font-size: 0; line-height: 0;" height="20">&nbsp;</td>
                  </tr>
                </table></td>
            </tr>
            <tr> 
              <!-- HTML IMAGE SPACER -->
              <td style="font-size: 0; line-height: 0;" height="20"><table align="left"  cellpadding="0" cellspacing="0" >
                  <tr>
                    <td align="center"><img src="images/banner.jpg" id="bannerImg"></td>
                  </tr>
                </table></td>
            </tr>
            <tr> 
              <!-- HTML Spacer row -->
              <td style="font-size: 0; line-height: 0;" height="20"><table width="96%" align="left"  cellpadding="0" cellspacing="0">
                  <tr>
                    <td style="font-size: 0; line-height: 0;" height="20">&nbsp;</td>
                  </tr>
                </table></td>
            </tr>
            <tr> 
              <!-- Introduction area -->
              <td><table width="100%"  align="left" cellpadding="0" cellspacing="0">
                  <tr> 
                    <!-- row container for TITLE/EMAIL THEME -->
                    <td align="center" style="font-size: 32px; font-weight: 300; line-height: 2.5em; color: #929292; font-family: Merienda, 'Times New Roman', serif, sans-serif;">出貨高手大抽獎</td>
                  </tr>
                  <tr> 
                    <!-- row container for Tagline -->
                    <td align="center" style="font-size: 16px; font-weight:300; color: #929292; font-family: Merienda, 'Times New Roman', serif, sans-serif;">Catcher Lottery</td>
                  </tr>
                  <tr>
                    <td style="font-size: 0; line-height: 0;" height="20"><table width="96%" align="left"  cellpadding="0" cellspacing="0">
                        <tr> 
                          <!-- HTML Spacer row -->
                          <td style="font-size: 0; line-height: 0;" height="20">&nbsp;</td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr> 
                    <!-- Row container for Intro/ Description -->
                    <td align="left" style="font-size: 24px; font-style: normal; font-weight: 100; color: #929292; line-height: 1.2; text-align:justify; padding:10px 20px 0px 20px; font-family:Merienda, 'Times New Roman', serif, sans-serif;">
						恭喜您夾取到您想要的物品，為了感謝您惠顧本機台，我們在這裡提供您額外抽獎的機會，獎品項目眾多，祝您中獎！
					</td>
                  </tr>
                </table></td>
            </tr>
            <tr> 
              <!-- HTML Spacer row -->
              <td style="font-size: 0; line-height: 0;" height="10"><table width="96%" align="left"  cellpadding="0" cellspacing="0">
                  <tr>
                    <td style="font-size: 0; line-height: 0;" height="20">&nbsp;</td>
                  </tr>
                </table></td>
            </tr>
            <tr>
              <td align="center" style="font-size: 18px; line-height: 1.8; color: #929292; font-family: Merienda, 'Times New Roman', serif, sans-serif;">
				<?php 
				if($sn == '' || $pwd == ''){
				    echo "<br/><br/><br/><font color=\"#ff0000\"><b>";
				    echo "您還沒拿到抽獎用的QRCode序號紙嗎？<br/>";
				    echo "快去玩玩我們的機台以獲得抽獎機會吧！</b></font>";
				    echo "<br/><br/><br/><br/><br/>";
				}else{
				?>
				<form name="rouletteForm" method="post">
					<input id="readedRule" type="checkbox" checked><font size="2">我已閱讀完下方注意事項並且願意遵守規則</font>
					<div id="rouletteFormDiv" style="width: 80%">
						<div id="animation_container" style="background-color:rgba(255, 255, 255, 1.00); ">
                    		<canvas id="canvas" style="position: absolute; display: block; background-color:rgba(255, 255, 255, 1.00);"></canvas>
                    		<div id="dom_overlay_container" style="pointer-events:none; overflow:hidden; position: absolute; left: 0px; top: 0px; display: block;">
                    		</div>
                    	</div>
					</div>
				</form>
				<?php } ?>
				<div onclick="toRewardListPage()"><u><font color="#0000ff">&gt;&gt; 獎品項目一覽 &lt;&lt;</font></u></div>
			  </td>
            </tr>
            <tr> 
              <!-- HTML spacer row -->
              <td style="font-size: 0; line-height: 0;" height="20"><table width="96%" align="left"  cellpadding="0" cellspacing="0">
                  <tr>
                    <td style="font-size: 0; line-height: 0;" height="20">&nbsp;</td>
                  </tr>
              </table></td>
            </tr>
            <tr bgcolor="#d0cfcf">
              <td bgcolor="#969696"><p style="font-size: 14px; font-style: normal; font-weight:normal; color: #ffffff; line-height: 1.6; text-align:justify;padding-top:10px; margin-left:20px; margin-right:20px; font-family: Merienda, 'Times New Roman', serif, sans-serif;">
				<?php require_once("rule.php");?></p></td>
            </tr>
          </tbody>
        </table></td>
    </tr>
  </tbody>
</table>
<div id="userDataDiv" style="display: none;">
<?php if($isGetReward){ ?>
<form id="userDataForm" name="userDataForm">
恭喜您獲得了：<br/><?php echo $rewardData["name"]; ?><br>
<img src="reward_images/<?php echo $rewardData["img"];?>" style="width:100%"><br>
您的姓名：<input type="text" name="userName" value="<?php echo $userName; ?>" <?php if($isWriteUserData) echo "disabled"; ?> maxlength="30"><br/>
聯絡電話：<input type="tel" name="userPhone" value="<?php echo $userPhone; ?>" <?php if($isWriteUserData) echo "disabled"; ?> maxlength="15"><br/>
<input type="hidden" name="sn" value="<?php echo $sn; ?>"><input type="hidden" name="pwd" value="<?php echo $pwd; ?>"><br/>
<?php 
if($isWriteUserData) {
    echo "<div align=\"left\">在您中獎後填完資料的三個工作日內工作人員將會與您連絡洽談領獎事宜，請您將此QRCode序號紙妥善保留以利工作人員比對中獎資料。</div>";
}else {
    echo "<input type=\"button\" value=\"送出領獎資料\" style=\"width:150px; height:60px;\" onclick=\"sendUserData(this.form);\">";
}
?>
<br/><br/>
</form>
<script>
function sendUserData(form){
	var name = form.userName.value;
	var phone = form.userPhone.value;
	if(!document.getElementById("readedRule").checked){
		alert("請先閱讀下方注意事項並確認勾選");
	}else if(name == ""){
		alert("請填入您的大名!");
	}else if(phone == ""){
		alert("請填入您的聯絡電話!");
	}else if(confirm("以下是您填入的領獎資料：\n姓名："+name+"\n聯絡電話："+phone+"\n確認無誤?")){
		form.method = "post";
		form.action = "writeUserData.php";
		form.submit();
	}
}
</script>
<?php } ?>
</div>
</body>
</html>
