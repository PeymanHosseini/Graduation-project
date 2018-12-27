<?php
include '../includes/db.inc.php';

$sql = " DELETE FROM staff_table WHERE `staff_id`= '".$_GET['del_id']."'";
mysqli_query($con,$sql);
header("Location: admin.user.php#dashboard");





?>