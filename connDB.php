<?php

$sname= "localhost";
$unmae= "root";
$password = "123456";

$db_name = "library";
//$conn = mysqli_connect($sname, $unmae, $password, $db_name);
$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}