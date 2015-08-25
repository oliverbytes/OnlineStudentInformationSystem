<?php

require_once("includes/initialize.php");

$session->logout();

header("location: login.php");

?>