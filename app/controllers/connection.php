<?php

$host = "db4free.net";
$username = "radelacruz";
$password = "#Inc0rrect";
$dbname = "razelle";

//establish connection to our database
$conn = mysqli_connect($host,$username,$password,$dbname);

if(!$conn){
	die('Connection Failed: ' . mysql_error($conn) );
}
// echo 'Connected successfully!';




?>