<?php
include '../includes/db.inc.php';
include 'header.php';
// If upload button is clicked ...
if (isset($_POST['submit'])) 
{
// Only proceed if strtotime() succeeds
if($pdate=strtotime($_POST['date'])) {
  // Since we have a valid time, turn to date string
  $date=date("Y-m-d", $pdate);}
  // Get course code
  $course_code=$_POST['coursecode'];
  // Get image name
  $image = $_FILES['image']['name'];
  // Get text
  $image_text = mysqli_real_escape_string($con, $_POST['image_text']);
    // image file directory
  	$target = "../images/".basename($image);
  $sql = "INSERT INTO task_table (`image`, `text`, `course_id`, `deadline`) VALUES ('$image', '$image_text', '$course_code', '$date')";
  // execute query
  mysqli_query($con, $sql);
  if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
    $msg = "Image uploaded successfully";
  }else{
    $msg = "Failed to upload image";
  }
  

}
$result = mysqli_query($con, "SELECT * FROM task_table");

?>


  <div class="main">
    <div class="mainContent clearfix">
      <div id="media">
        
        <div class="quick-press">
            <h4>Add New Task</h4>
            <div class="clearfix">
              <form action="" method="post" enctype="multipart/form-data">
                 <input type="hidden" name="size" value="1000000">
                 <label >Course Code: </label>
                       <select name="coursecode" >
                           <option value="1">Itec 403</option>
                           <option value="2">Itec 404</option>
                       </select> <br/><br/>
                       <label for="date">   Deadline:     </label>
                      <input type="date"  name="date" id="date"/>
                      <br/><br/>
                <div>
                  <input type="file" name="image">
                </div><br/>
                <div>
                  <textarea 
                    id="text" 
                    cols="40" 
                    rows="4" 
                    name="image_text" 
                    placeholder="Add extra information"></textarea>
                </div>
                <button type="submit" class="submit" name="submit">Upload</button>
            </form>
            </div> 
          </div>
        <div id="content">
            
              <?php
    while ($row = mysqli_fetch_array($result)) {
      ?>
<table border="1" >
<tr>
<th>Task ID   </th>
<th>   Image   </th>
<th >   Comment   </th>
<th >   Deasline   </th>
<th >   CourseID   </th>
</tr>
<tr>
<td align="center">   <?php echo  $row['id'] ; ?>    </td>
<td align="center">     <?php echo "<img src='../images/".$row["image"]."' >"; ?>     </td>
<td align="center">   <?php    echo $row["text"];  ?>    </td>
<td align="center">   <?php  echo  $row["deadline"] ; ?>   </td>
<td align="center">   <?php  echo  $row["course_id"] ; ?>   </td>
</tr>

</table>
<?php
}
?>


  
          
          </div>
       </div>
     </div>
  </div>
</div>
</body>
</html>