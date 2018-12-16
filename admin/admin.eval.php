<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "stdsystem";
$con=mysqli_connect($servername,$username,$password,$dbname);

if(!$con)
{
    die('Connection Error'.mysqli_error());
}
 
include("header.php"); 

$user_id=$_SESSION['email'];
?>
 
  <div class="main">
    <div class="mainContent clearfix">
      <div id="dashboard">
        <h1 class="header"><span class=""></span></h1>
        <div class="quick-press">
            
            <div class="clearfix">
 <form action="#" method="post"><br/>
 <input type="text" name="email" id="username"  placeholder="Enter student Email">  <br/>
 <label for="password">Course Code: </label>
                       <select name="coursecode" >
                           <option value="403">Itec 403</option>
                           <option value="404">Itec 404</option>
                       </select>      
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