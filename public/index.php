<?php
session_start();
require_once __DIR__ . "/../vendor/autoload.php";

Toro::serve(array(
	"/" => "Controllers\\HomeController",
	"/login" => "Controllers\\LoginController",
	"/register" => "Controllers\\RegisterController",
	"/display" => "Controllers\\DisplayController",
	"/logout" => "Controllers\\LogoutController"
	//Equivalent to writing include 'HomeController.php'
	));
