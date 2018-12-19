<?php
session_start();

//checking if user already login
if(!isset($_SESSION['email'])){
    header('Location: login.php?login=youAreNotlogined');
}

//checking user's level
if($_SESSION['level']!="advisor"){
    header('Location: login.php?login=youAreNotAdvisor');
	
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Advisor Panel</title>
    
    <link href="../css/Admin.css" type ="text/css" rel="stylesheet">
</head>
<body>
<div class="admin-panel clearfix">
  <div class="slidebar">
    <div class="logo">
      <a href=""></a>
    </div>
    <ul >
        <li class="current"><a href="#dashboard"> Attendance </a></li>
        <li><a href="#posts"> Evaluation Form</a></li>
        <li><a href="#media"> Forms</a></li>
        <li><a href="#comments"> Add Announcment</a></li>
        <li><a href="logout.php"> Logout</a></li>
     </ul>
  </div>