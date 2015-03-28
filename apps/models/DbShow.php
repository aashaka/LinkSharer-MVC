<?php

namespace Models;

class DbShow
{
	protected $db;

	public function __construct()
	{
		$this->db = self::getDB();

	}
	public static function getDB()
	{
		include '../../config/config.php';
		$dsn = 'mysql:dbname='.$config["database"].";host=".$config["host"];
		$user = $config["user"];
		$password = $config["password"];
		return new \PDO($dsn,$user,$password);
	}
	public static function get_links()
		{
			
			$db= self::getDB();
			$statement = 
				$db->prepare("SELECT * FROM links ORDER BY time desc");
			$statement->execute();
			$rows = array();

			$results = $statement ->fetchAll(\PDO::FETCH_ASSOC);
			foreach ($results as $result)
        	{
            	$row = array('username' => $result['username'],
                         'descrip' => $result['descrip'],
                         'time' => $result['time']);
            	array_push($rows, $row);
        	}
			return $rows;
		}

}
