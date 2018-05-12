<?php
require_once 'ServerSetting.php';

$sn = $_POST["sn"];
$pwd = $_POST["pwd"];
$userName = $_POST["userName"];
$userPhone = $_POST["userPhone"];

$conn = $LotteryDB->createNewConnect();
$stmt = $conn->prepare("UPDATE sn_list SET userName = ?, userPhone = ? WHERE sn = ? AND pwd = ?");
$stmt->bind_param("ssss", $userName, $userPhone, $sn, $pwd);
$stmt->execute();
$stmt->close();
$conn->close();

?>
<script>location.href="lottery.php?sn=<?php echo $sn; ?>&pwd=<?php echo $pwd; ?>";</script>