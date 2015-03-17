<?php
namespace Controllers;
session_start();

use Models\Login;
use Models\DbShow;
class LoginController
{
	protected $twig;
	public function __construct()
	{
		$loader = new \Twig_Loader_Filesystem(__DIR__ . '/../views');
		$this -> twig = new \Twig_Environment($loader);
	}
	
	
	public function get()
	{
			echo $this->twig->render("login.html", array(
			"title" => "Login"
			));			
	}

	public function post()
	{
		$username = $_POST['username'];
		$password = hash('sha256', $_POST['password']);
		Login::valid($username,$password);
		//$rows=DbShow::get_links();
		if(isset($_SESSION['username']))
		{
			echo $this->twig->render("home.html", array(
			"username" => $_SESSION['username']
			));	
		}
		else
		{
			echo $this->twig->render("index.html",array("links" => $rows,
														"try" =>1
														));	
		}
	}
}
