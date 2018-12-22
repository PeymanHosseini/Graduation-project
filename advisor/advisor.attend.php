<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "stdsystem";
$con=mysqli_connect($servername,$username,$password,$dbname);

include("header.advisor.php");
if(isset($_POST['submit']))
{
  $user_id=$_SESSION['email'];
  $email = $_POST['email'];
  $course_code=$_POST['coursecode'];
  $Academic_year=$_POST['academicyear'];
  // Default to null
  $date=null;
  // Only proceed if strtotime() succeeds
  if($pdate=strtotime($_POST['date'])) {
  // Since we have a valid time, turn to date string
  $date=date("Y-m-d", $pdate);
  }
    header("location: advisor.attend.php#dashboard.php");
    $status=$_POST['radio'];
	
		mysqli_query($con,"INSERT INTO `attendance`(`std_email`,`staff_email`, `course_id`, `date`, `status`) VALUES ('$email','$user_id','$course_code' ,'$date','$status')");
}
?>
<div class="main">
    
    <div class="mainContent clearfix">
      <div id="dashboard">
         <div class="quick-press">
           <form action="#" method="post"><br/>
 <input type="text" name="email" id="username"  placeholder="Enter student Email">  <br/>
                       <label >Course Code: </label>
                       <select name="coursecode" >
                           <option value="1">Itec 403</option>
                           <option value="2">Itec 404</option>
                       </select> &nbsp;&nbsp;
                       <label for="date">   Date:     </label>
                      <input type="date"  name="date" id="date"/> <br/><br/>
                      <label >Status: </label> 
                      <input type="radio" name="radio" value="P" required>Present
                      <input type="radio" name="radio" value="A" required>Absend
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
      
   