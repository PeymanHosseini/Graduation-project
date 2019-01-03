<?php
include 'header.php';
include '../includes/db.inc.php';
// If upload button is clicked ...
if (isset($_POST['submit'])) 
{
$user_id=$_SESSION['email'];
// Only proceed if strtotime() succeeds
if($pdate=strtotime($_POST['date'])) {
  // Since we have a valid time, turn to date string
  $date=date("Y-m-d", $pdate);}
  // Get image name
  $uploadedfile = $_FILES['file']['name'];
   // Get student id
   $student_id = $_SESSION['id'];
  // Get text
  $file_text = mysqli_real_escape_string($con, $_POST['file_text']);
    // image file directory
  	$target = "uploadedFile/".basename($uploadedfile);
  $sql = "INSERT INTO uploaded_file (`std_email`, `std_id`, `files`, `date`, `text`) VALUES ('$user_id', '$student_id', '$uploadedfile', '$date', '$file_text')";
  echo ("<script LANGUAGE='JavaScript'>
 window.location.href='upload.php#dashboard';
 window.alert('your file is uploaded to the data base ');
 </script>");
  // execute query
  mysqli_query($con, $sql);
  if (move_uploaded_file($_FILES['file']['tmp_name'], $target)) {
    $msg = "file uploaded successfully";
  }else{
    $msg = "Failed to upload file";
  }
  

}

?>
  <div class="main">
    <div class="mainContent clearfix">
      <div id="dashboard">
        <h1 class="header"><span class=""></span></h1>
         <div class="quick-press">
           <form action="" method="post" enctype="multipart/form-data"><br/><br/>
                       <label for="date">   Date:     </label>
                      <input type="date"  name="date" id="date"/>
                      <br/><br/>
                <div>
                  <input type="file" name="file">
                </div><br/>
                <div>
                  <textarea 
                    id="text" 
                    cols="40" 
                    rows="4" 
                    name="file_text" 
                    placeholder="Add extra information"></textarea>
                </div>
                <button type="submit" class="submit" name="submit">Upload</button>
            </form>
         </div>
       </div>
       </div>
     </div> 
</body>
</html>