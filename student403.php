<?php
session_start();
//checking if user already login
if(!isset($_SESSION['email'])){
  echo ("<script LANGUAGE='JavaScript'>
  window.alert('PLEASE LOGIN TO THE SYSTEM');
  window.location.href='login.php';
  </script>");
}
//checking user's level
if($_SESSION['level']!="student" || $_SESSION['course'] != 403){
  echo ("<script LANGUAGE='JavaScript'>
  window.alert('ONLY Itec403 STUDENTS CAN ACCESS THIS PAGE');
  window.location.href='login.php';
  </script>");
  session_destroy();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Panel</title>
    
    <link href="css/Admin.css" type ="text/css" rel="stylesheet">
</head>
<body>
<div class="admin-panel clearfix">
  <div class="slidebar">
    <div class="logo">
      <a href="student403.php#dashboard"></a>
    </div>
    <ul >
        <li><a href="student403.php#dashboard"> Home </a></li>
        <li><a href="student403/upload.php#dashboard">Upload Weekly Task</a></li>
        <li><a href="student403/announce.php#dashboard"> Announcment</a></li>
        <li><a href="student403/uploadtask.php#dashboard"> Upload Task</a></li>
        <li><a href="logout.php"> Logout</a></li>
     </ul>
  </div>
  <div class="main">
    
    <div class="mainContent clearfix">
      <div id="dashboard">
      <div class="quick-press">
        <h3 class="header"><span class=""><h1 class="header"><span class="">Welcome <font  color="red"> <?php echo ($_SESSION['name'])?></font> to the Itec 403 HomePage</span></h1></span></h3>
        <p>
<h3>This course is the first stage of the two-semester long graduation project (capstone project) of the IT program.<br> The students are required to form teams, find a project supervisor from the department and propose a real life project to the graduation project committee.<br> Each team should explore the needs and requirements of their project, carry out systems design and develop a prototype, if possible, of their project under the guidance of their project supervisors.</h3></p>
     </div></div>
     
   </div>
</div>
</body>
</html>