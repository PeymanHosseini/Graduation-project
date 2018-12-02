
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="css/style.css" type ="text/css" rel="stylesheet">
    
    <title>Itec403-404 Signup </title>
   
</head>
<body>
    <div id="container"> 
            <div id="login-container">
                <form action="includes/signup.inc.php" method="post" id="form">
                    <div class="title">
                       Student Signup Form
                    </div>
                    <div class="form-group">
                        <label for="username">*Email: </label>
                        <input type="text" name="email" id="email" class="form-control" placeholder="Enter your Email ..." required >
                        
                    </div>
                    <div class="form-group">
                        <label for="username">*Name: </label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter your Name ..." required>
                    </div>
                    <div class="form-group">
                        <label for="username">*FamilyName: </label>
                        <input type="text" name="fname" id="fname" class="form-control" placeholder="Enter your Familyname ..." required>
                    </div>
                    <div class="form-group">
                        <label for="username">*Telephone: </label>
                        <input type="text" name="tell" id="usetellrname" class="form-control" placeholder="Enter your Tellephone ..." required>
                    </div>
                    <div class="form-group">
                        <label for="password">*Password: </label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password ..."required>
                    </div>
                    <div class="form-group">
                        <label for="password">Course Code: </label>
                       <select name="coursecode" >
                           <option value="403">Itec 403</option>
                           <option value="404">Itec 404</option>
                       </select>
                       
                    </div>
                    
                   
                    <div class="form-group">
                    <input type="submit" value="SignUp "  class="form-btn" id="submit" name="signup">
                    
                    </div>
                    <div>
                        <?php
                        $url = "HTTP://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                        if(strpos($url,"signup=character")== true)
                        {
                            echo "<p class='error'>insert invalid character</p>";
                        }
                        if(strpos($url,"signup=invalidEmail")== true)
                        {
                            echo "<p class='error'>Invalid Email</p>";
                        }
                        if(strpos($url,"signup=emailExist")== true)
                        {
                            echo "<p class='error'>Email is exist i database</p>";
                        }
                        
                        ?>
                    </div>

                </form>
                
                
            </div>
    </div> 
    <script src="js/index.js"></script>
</body>
</html>