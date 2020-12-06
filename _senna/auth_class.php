<?php

class Auth
{
	function checkSession()
	{
		session_start();

		if( isset($_SESSION['be_user']) && !empty($_SESSION['be_user']) )
		{
			return array(
				'status'=> true,
				'token'	=> $_SESSION['be_user'],
			);
		}
		else
		{
			return array(
				'status'=> false,
				'token'	=> '',
			);
		}
	}

	function GetResponse($action)
	{
		switch($action)
		{
			case "check":
				return $this->checkSession();
			break;
		}
	}
}