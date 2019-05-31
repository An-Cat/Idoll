<?php
#############
# Idoll
# AI
# ————————
# AM
# 2019
#############
require '1.function.php';
require 'Idoll.class.php';
# 取用户ID
$UID = $_POST['UID'];
$UKY = $_POST['UKY'];
if (UserCheck($UID,$UKY) == FALSE) {
	exit('-0101');
}
# 取用户语言代码
$Language = $_POST['Language'];
# 判断语言代码
if ($Language > 102 || $Language < 100) {
	exit('-0102');//目前不支持您的语言。Sorry,Your language is not supported. ごめんねサポートされていない言語
}
# 取用户消息
$MSG = $_POST['MSG'];
if ($MSG == '') {
	exit('-0103');
}
# 解码消息
$MSG = MsgSafe($MSG);
# 判断消息
if (ctype_space($MSG)) {
	exit('-0104');
}
# 处理消息
$Idoll = new Idoll();
$Idoll -> UserInfo($UID,$UKY,$Language,$MSG);
if ($Idoll -> msg()) {
	exit();
}
exit('说的也是呢。');
?>