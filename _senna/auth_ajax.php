<?php

if( isset($_GET['action']) && $_GET['action'] == 'startsession' && isset($_GET['token']) )
{
	session_start();

	$_SESSION["be_user"] = $_GET['token'];

	echo true;
}

if( isset($_GET['action']) && $_GET['action'] == 'gettoken' )
{
	session_start();

	print_r($_SESSION["be_user"]);
}