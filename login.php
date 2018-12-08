
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="css/style.css" type ="text/css" rel="stylesheet">
    
    <title>Itec403-404 Login Page</title>
</head>
<body>
    <div id="container"> 
            <div id="login-container">
                <form action="includes/login.inc.php" method="post" id="form">
                    <div class="title">
                        Log In
                    </div>
                    <div class="form-group">
                        <label for="username">Email: </label>
                        <input type="text" name="email" id="username" class="form-control" placeholder="Enter Email ...">
                    </div>
                    <div class="form-group">
                        <label for="password">Password: </label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password ...">
                    </div>
                    <div class="form-group">
                        <label for="password">User Type: </label>
                       <select name="usertype" >
                           <option value="admin">Admin</option>
                           <option value="student">Student</option>
                           <option value="adviser">Staff</option>
                       </select>
                    </div>
                    <div class="form-group">
                    <input type="submit" value="Login >>"  class="form-btn" id="submit" name="submit">
                    
                    </div>

                </form>

            </div>
    </div> 
    <script src="js/index.js"></script>
</body>
</html>