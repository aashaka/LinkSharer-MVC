<?php
namespace Controllers;
//session_start();

use Models\DbShow;
class HomeController
{
	protected $twig;
	public function __construct()
	{
		$loader = new \Twig_Loader_Filesystem(__DIR__ . '/../views');
		$this -> twig = new \Twig_Environment($loader);
	}
	
	public function get()
	{
		
		$rows=DbShow::get_links();
		if(isset($_SESSION['username']))
		{
			echo $this->twig->render("home.html", array(
			"username" => $_SESSION['username'],
			"links" => $rows));	
		}
		else
		{
			echo $this->twig->render("index.html",array("links" => $rows,
														"try" => 0));	
		}
		
	}
}
