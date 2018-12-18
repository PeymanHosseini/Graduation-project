<?php
session_start();

//checking if user already login
if(!isset($_SESSION['email'])){
    header('Location: login.php?login=youAreNotlogined');
}

//checking user's level
if($_SESSION['level']!="admin"){
    header('Location: login.php?login=youAreNotAdmin');
	
}

if(isset($_POST["submit"]))
{

    //connect to database
    include_once 'db.inc.php'; 
    
    // collect the data from form
    $email =  $_POST['email'];
    $pwd = $_POST['password'];
    $name =  $_POST['name'];
    $fname = $_POST['surname'];
    $office= $_POST['office'];
    $level=  $_POST['level'];
    $sql = "INSERT INTO `staff_table`(`staff_email`,`password`, `staff_name`, `staff_fname`, `staff_office`,`level`) VALUES ('$email','$pwd','$name','$fname','$office','$level')";
    mysqli_query($con,$sql);
    header("Location: ../admin.php#dashboard");

}
if(isset($_POST["submit2"]))
{

    //connect to database
    include_once 'db.inc.php'; 
    
    // collect the data from form
    $email =  $_POST['email'];
    $pwd = $_POST['password'];
    $name =  $_POST['name'];
    $fname = $_POST['surname'];
    $office= $_POST['office'];
    $level=  $_POST['level'];
    $sql = "DELETE FROM `staff_table` WHERE `staff_table`.`staff_email` = '$email'";
    mysqli_query($con,$sql);
    header("Location: ../admin.php#dashboard");

}







?>