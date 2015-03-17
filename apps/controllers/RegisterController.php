<?php
namespace Controllers;

use Models\Register;
class RegisterController
{
	protected $twig;
	public function __construct()
	{
		$loader = new \Twig_Loader_Filesystem(__DIR__ . '/../views');
		$this -> twig = new \Twig_Environment($loader);
	}
	public function get()
	{
			echo $this->twig->render("register.html", array(
			"title" => "Register"
			));			
	}

	public function post()
	{
		$flag = Register::register();
		if($flag==true)
		{
			$_SESSION['username'] = $_POST['username'];
		}
		header('Location: /');
	}
}
