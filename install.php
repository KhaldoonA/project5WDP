<?php

require "connect.php";
try 
{
	$connection = new PDO("mysql:host=$host", $username, $password, $options);
	$sql = file_get_contents("data/contacts.sql");
	$connection->exec($sql);
	
	echo "Database and table users added successfully.";
}
catch(PDOException $error)
{
	echo $sql . "<br>" . $error->getMessage();
}