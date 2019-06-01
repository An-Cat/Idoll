<?php
# 本页为一些基本函数。
# 本页错误代码 -02xx
# 例如：-0201 -0202 -0203
# 请按照顺序输出错误代码
# 
function MsgSafe($MSG){
	# 加密方式
	# 考虑自定义？
	return base64_decode($MSG);
}
?>