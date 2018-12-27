<?php
include 'header.php';
include '../includes/db.inc.php';
$result = mysqli_query($con, "SELECT * FROM staff_table");
$result2 = mysqli_query($con, "SELECT * FROM student_table");
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
             <input type="text" name="std_id" placeholder="Student ID"/>
             <input type="text" name="course" placeholder="Course ID"/>
             <button type="submit" class="submit" name="submit">Add</button>
           </form>
           </div><br/><br/>
          
           
   
   <table border = '1' style='width:100%' >
   <tr>
   <th>     ID    </th>
   <th>   Email   </th>
   <th >   Name   </th>
   <th >  Surname </th>
   <th >   Level  </th>
   <th >   Student  </th>
   <th >   Course  </th>
   <th >   Edit  </th>
   <th >   Delete  </th>
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
    <td> <?php echo $row['std_id'];  ?>      </td>
    <td> <?php echo $row['course_id'];  ?>      </td>
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