<?php
/**
 * Idoll
 */
class Idoll{
	public $Error;
	private $dblink;
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
		# code...
	}
	public function msg()
	{
		# code...
	}
}
?>