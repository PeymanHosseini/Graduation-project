<?php

if(isset($_POST["signup"]))
{

    //connect to database
    include_once 'db.inc.php'; 
    
    // collect the data from form
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $fname = mysqli_real_escape_string($con, $_POST['fname']);
    $tell = mysqli_real_escape_string($con, $_POST['tell']);
    $pwd = mysqli_real_escape_string($con, $_POST['password']);
    $course =$_POST['coursecode'];
    $level= 'student';

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
    else
    {
        // check if email is existing in database or not
        $sql = "SELECT * FROM student_table WHERE std_email = '$email' ";
        $result = mysqli_query ($con , $sql);
        $resultcheck = mysqli_num_rows($result);
        if($resultcheck > 0){header("Location: ../signup.php?signup=emailExist");exit();}

             
        else
        {
            // insert data to data base  
            //hashing the pass
            $hashedpass = password_hash($pwd,PASSWORD_DEFAULT);
            $sql = "INSERT INTO `student_table`(`std_email`,`password`, `std_name`, `std_fname`, `std_tell`, `std_course`,`level`) VALUES ('$email','$hashedpass','$name','$fname','$tell','$course','$level')";
            mysqli_query($con,$sql);
            header("Location: ../login.php");
            /* send email
            $to = "peyman.h88@hotmail.com";
            $subject = "Graduation Proj";
            $headers = "From: noreply@example.com\r\n";
            $message = "Lorem ipsum dolor sit amet, consectetuer adipiscing elit.";        
            mail($to, $subject, $message, $headers);
            */
        }
    }
}