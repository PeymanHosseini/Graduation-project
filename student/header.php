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
if($_SESSION['level']!="student" || $_SESSION['course'] != 404){
  echo ("<script LANGUAGE='JavaScript'>
  window.alert('ONLY Itec404 STUDENTS CAN ACCESS THIS PAGE');
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
    
    <link href="../css/Admin.css" type ="text/css" rel="stylesheet">
</head>
<body>
<div class="admin-panel clearfix">
  <div class="slidebar">
    <div class="logo">
      <a href="../student.php#dashboard"></a>
    </div>
    <ul >
        <li><a href="../student.php#dashboard"> Home </a></li>
        <li><a href="upload.php#dashboard">Upload Weekly Task</a></li>
        <li><a href="announce.php#dashboard"> Announcement</a></li>
        <li><a href="uploadtask.php#dashboard"> Upload Task</a></li>
        <li><a href="../logout.php"> Logout</a></li>
     </ul>
  </div>