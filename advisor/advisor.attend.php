<?php
include 'header.advisor.php';
include '../includes/db.inc.php';

$result2 = mysqli_query($con, "SELECT * FROM student_table");
?>
  <div class="main">
    <div class="mainContent clearfix">
      <div id="dashboard">
      <div class="quick-press"><br>
   <table border = '1' style='width:100%' >
   <tr>
   <th>     ID    </th>
   <th >   Name   </th>
   <th >  Surname </th>
   <th >   Course  </th>
   <th >  Attendance </th>
  
   
   </tr>
   <?php
   while ($row2 = mysqli_fetch_array($result2))
   {?>
   <tr>
    <td> <?php echo $row2['std_id'] ;?>    </td>
    <td align="center"> <?php echo $row2['std_name'] ;?>  </td>
    <td align="center"> <?php echo $row2['std_fname']; ?> </td>
    <td align="center"> <?php echo $row2['std_course'];  ?>      </td>
    <td align="center" > <a  href="attendance.php?edit2_id=<?php echo $row2['std_id']; ?>" alt="edit"  >Attendance</a>     </td>

    <?php
   }
   ?></table>
    
   
 
           </div>
         </div>      
       </div>  
     </div> 
</body>
</html>