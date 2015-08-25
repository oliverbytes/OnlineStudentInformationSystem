<?php

require_once("../initialize.php");

$response = new Response();

$username = $_POST["username"];
$password = $_POST["password"];

if(!User::username_exists($username))
{
	$user = new User();
	$user->username = $username;
	$user->password = $password;
	$user->create();

	if($user)
	{
		$response->status = "okay";
		$response->message = $user;
	}
	else
	{
		$response->status = "bad";
		$response->message = "Username or Password is invalid.";
	}
}
else
{
	$response->status = "bad";
	$response->message = "Username already exists";
}

echo json_encode($response);

class Response
{
	public $status 	= "okay";
	public $message = "";
}

?>