<?php
function UserCheck($UID,$UKY){
	# 核对用户信息
	if ($UID == '' || $UKY == '') {
		return FALSE;
	}
}
function MsgSafe($MSG){
	# 加密方式
	# 考虑自定义？
	return base64_decode($MSG);
}
?>