<?php
include ("../includes/db.inc.php");
include ("header.committee.php");
// If upload button is clicked ...
if (isset($_POST['submit'])) 
{

  $text = mysqli_real_escape_string($con, $_POST['text']);
 
  $sql = "UPDATE `uploaded_file` SET `teacher_comment`=[$text] WHERE `id` = [$sid] ";
  // execute query
  mysqli_query($con, $sql);
  
}
$result = mysqli_query($con, "SELECT * FROM uploaded_file");

?>
  <div class="main"> 
    <div class="mainContent clearfix">
      <div id="comment">
      <div class="quick-press">
            <h4>Post New Announcement</h4>
 
          </div><br>
        <div id="">
            
              <?php
    while ($row = mysqli_fetch_array($result)) {
        $sid= $row['id'];
      ?>
<table border="1" width="100%"  >
<tr>
<th>ID</th>
<th>Student Email</th>
<th >File</th>
<th >Text</th>
</tr>
<tr>
<td align="center">   <?php echo  $row['id'] ; ?>    </td>
<td align="center"><div>   <?php    echo $row["std_email"];  ?>    </div></td>
<td align="center">   <?php  echo  $row["files"] ; ?>   </td>
<td align="center">   <?php  echo  $row["text"] ; ?>   </td>
</tr>
</table><br>
<table>
<tr>
<form action="">
<textarea 
                    id="text2" 
                    cols="50" 
                    rows="4" 
                    name="text2" 
                    placeholder="Add Comments to the task"></textarea><br>
                    <button type="submit" class="submit" name="submit">Post</button>

</form>
</tr>
</table><br>
<?php
}
?>


  
          
          </div>
       </div>
      </div>
    </div> 
  </div>    
</div>
</body>
</html>