<?php
include '../includes/db.inc.php';
include 'header.advisor.php';
// If upload button is clicked ...
if (isset($_POST['submit'])) 
{
    $user_id=$_SESSION['email'];
 // Get pass
 $pass = mysqli_real_escape_string($con, $_POST['password']);
  // Get re-type pass
 $pass2 = mysqli_real_escape_string($con, $_POST['confirm_password']);
    
        $sql = "UPDATE `staff_table` SET `password`= '$pass' WHERE `staff_email` = '$user_id' ";
        // execute query
        mysqli_query($con, $sql);

    echo ("<script LANGUAGE='JavaScript'>
             window.location.href='advisor.pass.php#media';
             window.alert('your password is updted');
             </script>");
  

}

?>


  <div class="main">
    <div class="mainContent clearfix">
      <div id="media">
        <div class="quick-press">
            <h4>Update Password</h4>
             <div class="clearfix">
                <form action="" method="post" >
               
                     <label>New Password :</label><br>
                    <input name="password" id="password" type="password" onkeyup='check();' />
                    <br>
                   
                    <label>Confirm Password :</label><br>
                    <input type="password" name="confirm_password" id="confirm_password"  onkeyup='check();' /> 
                    <span id='message'></span><br><br>
                   
                    
                    
                    <label>
                    <input type="submit" value="Update" id="submit" name="submit">
                    </label>
                   
                </form>
            </div> 
          </div>
        </div>
      </div>
  </div>
</div>
<script type="text/javascript"> 
var check = function() 
{
  if (document.getElementById('password').value ==
    document.getElementById('confirm_password').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'matching';
    document.getElementById('submit').disabled = false;
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'not matching';
    document.getElementById('submit').disabled = true;
  }
}

</script>
</body>
</html>