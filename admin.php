//<?php
//include('checkadmin.php');
//?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Panel</title>
    
    <link href="css/Admin.css" type ="text/css" rel="stylesheet">
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
        <li><a href="#links"> Upload task</a></li>
        <li><a href="#comments"> Add Announcment</a></li>
        <li><a href="#widgets"> Logout</a></li>
     </ul>
  </div>
  <div class="main">
    
    <div class="mainContent clearfix">
      <div id="dashboard">
        <h1 class="header"><span class=""></span></h1>
          <div class="monitor">
            <h4>Right Now</h4>
            <div class="clearfix">
              
           </div>
           <p>Theme <a href="">Twenty Eleven</a> with <a href="">3 widgets</a></p>
         </div>
         <div class="quick-press">
           <h4>Quick Press</h4>
           <form action="" method="post">
             <input type="text" name="title" placeholder="Title"/>
             <input type="text" name="content" placeholder="Content"/>
             <input type="text" name="tags" placeholder="Tags"/>
             <button type="button" class="save">l</button>
             <button type="button" class="delet">m</button>
             <button type="submit" class="submit" name="submit">Publish</button>
           </form>
         </div>
       </div>
       <div id="posts">
         <h4 class="header">posts</h4>
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