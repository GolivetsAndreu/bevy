<?php
	
	/* If user logging out */

	session_start();  //start session 
	session_destroy();  //finish session
	header('Location: /dev/index.php');  //jump to main registration page
?>