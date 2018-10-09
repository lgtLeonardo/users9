<?php

/**
 * 
 */
class Connection
{
	private static $conn;
	
	public static function openConnection(){
		include_once 'Constant.inc.php';

		if (!isset(self::$conn)) {
			# code...
			try{
				self::$conn = new PDO('mysql:dbname=' . DB_NAME . ';host=' . DB_HOST, DB_USER, DB_PASSWORD);
				self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				self::$conn->exec("SET CHARSET utf8");
				return self::$conn;
			}catch(PDOException $e){
				echo 'Connection Failure :' . $e->getMessage();
				die();
			}
		}
	}


	public static function getConnection(){
		return self::$conn;
	}

	public static function close(){
		if (isset(self::$conn)) {
			# code...
			self::$conn = null;
		}
	}
}