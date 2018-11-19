<?php
	
	/* Connecting to database */

    $host     = "localhost"; //host ip
    $username = "admin"; //username of database
    $password = "123";  //db user password
    $database = "bevy";  //database name

    //establishing connecting to db
    $conn = new mysqli($host, $username, $password, $database);
    mysqli_query($conn, "SET NAMES utf8");  //set charset for database and server

    //if something went wrong during connection to db
    if ($conn->connect_error)
       die("Connection failed: " . $conn->connect_error);
?>
