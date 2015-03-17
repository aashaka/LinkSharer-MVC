<?php

namespace Models;

class Login
{
	protected $db;

	public function __construct()
	{
		$this->db = self::getDB();

	}
	public static function getDB()
	{
		include 'config.php';
		$dsn = 'mysql:dbname='.$config["database"].";host=".$config["host"];
		$user = $config["user"];
		$password = $config["password"];
		return new \PDO($dsn,$user,$password);
	}
	public static function valid($username,$password_hash)
		{
				$db= self::getDB();
				$statement = 
					$db->prepare("SELECT * FROM verification WHERE username = (:username) AND password_hash = (:password_hash)");
				$statement->execute(array(
									"username" => $username,
									"password_hash" => $password_hash
									));
				if($rows = $statement ->fetchAll(\PDO::FETCH_ASSOC))
					$_SESSION['username']=$username;
				return;
		}
}