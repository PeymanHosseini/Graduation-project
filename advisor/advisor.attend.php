<?php
include 'header.advisor.php';
include '../includes/db.inc.php';

$result2 = mysqli_query($con, "SELECT * FROM student_table  WHERE `staff_id`= '2' ");
$result3 = mysqli_query($con, "SELECT `std_id`, SUM(`status` = 'p') AS presentCount, COUNT(*) AS totalCount, (SUM(`Status` = 'present') * 100) / COUNT(*) AS percent FROM attendance WHERE std_id = 38");
?>
  <div class="main">
    <div class="mainContent clearfix">
      <div id="dashboard">
      <div class="quick-press"><br>
   <table border = '2' style='width:100%' >
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
   ?>
   </table><br><br>
    
   
 
          
           
   <table border = '1' style='width:100%'  >
   <tr>
   <th>     student Id    </th>
   <th>     present Count    </th>
   <th >   totalLecture   </th>
   <th >   percent  </th>

  
   
   </tr>
   <?php
   while ($row3 = mysqli_fetch_array($result3))
   {?>
   <tr>
   <td align="center"> <?php echo $row3['std_id'] ;?>  </td>
    <td align="center"> <?php echo $row3['presentCount'] ;?>  </td>
    <td align="center"> <?php echo $row3['totalCount'];  ?>      </td>
    <td align="center"> <?php echo $row3['percent'];  ?>      </td>
       <?php
   }
   ?></table>
    
   
  </div>
           </div>
         </div>      
       </div>  
     </div> 
</body>
</html>