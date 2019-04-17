<?php
class DbUtil{
	public static $loginPass = "Reset123";
	public static $host = "mysql.cs.virginia.edu"; // DB Host
	public static $schema = "ram8yx"; // DB Schema
	
	public static function loginConnection($permission){
		
		$db = new mysqli(DbUtil::$host, $permission, DbUtil::$loginPass, DbUtil::$schema);

		if($db->connect_errno){
			echo("Could not connect to db");
			$db->close();
			exit();
		}
		
		return $db;
	}
	
}
?>
