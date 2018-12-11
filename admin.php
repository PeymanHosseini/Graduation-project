<?php
session_start();
//checking if user already login
if(!isset($_SESSION['email'])){
    header('Location: login.php?login=youAreNotlogined');
}
//checking user's level
if($_SESSION['level']!="admin"){
    header('Location: login.php?login=youAreNotAdmin');
	
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Panel</title>
    
    <link href="css/Admin.css" type ="text/css" rel="stylesheet"<?=time()?>">
</head>
<body>
<div class="admin-panel clearfix">
  <div class="slidebar">
    <div class="logo">
      <a href=""></a>
    </div>
    <ul >
        <li class="current"><a href="#dashboard"> User Managment </a></li>
        <li><a href="#posts"> Evaluation Form</a></li>
        <li><a href="#media"> Add Task</a></li>
        <li><a href="#comments"> Add Announcment</a></li>
        <li><a href="logout.php"> Logout</a></li>
     </ul>
  </div>
  <div class="main">
    
    <div class="mainContent clearfix">
      <div id="dashboard">
        <h1 class="header"><span class=""></span></h1>
          <div class="quick-press">
            <h4>Add/Delete Staff</h4>
            <div class="clearfix">
            <form action="includes/admin.add.php" method="post">
             <input type="text" name="email" placeholder="Email"/>
             <input type="text" name="password" placeholder="Password"/>
             <input type="text" name="name" placeholder="Name"/>
             <input type="text" name="surname" placeholder="Surname"/>
             <input type="text" name="office" placeholder="Office"/>
             <input type="text" name="level" placeholder="Level"/>
             <button type="submit" class="submit2" name="submit2">Delete</button>
             <button type="submit" class="submit" name="submit">Add</button>
             
           </form>
           </div>
          </div>
       </div>
       <div id="posts">
       
         
         
        <h1 class="header"><span class=""></span></h1>
          <div class="quick-press">
            <h4>Evaluation Form</h4>
            <div class="clearfix">
           </div>
          
       </div>
       </div>
       <div id="media">
         <h4 class="header">media</h4>
       </div>
       <div id="pages">
         <h4 class="header">pages</h4>
       </div>
       <div id="links">
         <h4 class="header">links</h4>
       </div>
       <div id="comments">
         <h4 class="header">comments</h4>
       </div>
       <div id="widgets">
         <h4 class="header">widgets</h4>
       </div>
       
     </div>
     
   </div>
</div>
</body>
</html>