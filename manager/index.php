<html>
<head>
<title>CatcherLotteryManagement</title>
</head>
<body>
<?php 
require_once 'ServerSetting.php';

$useDate = "2018-01-01";
if(isset($_GET["useTime"])){
    $useDate = $_GET["useTime"];
}
?>
<div align="center"><br/>
<form>
日期：<input type="date" name="useTime" value="<?php echo $useDate; ?>"> <input type="submit" value=" 查詢 ">
</form>
<br/>
<?php 
    $temp = $LotteryDB->executeSQL("SELECT IFNULL(COUNT(sn), 0) AS countSn FROM sn_list WHERE reward != 0 AND sn_list.useDate > '$useDate'");
    $countSn = $temp[0]["countSn"];
    
    $reward_data = $LotteryDB->executeSQL("
        SELECT `userName`, `userPhone`, rewards.name as rewardName,
        useDate FROM `sn_list`
        LEFT JOIN rewards ON sn_list.reward = rewards.id
        WHERE rewards.id > 1 AND sn_list.useDate > '$useDate'
        ORDER BY sn_list.useDate DESC
    ");
    
    $countReward = count($reward_data);
?>
期間已使用序號共 <?php echo $countSn ?> 組，共中獎 <?php echo $countReward;?> 組
<br/>
<br/>
<table border="1" width="800">
<tr align="center" bgcolor="#000000" style="color: #ffffff;"><td>中獎人</td><td>連絡電話</td><td>中獎品項</td><td>中獎時間</td></tr>
<?php 
foreach($reward_data as $key => $row){
    echo "<tr><td>" . $row["userName"] . "</td><td>" . $row["userPhone"] . "</td><td>" . $row["rewardName"] . "</td><td>" . $row["useDate"] . "</td></tr>";
}
?>
</table>
</div>
</body>
</html>