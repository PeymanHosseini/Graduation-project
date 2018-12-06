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
        elseif(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])(?=.*[!@#$%])[0-9A-Za-z!@#$%]{6,15}$/', $pwd))
        {
            header("Location: ../login.php?login=character");
            exit();
        }
        //check email format 
        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            
            header("Location: ../login.php?login=invalidEmail");
            exit();
        }

           else{ 
            $sql = "SELECT * FROM student_table WHERE std_email = '$email' ";
            $result = mysqli_query ($con , $sql);
            $resultcheck = mysqli_num_rows($result);
            if($resultcheck == 0){
                header("Location: ../login.php?login=EmailNotFound");
                exit();
            }else {
                if($row = mysqli_fetch_assoc($result)){
                //de-hash pass
                $hashchek = password_verify($pwd, $row['password']);
               
                    if($hashchek == false){
                     header("Location: ../login.php?login=pwdNotM");
                     exit();
                    } elseif($hashchek == true){

                    // log in user here
                    $_SESSION['student_id'] = $row['std_id'];
                    $_SESSION['student_name'] = $row['std_name'];
                    $_SESSION['student_fname'] = $row['std_fname'];
                    $_SESSION['student_email'] = $row['std_email'];
                    $_SESSION['student_cource'] = $row['std_course'];
                    header("Location: ../student.php?login=success");
                    exit();
                }
            }
        }}
}

?>