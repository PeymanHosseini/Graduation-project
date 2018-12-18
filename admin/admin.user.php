<?php
include 'header.php';
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "stdsystem";
$con=mysqli_connect($servername,$username,$password,$dbname);
$result = mysqli_query($con, "SELECT * FROM staff_table");
?>
  <div class="main">
    <div class="mainContent clearfix">
      <div id="dashboard">

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
           </form><br/><br/>
           </div>
          
           <?php
   
   echo "<table border = '1' style='width:100%' >
   <tr>
   <th>     ID    </th>
   <th>   Email   </th>
   <th >   Name   </th>
   <th >  Surname </th>
   <th >   Level  </th>
   </tr>";
   while ($row = mysqli_fetch_array($result))
   {
   echo '<tr>';
   echo '<td>' . $row['staff_id'] . '</td>';
   echo '<td>' . $row['staff_email'] . '</td>';
   echo '<td>' . $row['staff_name'] . '</td>';
   echo '<td>' . $row['staff_fname'] . '</td>';
   echo '<td>' . $row['level'] . '</td>';
   
   }
   ?>
 
           </div>
         </div>      
       </div>  
     </div> 
</body>
</html>