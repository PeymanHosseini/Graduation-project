<?php
include 'header.php';
?>
 
  <div class="main">
    <div class="mainContent clearfix">
      <div id="dashboard">
        <h1 class="header"><span class="">helooooo</span></h1>
        <div class="quick-press">
            <h4>Add/Delete Staff</h4>
            <div class="clearfix">
            <form action="../includes/admin.add.php" method="post">
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
     </div> 
   </div>
</div>
</body>
</html>