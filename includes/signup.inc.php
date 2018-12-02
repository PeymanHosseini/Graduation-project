<?php


if(isset($_POST["signup"])){

//connect to database
    include_once 'db.inc.php'; 

// collect the data from form
$email = mysqli_real_escape_string($con, $_POST['email']);
$name = mysqli_real_escape_string($con, $_POST['name']);
$fname = mysqli_real_escape_string($con, $_POST['fname']);
$tell = mysqli_real_escape_string($con, $_POST['tell']);
$pwd = mysqli_real_escape_string($con, $_POST['password']);
$course =$_POST['coursecode'];

    // Error handeling
    // check for correct input character
    if(!preg_match("/^[a-zA-Z]*$/", $name) || !preg_match("/^[a-zA-Z]*$/", $fname))
        {
            header("Location: ../signup.php?signup=character");
            exit();
        }

// check if email is valid
   if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            
            header("Location: ../signup.php?signup=invalidEmail");
            exit();
            
        }
        else {
// check if email is existing in database or not
    $sql = "SELECT * FROM student_table WHERE std_email = '$email' ";
    $result = mysqli_query ($con , $sql);
    $resultcheck = mysqli_num_rows($result);
    if($resultcheck > 0){header("Location: ../signup.php?signup=emailExist");exit();}
    

        
// insert data to data base
        
            else {
            //hashing the pass
            $hashedpass = md5($pwd);
            $sql = "INSERT INTO `student_table`(`std_email`, `std_name`, `std_fname`, `std_tell`, `password`, `std_course`) VALUES ('$email','$name','$fname','$tell','$hashedpass','$course')";
            mysqli_query($con,$sql);
            header("Location: ../login.php");
            }
        }}