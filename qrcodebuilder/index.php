<?php 
$PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'snqrcode'.DIRECTORY_SEPARATOR;

$PNG_WEB_DIR = 'snqrcode/';

include "phpqrcode/qrlib.php";
require_once 'ServerSetting.php';

if (!file_exists($PNG_TEMP_DIR))
    mkdir($PNG_TEMP_DIR);

$errorCorrectionLevel = 'M';
$matrixPointSize = 4;

$catcherURL = "http://candycatcher.ddns.net/";

$size = isset($_GET["size"]) ? $_GET["size"] : 0;
$batch = isset($_GET["batch"]) ? $_GET["batch"] : "";

$sql = "SELECT sn, pwd FROM sn_list WHERE reward = 0";
if($batch != ""){
    $sql = $sql . " AND batch_id = $batch";
}
$db_sn = $LotteryDB->executeSQL($sql);

if(count($db_sn) == 0){  //新建
    if($size == "" || $size == 0){
        die();
    }
    
    $txt = array("A","B","C","D","E","F","G","H","I","J",
                 "K","L","M","N","O","P","Q","R","S","T",
                 "U","V","W","X","Y","Z",
                 "0","1","2","3","4","5","6","7","8","9");
    $txt_count = count($txt);
    
    for($i=0 ; $i<$size ; $i++){
        $sn = "";
        do{
            $sn = "";
            for($j=0 ; $j<12 ; $j++){
                $sn = $sn . $txt[rand(0, $txt_count - 1)];
            }
            
            $test_sn = $LotteryDB->executeSQL("SELECT sn FROM sn_list WHERE sn = '$sn'");
        }while(count($test_sn) > 0);
        
        $pwd = "";
        for($j=0 ; $j<12 ; $j++){
            $pwd = $pwd . $txt[rand(0, $txt_count - 1)];
        }
        
        $data = array(
            "sn" => $sn,
            "pwd" => $pwd
        );
        
        $db_sn[$i] = $data;
        
        $LotteryDB->executeSQL("INSERT INTO sn_list (sn, pwd, batch_id) VALUES ('$sn', '$pwd', $batch)", false);
    }
}else{
    $size = count($db_sn);
}

echo "<table border='0'>\n";
$isEnd = false;
for($i=0 ; $i<$size ; $i++){
	if($i % 3 == 0 ){
        echo "<tr align='center'>"; 
    }
	$isEnd = false;
    $data = $catcherURL . "?sn=" . $db_sn[$i]["sn"] . "&pwd=" . $db_sn[$i]["pwd"];
    
    $filename = $PNG_TEMP_DIR . md5($data) . '.png';
    QRcode::png($data, $filename, $errorCorrectionLevel, $matrixPointSize, 2);
    
	echo "<td>使用手機掃描下方QRCode抽大獎!<br/>";
    echo '<img src="logo.png" height="148"><img src="' . $PNG_WEB_DIR.basename($filename).'" /></td>';
    if($i % 3 == 2 ){
        echo "</tr>\n"; 
		$isEnd = true;
    }
}
if($isEnd == false)
	echo "</tr>\n"; 
	
echo '</table>';
?>