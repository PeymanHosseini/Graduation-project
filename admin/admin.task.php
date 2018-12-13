<?php
session_start();
//checking if user already login
if(!isset($_SESSION['email'])){
    header('Location: ../login.php?login=youAreNotlogined');
}
//checking user's level
if($_SESSION['level']!="admin"){
    header('Location: ../login.php?login=youAreNotAdmin');
	
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Panel</title>
    
    <link href="../css/Admin.css" type ="text/css" rel="stylesheet"<?=time()?>">
</head>
<body>
<div class="admin-panel clearfix">
  <div class="slidebar">
    <div class="logo">
      <a href="../admin.php"></a>
    </div>
    <ul >
        <li ><a href="admin.user.php#dashboard"> User Managment </a></li>
        <li ><a href="admin.eval.php#post"> Evaluation Form</a></li>
        <li ><a href="admin.task.php#media"> Add Task</a></li>
        <li ><a href="admin.ans.php#comment"> Add Announcment</a></li>
        <li ><a href="../logout.php"> Logout</a></li>
     </ul>
  </div>
  <div class="main">
    <div class="mainContent clearfix">
      <div id="media">
        <h1 class="header"><span class="">hiiiiiiiiiiiiiiiii</span></h1>

       </div>
     </div>
  </div>
</div>
</body>
</html>