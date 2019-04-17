<?php
class DbUtil{
	public static $loginUser = "ram8yx_b"; 
	public static $loginPass = "Reset123";
	public static $host = "mysql.cs.virginia.edu"; // DB Host
	public static $schema = "ram8yx"; // DB Schema
	
	public static function loginConnection(){
		$db = new mysqli(DbUtil::$host, DbUtil::$loginUser, DbUtil::$loginPass, DbUtil::$schema);
	
		if($db->connect_errno){
			echo("Could not connect to db");
			$db->close();
			exit();
		}
		
		return $db;
	}
	
}
?>
