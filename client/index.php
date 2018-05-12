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

if($sn != '' && $pwd != ''){
    die("<script>location.href=\"lottery.php?sn=$sn&pwd=$pwd\";</script>");
}
?>
<!doctype html>
<!--Quite a few clients strip your Doctype out, and some even apply their own. Many clients do honor your doctype and it can make things much easier if you can validate constantly against a Doctype.-->
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>出貨高手大抽獎</title>

<!-- Please use an inliner tool to convert all CSS to inline as inpage or external CSS is removed by email clients -->
<!-- When use in Email please remove all comments as it is removed by Email clients-->
<!-- important in CSS is used to prevent the styles of currently inline CSS from overriding the ones mentioned in media queries when corresponding screen sizes are encountered -->

<style type="text/css">
body {
	margin: 0;
}
body, table, td, p, a, li, blockquote {
	-webkit-text-size-adjust: none!important;
	font-family: Merienda, 'Times New Roman', serif;
	font-style: normal;
	font-weight: 400;
}
button {
	width: 90%;
}
#bannerImg {
    width: 100%;
}
#lotteryImg {
    width: 100%;
}

@media screen and (max-width:600px) {
/*styling for objects with screen size less than 600px; */
body, table, td, p, a, li, blockquote {
	-webkit-text-size-adjust: none!important;
	font-family: Merienda, 'Times New Roman', serif;
}
table {
	/* All tables are 100% width */
	width: 100%;
}
.footer {
	/* Footer has 2 columns each of 48% width */
	height: auto !important;
	max-width: 48% !important;
	width: 48% !important;
}
table.responsiveImage {
	/* Container for images in catalog */
	height: auto !important;
	max-width: 30% !important;
	width: 30% !important;
}
table.responsiveContent {
	/* Content that accompanies the content in the catalog */
	height: auto !important;
	max-width: 66% !important;
	width: 66% !important;
}
.top {
	/* Each Columnar table in the header */
	height: auto !important;
	max-width: 48% !important;
	width: 48% !important;
}
.catalog {
	margin-left: 0%!important;
}
}

@media screen and (max-width:480px) {
/*styling for objects with screen size less than 480px; */
body, table, td, p, a, li, blockquote {
	-webkit-text-size-adjust: none!important;
	font-family: Merienda, 'Times New Roman', serif;
}
table {
	/* All tables are 100% width */
	width: 100% !important;
	border-style: none !important;
}
.footer {
	/* Each footer column in this case should occupy 96% width  and 4% is allowed for email client padding*/
	height: auto !important;
	max-width: 96% !important;
	width: 96% !important;
}
.table.responsiveImage {
	/* Container for each image now specifying full width */
	height: auto !important;
	max-width: 96% !important;
	width: 96% !important;
}
.table.responsiveContent {
	/* Content in catalog  occupying full width of cell */
	height: auto !important;
	max-width: 96% !important;
	width: 96% !important;
}
.top {
	/* Header columns occupying full width */
	height: auto !important;
	max-width: 100% !important;
	width: 100% !important;
}
.catalog {
	margin-left: 0%!important;
}
button {
	width: 90%!important;
}
}
</style>
</head>
<body>
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
                    <td align="center" style="font-size: 16px; font-weight:300; color: #929292; font-family: Merienda, 'Times New Roman', serif, sans-serif;">獎項清單</td>
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
						<table border="0"><tr><td colspan="2"><hr></hr></td></tr>
<?php 
    $rewards = $LotteryDB->executeSQL("SELECT name, msg, img, amount FROM rewards WHERE id <> 1 ORDER BY amount DESC");
    
    foreach ($rewards as $rwd){
        echo "<tr>";
        echo "<td width=\"30%\" rowspan=\"3\"><a border=\"0\" href=\"reward_images\\" . $rwd["img"] . "\" target=\"_blank\">";
        echo "<img src=\"reward_images\\" . $rwd["img"] . "\" style=\"width:100%; \">";
        echo "</a></td>";
        echo "<td><font size=\"2\" color=\"#000000\"><b>● " . $rwd["name"] . "</b></font></td>";
        if($rwd["amount"] > 0){
            echo "</tr><tr><td><font size=\"2\" color=\"#0000ff\">● 剩餘名額：" . $rwd["amount"] . "</font></td></tr>";
        }else{
            echo "</tr><tr><td><font size=\"2\" color=\"#ff0000\"><b>● 已兌換完畢</b></font></td></tr>";
        }
        echo "</tr><tr><td><font size=\"2\">" . $rwd["msg"] . "</font></td>";
        echo "</tr><tr><td colspan=\"2\"><hr></hr></td></tr>";
    }
?>
						</table>
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
              <!-- HTML spacer row -->
              <td style="font-size: 0; line-height: 0;" height="20"><table width="96%" align="left"  cellpadding="0" cellspacing="0">
                  <tr>
                    <td style="font-size: 0; line-height: 0;" height="20">&nbsp;</td>
                  </tr>
              </table></td>
            </tr>
            <tr bgcolor="#d0cfcf">
              <td bgcolor="#969696"><p style="font-size: 14px; font-style: normal; font-weight:normal; color: #ffffff; line-height: 1.6; text-align:justify;padding-top:10px; margin-left:20px; margin-right:20px; font-family: Merienda, 'Times New Roman', serif, sans-serif;">
			  <?php require_once("rule.php"); ?></p></td>
            </tr>
          </tbody>
        </table></td>
    </tr>
  </tbody>
</table>
</body>
</html>