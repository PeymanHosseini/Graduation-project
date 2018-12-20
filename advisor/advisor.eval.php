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
    header("location: advisor.eval.php#dashboard.php");
	$abc1=mysqli_query($con,"select * from question");
	while(list($question_id,$question_text)=mysqli_fetch_array($abc1))
	{
    
		$evl_val=$_POST['radio'.$question_id];
		mysqli_query($con,"INSERT INTO `evaluation_table`(`std_email`,`staff_email`, `question_id`, `answer`, `course_id`, `date`, `accademic_year_id`) VALUES ('$email','$user_id','$question_id','$evl_val','$course_code' ,'$date','$Academic_year')");

  }
}
?>
  <div class="main">
    <div class="mainContent clearfix">
      <div id="dashboard">
        <h1 class="header"><span class=""></span></h1>
        <div class="quick-press">
            
            <div class="clearfix">
 <form action="#" method="post"><br/>
 <input type="text" name="email" id="username"  placeholder="Enter student Email">  <br/>
                       <label >Course Code: </label>
                       <select name="coursecode" >
                           <option value="1">Itec 403</option>
                           <option value="2">Itec 404</option>
                       </select> &nbsp;&nbsp;
                       <label >Academic Year: </label>  
                       <select name="academicyear" >
                           <option value="1">2018</option>
                           <option value="2">2019</option>
                           <option value="3">2020</option>
                       </select> &nbsp;&nbsp; 
                       <label for="date">   Date:     </label>
                      <input type="date"  name="date" id="date"/>  
                       <h4>Evaluation Form</h4>  
<?php 

$abc1=mysqli_query($con,"select * from question");
echo "<table border = '1' style='width:100%' >
<tr>
<th>Q ID   </th>
<th>   Question   </th>
<th >   Poor   </th>
<th >   Good   </th>
<th >   Excellent</th>
</tr>";

while(list($question_id,$question_text)=mysqli_fetch_array($abc1))
{
echo '<tr>';
echo '<td>' . $question_id . '</td>';
echo '<td>' . $question_text . '</td>';

echo'      <td align="center"> '?> <input type="radio" name="radio<?php echo $question_id;?>" value="1" required> <?php echo '</td>'; ?>
<?php echo'<td align="center"> '?> <input type="radio" name="radio<?php echo $question_id;?>" value="2" required><?php echo '</td>';?>
<?php echo'<td align="center"> '?> <input type="radio" name="radio<?php echo $question_id;?>" value="3" required><?php echo '</td>';?>
<?php
echo '</tr>';
}
echo '</table>';
?>  

              
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