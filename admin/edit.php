<?php

//Database Connection
include '../includes/db.inc.php';
//Get ID from Database
if(isset($_GET['edit_id'])){
 $sql = "SELECT * FROM staff_table WHERE staff_id =" .$_GET['edit_id'];
 $result = mysqli_query($con, $sql);
 $row = mysqli_fetch_array($result);
}
//Update Information
if(isset($_POST['btn-update'])){
 $name = $_POST['name'];
 $fname = $_POST['fname'];
 $email = $_POST['email'];
 $office = $_POST['office'];
 $level = $_POST['level'];
 
 $update = "UPDATE staff_table SET `staff_name` = '$name', `staff_fname`='$fname',`staff_email`='$email',`staff_office`='$office',`level`='$level' WHERE `staff_id`='".$_GET['edit_id']."'";
 $up = mysqli_query($con, $update);
 if(!isset($sql)){
 die ("Error $sql" .mysqli_connect_error());
 }
 else
 {
 header("location: admin.user.php#dashboard");
 }
}
?>
<!--Create Edit form -->
<!doctype html>
<html>
<body>
<form method="post">
<h1>Edit Staff Information</h1>
<label>Name: </label><input type="text" name="name" placeholder="Name" value="<?php echo $row['staff_name']; ?>"><br/><br/>
<label>FamilyName: </label><input type="text" name="fname" placeholder="fname" value="<?php echo $row['staff_fname']; ?>"><br/><br/>
<label>Email: </label><input type="text" name="email" placeholder="email" value="<?php echo $row['staff_email']; ?>"><br/><br/>
<label>Office: </label><input type="text" name="office" placeholder="office" value="<?php echo $row['staff_office']; ?>"><br/><br/>
<label>Level: </label><input type="text" name="level" placeholder="level" value="<?php echo $row['level']; ?>"><br/><br/>
<button type="submit" name="btn-update" id="btn-update" onClick="update()"><strong>Update</strong></button>
<a href="admin.user.php#dashboard"><button type="button" value="button">Cancel</button></a>
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