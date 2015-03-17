<?php

namespace Models;

class Logout
{
	public static function logout()
		{
			session_unset();
			session_destroy();
			header('Location: /');
		}
}