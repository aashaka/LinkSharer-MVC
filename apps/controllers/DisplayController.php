<?php
namespace Controllers;
session_start();

use Models\DbShow;
use Models\DbAdd;
class DisplayController
{
	protected $twig;
	public function __construct()
	{
		$loader = new \Twig_Loader_Filesystem(__DIR__ . '/../views');
		$this -> twig = new \Twig_Environment($loader);
	}
	
	// $_SERVER['REQUEST _METHOD']. Accordingly, calls function
	public function get()
	{
		$rows=DbShow::get_links();
		return $rows;	
	}
	public function post_xhr()
	{
		$this->display();
	}
	public function post()
	{
		$linkPosted=$_POST['newLink'];
		$username = $_SESSION['username'];
		DbAdd::add_links($linkPosted, $username);
	}
	public function display()
	{
		$linkPosted = $_POST['newLink'];
		$username = $_SESSION['username'];
		if($linkPosted)
		{
			DbAdd::add_links($linkPosted, $username);
		}	
		$rows = DbShow::get_links();
		//var_dump($rows);
		echo json_encode($rows);
	}
}
