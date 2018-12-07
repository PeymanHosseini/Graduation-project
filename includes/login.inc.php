<?php
session_start();

if(isset($_POST["submit"]))
{
    //connect to database
    include 'db.inc.php';
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $pwd = mysqli_real_escape_string($con, $_POST['password']);
    
    //error handeling
    if (empty($email) || empty($pwd))
    {
        header("Location: ../login.php?login=emptyyyy");
        exit();  
    }
   
    //Password must contain 6 characters of letters, numbers and at least one special character
    //elseif(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])(?=.*[!@#$%])[0-9A-Za-z!@#$%]{6,15}$/', $pwd))
    //{
    //    header("Location: ../login.php?login=character");
    //    exit();
    //}

    //check email format 
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        header("Location: ../login.php?login=invalidEmail");
        exit();
    }

    else
    {

    
    
        //staff
        $query1 = mysqli_query($con, "SELECT * FROM staff_table WHERE staff_email='$email' AND password='$pwd'");
        if(mysqli_num_rows($query1) == 0)
        {
                        $query1 = mysqli_query($con, "SELECT * FROM student_table WHERE std_email='$email' AND password='$pwd'");
                        if(mysqli_num_rows($query1) == 0)
                        {
                            header("Location: ../login.php?login=emailNotFoundInDataBase");
                            
                        }
                        else
                        {
                            $row1 = mysqli_fetch_assoc($query1);
                            $_SESSION['email']=$row1['std_email'];
                            $_SESSION['user'] = $row1['level'];
                            
                            if($_SESSION['user'] == 'student')
                            {
                                header("Location: ../student.php");
                            }
                            
                        }
            
        }
        else
        {
            $row1 = mysqli_fetch_assoc($query1);
            $_SESSION['email']=$row1['staff_email'];
            $_SESSION['user'] = $row1['level'];
            
            if($_SESSION['user'] == 'admin')
            {
                header("Location: ../admin.php");
            }
            elseif($_SESSION['user'] == 'advisor')
            {
                header("Location: ../advisor.php");
            }
            elseif($_SESSION['user'] == 'committee')
            {
                header("Location: ../commitee.php");
            }
            else
            {
                header("Location: ../login.php?login=ERROOrUserNotValid");
            }
        }
/*
      

         //student
         $query1 = mysqli_query($con, "SELECT * FROM student_table WHERE std_email='$email' AND password='$pwd'");
         if(mysqli_num_rows($query1) == 0)
         {
             header("Location: ../login.php?login=committeeUserNotValid");
             
         }
         else
         {
             $row1 = mysqli_fetch_assoc($query1);
             $_SESSION['email']=$row1['std_email'];
             $_SESSION['student'] = $row1['level'];
             
             if($_SESSION['student'] == $row1['level'])
             {
                 header("Location: ../student.php");
             }
             else
             {
                 $error = "Failed Login";
             }
         }
*/
    }
}

