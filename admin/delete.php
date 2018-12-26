<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "stdsystem";
$con=mysqli_connect($servername,$username,$password,$dbname);

$sql = " DELETE FROM staff_table WHERE `staff_id`= '".$_GET['del_id']."'";
mysqli_query($con,$sql);
header("Location: admin.user.php#dashboard");





?>