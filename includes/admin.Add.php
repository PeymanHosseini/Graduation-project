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
    $stdid=  $_POST['stdid'];
    $course=  $_POST['course'];
    $sql = "INSERT INTO `staff_table`(`staff_email`,`password`, `staff_name`, `staff_fname`, `staff_office`,`level`,`std_id`,`course_id`) VALUES ('$email','$pwd','$name','$fname','$office','$level','$stdid','$course')";
    mysqli_query($con,$sql);
    echo ("<script LANGUAGE='JavaScript'>
            window.location.href='../admin/admin.user.php#dashboard';
            window.alert('Staff is added to the data base ');
            </script>");
        exit();

}

?>