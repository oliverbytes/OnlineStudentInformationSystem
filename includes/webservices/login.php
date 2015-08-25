<?php

require_once("../initialize.php");

$response 	= new Response();

$username 	= $_POST["username"];
$password 	= $_POST["password"];

$user 		= User::login($username, $password);

if($user)
{
	$session->login($user);
	
	$response->json 	= $user;
	$response->status 	= "okay";
}
else
{
	$response->message 	= "Username or Password is invalid.";
	$response->status 	= "bad";
}

echo json_encode($response);

?>