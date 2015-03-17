<?php
namespace Controllers;
session_start();

use Models\Logout;
class LogoutController
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
		Logout::logout();	
	}
}
