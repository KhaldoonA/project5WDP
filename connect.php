<?php

$host       = "localhost";
$username   = "khaldoon123";
$password   = "";
$dbname     = "contacts";
$dsn        = "mysql:host=$host;dbname=$dbname";
$options    = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
              );