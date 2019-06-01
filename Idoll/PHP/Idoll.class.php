<?php
/**
 * Idoll
 */
class Idoll{
	public $Error;
	private $dblink , $UID,$UKY,$Language,$MSG;
	function __construct()
	{
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
			return false;
		}
		$this -> dblink -> set_charset('utf8');
		return ture;
	}
	public function UserInfo($UID,$UKY,$Language,$MSG)
	{
		$this -> UID = $UID;
		$this -> UKY = $UKY;
		$this -> Language = $Language;
		$this -> MSG = $MSG;
	}
	public function msg()
	{
		# code...
	}
}
?>