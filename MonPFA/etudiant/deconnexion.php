<?php
	session_start();
	session_destroy();
	header("location:http://localhost/MonPFA/home/login.php");
?>