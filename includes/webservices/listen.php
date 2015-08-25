<?php

require_once("../initialize.php");

$response = "";

$userid = $_POST["userid"];

$messages = Message::get_all_by_userid($userid);

if(count($messages) > 0)
{
	$lastmessage = $messages[count($messages) - 1];

	$response = json_encode($lastmessage);

	$lastmessage->delete();
}
else
{
	$response = "No messages in queue.";
}

echo $response;

?>