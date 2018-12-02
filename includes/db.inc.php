<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "stdsystem";



$con=mysqli_connect($servername,$username,$password,$dbname);

if(!$con)
{
    die('Connection Error'.mysqli_error());
}


?>