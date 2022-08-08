<?php

	global $install;
	global $con;

	$hostname = 'localhost'; 	// Host Name
	
	$user = 'root'; // username of host
	
	$password = ''; // password of host
	
	$dbname = 'dbmsproject'; 	//database name
	
	$blogname = 'HelloWorld'; // Name of Your Blog
	
	$admin = 'admin';  	// blog admin username for login
	
	$adminpass = 'admin';  // password for blog admin
			
	$con = new mysqli($hostname,$user,$password,$dbname);
	if (mysqli_connect_errno())
		{
	  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  		die();
	  	}
	
	
	require_once('libs/fetchdata.php');
	require_once('head.php');

	if($install != 1)
	{
		require_once('allTables.php');
		$install = 1;
	}

?>