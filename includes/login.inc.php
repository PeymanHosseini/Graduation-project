<?php


if(isset($_POST["submit"]))
{
    //connect to database
    include 'db.inc.php';
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $pwd = mysqli_real_escape_string($con, $_POST['password']);
    
    //error handeling
    // empty field
    if (empty($email) || empty($pwd))
    {
        echo ("<script LANGUAGE='JavaScript'>
            window.location.href='../LOGIN.php';
            window.alert('PLEASE  FILL OUT ALL REQUIRED FIELDS ');
            </script>");
        exit();  
    }
   
    //check email format 
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        echo ("<script LANGUAGE='JavaScript'>
            window.location.href='../LOGIN.php';
            window.alert('INVALID EMAIL');
            </script>");
        exit();
    }

    else
    {
        session_start();
        //staff
        $query1 = mysqli_query($con, "SELECT * FROM staff_table WHERE staff_email='$email' AND password='$pwd'");
        if(mysqli_num_rows($query1) == 0)
        {
                        $query2 = mysqli_query($con, "SELECT * FROM student_table WHERE std_email='$email'");
                        if(mysqli_num_rows($query2) == 1)
                        {
                            $row1 = mysqli_fetch_assoc($query2);
                            $hashchek = password_verify($pwd, $row1['password']);
                            if($hashchek == false)
                            {
                                echo ("<script LANGUAGE='JavaScript'>
                                        window.location.href='../LOGIN.php';
                                        window.alert('WRONG PASSWORD');
                                        </script>");
                                exit();
                            } 
                            else
                            {
                                if($row1['std_course']== '403'){
                                    
                                    $_SESSION['email']=$row1['std_email'];
                                    $_SESSION['level'] = $row1['level'];
                                    $_SESSION['course'] = $row1['std_course'];
                                    $_SESSION['name'] = $row1['std_name'];
                                    echo ("<script LANGUAGE='JavaScript'>
                                    window.location.href='../student403.php#dashboard';
                                    window.alert('You logged in successfully as a student');
                                    </script>");
                                }
                                else {
                                    
                                
                                $_SESSION['email']=$row1['std_email'];
                                $_SESSION['level'] = $row1['level'];
                                $_SESSION['course'] = $row1['std_course'];
                                $_SESSION['name'] = $row1['std_name'];
                                echo ("<script LANGUAGE='JavaScript'>
                                window.location.href='../student.php#dashboard';
                                window.alert('You logged in successfully as a student');
                                </script>");
                                        }                    
                            }
                        }
                        else
                        {
                            echo ("<script LANGUAGE='JavaScript'>
                                window.location.href='../LOGIN.php';
                                window.alert('EMAIL IS INVALID');
                                </script>");
                            
                        }
            
        }
        else
        {
            $row1 = mysqli_fetch_assoc($query1);

            if($row1['level'] == 'admin')
            {
                $_SESSION['email']=$row1['staff_email'];
                $_SESSION['level'] =$row1['level'] ;
                echo ("<script LANGUAGE='JavaScript'>
                    window.location.href='../admin.php';
                    window.alert('You logged in successfully as a admin');
                    </script>");
            }
            elseif($row1['level'] == 'advisor')
            {
                $_SESSION['email']=$row1['staff_email'];
                $_SESSION['level'] = $row1['level'];
                echo ("<script LANGUAGE='JavaScript'>
                    window.location.href='../advisor.php';
                    window.alert('You logged in successfully as a advisor');
                    </script>");
            }
            elseif($row1['level'] == 'committee')
            {
                $_SESSION['email']=$row1['staff_email'];
                $_SESSION['level'] = $row1['level'];
                echo ("<script LANGUAGE='JavaScript'>
                    window.location.href='../commitee.php';
                    window.alert('You logged in successfully as a committee');
                    </script>");
            }
            else
            {
                echo ("<script LANGUAGE='JavaScript'>
                    window.location.href='../login.php';
                    window.alert('User not valid');
                    </script>");
            }
        }

    }
}

