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
	
    $q1=$_POST['radio45'];
    $q2=$_POST['radio46'];
    $q3=$_POST['radio47'];
    $q4=$_POST['radio48'];
    $q5=$_POST['radio49'];
    $q6=$_POST['radio50'];
    $q7=$_POST['radio51'];
    $q8=$_POST['radio52'];
    $q9=$_POST['radio53'];
    $q10=$_POST['radio54'];

    mysqli_query($con,"INSERT INTO `advisor_eval`(`std_id`,`staff_email`,`date`,`q1`,`q2`,`q3`,`q4`,`q5`,`q6`,`q7`,`q8`,`q9`,`q10`) VALUES ('$studentid','$user_id' ,'$date','$q1','$q2','$q3','$q4','$q5','$q6','$q7','$q8','$q9','$q10')");

    echo ("<script LANGUAGE='JavaScript'>
 window.location.href='advisor.eval.php#dashboard';
 window.alert('Evaluation form is added to the data base ');
 </script>");

  $abc1=mysqli_query($con,"select * from question");
}

?>
  <div class="main">
    <div class="mainContent clearfix">
      <div id="dashboard">
        <h1 class="header"><span class=""></span></h1>
        <div class="quick-press">
            
            <div class="clearfix">
 <form action="#" method="post"><br/>
<h4> Project Evaluation By Supervisor</h4> 
<label for="date">   Date:     </label>
                      <input type="date"  name="date" id="date"/><br><br> 
<?php 

$abc1=mysqli_query($con,"select * from question");
echo "<table border = '2' style='width:75%' >
<tr>
<th>ID</th>
<th>Question</th>
<th >   Poor   </th>
<th >   Good   </th>
<th >   Excellent</th>
</tr>";

while(list($question_id,$question_text)=mysqli_fetch_array($abc1))
{   

    if ($question_id < "45"   ) {continue;}
    else{
echo '<tr>';

echo '<td >' . $question_id . '</td>';
echo '<td>' . $question_text . '</td>';

echo' <td align="center"> '?> <input type="radio" name="radio<?php echo $question_id;?>" value="0" required> <?php echo '</td>'; ?>
<?php echo'<td align="center"> '?> <input type="radio" name="radio<?php echo $question_id;?>" value="2" required><?php echo '</td>';?>
<?php echo'<td align="center"> '?> <input type="radio" name="radio<?php echo $question_id;?>" value="4" required><?php echo '</td>';?>
<?php

echo '</tr>';
if($question_id == "54")break;}

}

echo '</table>';


?>  
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