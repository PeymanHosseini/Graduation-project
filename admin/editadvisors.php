<?php

//Database Connection
include '../includes/db.inc.php';

//Update Information
if(isset($_POST['btn-update'])){
 $name = $_POST['name'];
 $status="active";
 $update = "UPDATE student_table SET `staff_id` = '$name',`status` = '$status' WHERE `std_id`='".$_GET['edit2_id']."'";
 $up = mysqli_query($con, $update);

 header("location: advisors.php#dashboard");
 
}
?>
<!--Create Edit form -->
<!doctype html>
<html>
<body>
<form method="post">
<h1>Asign Advisor to Student</h1>
<label>staff ID: </label><input type="text" name="name" placeholder="ID" ><br/><br/>

<button type="submit" name="btn-update" id="btn-update" onClick="update()"><strong>Update</strong></button>
<a href="advisors.php#dashboard"><button type="button" value="button">Cancel</button></a>
</form>
<!-- Alert for Updating -->
<script>
function update(){
 var x;
 if(confirm("Updated data Sucessfully") == true){
 x= "update";
 }
}
</script>
</body>
</html>