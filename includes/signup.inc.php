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
    $status= 'inactive';

    // Error handeling
     // empty field
     if (empty($email) || empty($pwd) || empty($name) || empty($fname) || empty($tell))
     {
         echo ("<script LANGUAGE='JavaScript'>
             window.location.href='../signup.php';
             window.alert('PLEASE  FILL OUT ALL REQUIRED FIELDS');
             </script>");
         exit();  
     }
    // check for correct input character
    if(!preg_match("/^[a-zA-Z]*$/", $name) || !preg_match("/^[a-zA-Z]*$/", $fname))
        {
            echo ("<script LANGUAGE='JavaScript'>
            window.location.href='../signup.php';
            window.alert('PLEASE USE ONLY CORRET INPUT CHARACTER');
            </script>");
            exit();
        }

    // check if email is valid
    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        { 
            echo ("<script LANGUAGE='JavaScript'>
            window.location.href='../signup.php';
            window.alert('PLEASE USE ONLY CORRET EMAIL FORMAT');
            </script>");
            exit();
        }
    else
    {
        // check if email is existing in database or not
        $sql = "SELECT * FROM student_table WHERE std_email = '$email' ";
        $result = mysqli_query ($con , $sql);
        $resultcheck = mysqli_num_rows($result);
        if($resultcheck > 0){echo ("<script LANGUAGE='JavaScript'>
            window.location.href='../signup.php';
            window.alert('EMAIL IS ALREADY TAKEN');
            </script>");
            exit();}    
        else
        {
            // insert data to data base  
            //hashing the pass
            $hashedpass = password_hash($pwd,PASSWORD_DEFAULT);
            $sql = "INSERT INTO `student_table`(`std_email`,`password`, `std_name`, `std_fname`, `std_tell`, `std_course`,`level`,`status`) VALUES ('$email','$hashedpass','$name','$fname','$tell','$course','$level','$status')";
            mysqli_query($con,$sql);
            echo ("<script LANGUAGE='JavaScript'>
            window.location.href='../LOGIN.php';
            window.alert('YOU SIGN UP SUCCECFULLY PLEASE WAIT FOR ADMIN CONFIRMATION');
            </script>");
            /* send email
            $to = "ADMIN@hotmail.com";
            $subject = "NEW USER";
            $headers = "From: noreply@example.com\r\n";
            $message = "Lorem ipsum dolor sit amet, consectetuer adipiscing elit.";        
            mail($to, $subject, $message, $headers);
            */
        }
    }
}