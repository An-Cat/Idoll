<?php
# Idoll处理主页
# ————————
# 本页错误代码 -03xx
# 例如 -0300 -0301 -0302
# 请按照顺序输出错误代码
# ————————
# LAST EDIT : AM
# ————————
/**
 * Idoll
 */
class Idoll{
	public $Error;
	private $dblink,$UID,$UKY,$Language,$MSG;
	function __construct()
	{
		# 初始化
		$this -> linkdb();
	}
	private function linkdb()
	{
		$dbname = '';
		$dbpass = '';
		$dbhost = '';
		$dbbase = '';
		$this -> dblink = new mysqli($dbhost,$dbname,$dbpass,$dbbase);
		if($this -> dblink -> connect_errno){
			$this -> Error = 'db link error:'.$this -> dblink -> connect_error;
			exit('0301');
		}
		$this -> dblink -> set_charset('utf8');
	}
	public function UserInfo($UID,$UKY,$Language,$MSG)
	{
		if ($UID == '' || $UKY == '') {
			exit('0302');
		}
		# 赋值到类变量
		$this -> UID = $UID;
		$this -> UKY = $UKY;
		$this -> Language = $Language;
		if ($this -> Language == '100') {
			date_default_timezone_set('PRC');
		}elseif ($this -> Language == '101') {
			date_default_timezone_set('UTC');
		}elseif ($this -> Language == '102') {
			date_default_timezone_set('Japan');
		}
		$this -> MSG = $MSG;
	}
	private function UserCheck()
	{
		# 只做一个演示
		# 
		$key = hash('sha512', md5($this -> UID).'?UserToken?'.md5(date('Y-m-d-H-i')),false);
		if ($key !== $this -> UKY) {
			exit('-0303');
		}
	}
	public function msg()
	{
		# 核对用户信息
		# 动态密匙验证
		UserCheck();
		# 处理消息
		if ($this -> MSG == '') {
			exit('0301');
		}
	}
	private function RDBD($sql,$pn,$data)
	{
		$stmt = $this -> dblink -> prepare($sql);
		$stmt -> bind_param($pn, $data);
		$stmt -> execute();
		$result = $stmt -> get_result();
		$row = $result -> fetch_assoc();
		return $row;
	}
	function __destruct(){
		if ($this -> dblink) {
			$this -> dblink -> close();//释放Mysqli
		}
	}
}
?>