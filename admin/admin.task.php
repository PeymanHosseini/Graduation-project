<?php
include '../includes/db.inc.php';
include 'header.php';
// If upload button is clicked ...
if (isset($_POST['submit'])) 
{
  // Get course code
  $course_code=$_POST['coursecode'];
  // Get image name
  $image = $_FILES['image']['name'];
  // Get text
  $image_text = mysqli_real_escape_string($con, $_POST['image_text']);
    // image file directory
  	$target = "../images/".basename($image);
  $sql = "INSERT INTO task_table (`image`, `text`, `course_id`) VALUES ('$image', '$image_text', '$course_code')";
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
        <h1 class="header"><span class=""></span></h1>
        <div class="quick-press">
            <h4>Add New Task</h4>
            <div class="clearfix">
              <form action="" method="post" enctype="multipart/form-data">
                 <input type="hidden" name="size" value="1000000">
                 <label >Course Code: </label>
                       <select name="coursecode" >
                           <option value="1">Itec 403</option>
                           <option value="2">Itec 404</option>
                       </select> <br/>
                <div>
                  <input type="file" name="image">
                </div>
                <div>
                  <textarea 
                    id="text" 
                    cols="40" 
                    rows="4" 
                    name="image_text" 
                    placeholder="Say something about this image..."></textarea>
                </div>
                <button type="submit" class="submit" name="submit">Upload</button>
                
            </form>
            <div id="image_div">  
              <?php
    while ($row = mysqli_fetch_array($result)) {
      ?>
<table border="1" >
<tr>
<th>Task ID   </th>
<th>   Image   </th>
<th >   Comment   </th>
<th >   CourseID   </th>
</tr>
<tr>
<td>   <?php echo  $row['id'] ; ?>    </td>
<td>     <?php echo "<img src='../images/".$row["image"]."' >"; ?>     </td>
<td>   <?php    echo $row["text"];  ?>    </td>
<td>   <?php  echo  $row["course_id"] ; ?>   </td>
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
  </div>
</div>
</body>
</html>