<?php
session_start();
//Database Connection
include '../includes/db.inc.php';

$studentid = $_GET['edit2_id'];
if(isset($_POST['submit']))
{
  $user_id=$_SESSION['email'];
  // Default to null
  $date=null;
  // Only proceed if strtotime() succeeds
  if($pdate=strtotime($_POST['date'])) {
  // Since we have a valid time, turn to date string
  $date=date("Y-m-d", $pdate);
 }
 $course_code=$_POST['coursecode'];
$q1=$_POST['radio'];
  mysqli_query($con,"INSERT INTO `attendance`(`staff_email`,`std_id`,`date`,`course_id`,`status`) VALUES ('$user_id' ,'$studentid' ,'$date' ,'$course_code','$q1')  ");
    echo ("<script LANGUAGE='JavaScript'>
 window.location.href='advisor.attend.php#dashboard';
 window.alert('attendance record is added to the data base ');
 </script>");

 
}

?>
  <div class="main">
    <div class="mainContent clearfix">
      <div id="dashboard">
        <h1 class="header"><span class=""></span></h1>
        <div class="quick-press">
            
            <div class="clearfix">
 <form action="#" method="post"><br/>
<h4> Attendance</h4> 
<label for="date">   Date:     </label>
<input type="date"  name="date" id="date"/><br>
<label >Course Code: </label>
                  <select name="coursecode" >
                      <option value="1">Itec 403</option>
                      <option value="2">Itec 404</option>
                  </select><br>
<table border = '2' style='width:75%' >
<tr>
<th>student Id</th>
<th>status</th>
</tr>
<tr>
<td align="center"><?php echo "$studentid"; ?>   </td>
<td align="center">  <input type="radio" name="radio" value="P" required> Present
<input type="radio" name="radio" value="A" required>Absent</td>
</tr>
</table>
<br>           
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