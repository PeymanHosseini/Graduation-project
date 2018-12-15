<?php
include 'header.php';
?>
 
  <div class="main">
    <div class="mainContent clearfix">
      <div id="dashboard">
        <h1 class="header"><span class=""></span></h1>
        <div class="quick-press">
            <h4>Add/Delete Staff</h4>
            <div class="clearfix">
            <form action="../includes/admin.add.php" method="post">
            <table style="width:100%">
              <tr>
                <th>ID</th>
                <th>Question</th>
                <th >Rate</th>
              </tr>
              <tr>
                <td>1</td>
                <td>DB Evaluation by Committee Members</td>
                <td><input type="radio" name="gender" value="male"> Good
             <input type="radio" name="gender" value="female"> Average
             <input type="radio" name="gender" value="female"> Bad</td>
              </tr>
              <tr>
                <td>2</td>
                <td>Peer Evaluation</td>
                <td><input type="radio" name="gender" value="male"> Good
             <input type="radio" name="gender" value="female"> Average
             <input type="radio" name="gender" value="female"> Bad</td>
              </tr>
              <tr>
                <td>3</td>
                <td>Project Demonstration</td>
                <td><input type="radio" name="gender" value="male"> Good
             <input type="radio" name="gender" value="female"> Average
             <input type="radio" name="gender" value="female"> Bad</td>
              </tr>
              <tr>
                <td>4</td>
                <td>Student Evaluation By Jury Members</td>
                <td><input type="radio" name="gender" value="male"> Good
             <input type="radio" name="gender" value="female"> Average
             <input type="radio" name="gender" value="female"> Bad</td>
              </tr>
              <tr>
                <td>5</td>
                <td>Documentation</td>
                <td><input type="radio" name="gender" value="male"> Good
             <input type="radio" name="gender" value="female"> Average
             <input type="radio" name="gender" value="female"> Bad</td>
              </tr>
              <tr>
                <td>6</td>
                <td>Source Code Evaluation By Committee Members</td>
                <td><input type="radio" name="gender" value="male"> Good
             <input type="radio" name="gender" value="female"> Average
             <input type="radio" name="gender" value="female"> Bad</td>
              </tr>
              <tr>
                <td>7</td>
                <td>Student Evaluation By Supervisor</td>
                <td><input type="radio" name="gender" value="male"> Good
             <input type="radio" name="gender" value="female"> Average
             <input type="radio" name="gender" value="female"> Bad</td>
              </tr>
            </table>
           
             
             
             
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