<?php
include 'header.php';
include '../includes/db.inc.php';
$result = mysqli_query($con, "SELECT * FROM student_table");
?>
  <div class="main">
    <div class="mainContent clearfix">
      <div id="dashboard">
   <table border = '1' style='width:100%' >
   <tr>
   <th>     ID    </th>
   <th>   Email   </th>
   <th >   Name   </th>
   <th >  Surname </th>
   <th >   semester  </th>
   <th >   course  </th>
   <th >   advisor  </th>
   </tr>
   <?php
   while ($row = mysqli_fetch_array($result))
   {?>
   <tr>
    <td> <?php echo $row['staff_id'] ;?>    </td>
    <td> <?php echo $row['staff_email']; ?> </td>
    <td> <?php echo $row['staff_name'] ;?>  </td>
    <td> <?php echo $row['staff_fname']; ?> </td>
    <td> <?php echo $row['level'];  ?>      </td>
    <td> <a  href="edit.php?edit_id=<?php echo $row['staff_id']; ?>" alt="edit" class="submit3" >Edit</a>     </td>
    <td> <input type="button" onclick ="deleteme(<?php echo $row['staff_id']; ?>)" name="delete" value="Delete" class="submit2"></td>
    </tr>
    <?php
   }
   ?></table>
    <script language="javascript">
      function deleteme(delid){
      if(confirm("do u want to delete?")){
      window.location.href='  delete.php?del_id=' +delid+ '';
      return true;
    }

    }
    
    
    </script>
   
 
           </div>
         </div>      
       </div>  
     </div> 
</body>
</html>