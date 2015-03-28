<?php

namespace Models;

class Register
{
	protected $db;

	public function __construct()
	{
		$this->db = self::getDb(); 
	}

	public static function getDb()
	{
		include '../../config/config.php';
		$dsn = 'mysql:dbname='.$config["database"].";host=".$config["host"];
		$user = $config["user"];
		$password = $config["password"];
		return new \PDO($dsn,$user,$password);
	}
	public static function register()
		{
			$user=$_POST['username'];
			$pass=hash('sha256', $_POST['password']);
			$mail=$_POST['mail'];

			$db= self::getDB();
    		$stmt = $db->prepare("INSERT INTO verification(username,password_hash,email)
    		VALUES(:user , :pass , :mail)");
    		$result = $stmt->execute(array(
				"user" => $user,
				"pass" => $pass,
				"mail" => $mail
				));
			if ($result === TRUE) 
				return true;
			else
				return false;
			
		}
}
