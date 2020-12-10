<?php
	// Database configuration
	$dbHost     = "localhost";
	$dbUsername = "root";
	$dbPassword = "gatotaca66";
	$dbName     = "usersdb";

	// Create database connection
	$con = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);

	// Check connection
	if (!$con) {
	    die("Connection failed: " .mysqli_connect_error());
	}
