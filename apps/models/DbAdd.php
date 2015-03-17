<?php

namespace Models;

class DbAdd
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
	public static function add_links($linkPosted,$username)
		{
			
			$db= self::getDB();
    		$stmt = $db->prepare("INSERT INTO links(descrip,username)
    		VALUES(:newLink , :username)");
    		$stmt->bindParam(':newLink', $linkPosted);
    		$stmt->bindParam(':username', $username);
    		$result = $stmt->execute(array(
				"newLink"=> $linkPosted,
				"username" => $username
				));
    		if ($result === TRUE)
					return 1;
   				else
     				return 0;
     	}
}