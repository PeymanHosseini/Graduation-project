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
  // Get text
  $text = mysqli_real_escape_string($con, $_POST['text']);
 
  $sql = "INSERT INTO announcement ( `ann_text`, `course_id`, `date`) VALUES ('$text', '$course_code', '$date')";
  // execute query
  mysqli_query($con, $sql);
  
}
$result = mysqli_query($con, "SELECT * FROM announcement");

?>
  <div class="main"> 
    <div class="mainContent clearfix">
      <div id="comment">
          <div class="quick-press">
          <h4>Post New Announcement</h4>
            <div class="clearfix">
                <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="size" value="1000000">
                <label >Course Code: </label>
                  <select name="coursecode" >
                      <option value="1">Itec 403</option>
                      <option value="2">Itec 404</option>
                  </select> <br/><br/>
                  <label for="date">   Date:     </label>
                  <input type="date"  name="date" id="date"/>
                  <br/><br/>
                <textarea 
                id="text" 
                cols="40" 
                rows="4" 
                name="text" 
                placeholder="Add extra information"></textarea><br>
                <button type="submit" class="submit" name="submit">Post</button>
                </form>
            </div>


          <div id="content">
          <?php
          while ($row = mysqli_fetch_array($result)) {
          ?>
          <table border="2" width="1000px"    >
          <tr>
          <th>ID</th>
          <th>text</th>
          <th >date</th>
          <th >CourseID</th>
          </tr>
          <tr>
          <td align="center" width="25px">   <?php echo  $row['ann_id'] ;  ?>   </td>
          <td width="800px">  <?php    echo $row["ann_text"];  ?>   </td>
          <td align="center" width="100px">   <?php  echo  $row["date"] ; ?>   </td>
          <td align="center" width="75px">   <?php  echo  $row["course_id"] ; ?>   </td>
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