<?php
include("header.advisor.php");

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