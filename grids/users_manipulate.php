<?php

require_once("../includes/initialize.php");

global $session;

if($_POST['oper']=='add')
{
	$user 			  = new User();
	$user->level   	  = $_POST['level'];
	$user->name 	  = $_POST['name'];
	$user->username   = $_POST['username'];
	$user->password   = $_POST['password'];
	$user->datetime   = $_POST['datetime'];
	$user->create();
}
else if($_POST['oper']=='edit')
{
	$user 			  = User::get_by_id($_POST['id']);
	$user->level   	  = $_POST['level'];
	$user->name 	  = $_POST['name'];
	$user->username   = $_POST['username'];
	$user->password   = $_POST['password'];
	$user->datetime   = $_POST['datetime'];
	$user->update();
}
else if($_POST['oper']=='del')
{
	if($_POST['id'] != $session->user_id)
	{
		User::get_by_id($_POST['id'])->delete();
	}
}

?>