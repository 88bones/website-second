<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-in</title>
    <link rel="stylesheet" href="popupsignin.css">
</head>
<body>
    <div class="center">
        <p id="show-login">Login</p>
    </div>
    <div class="popup">
        <div class="close-btn">&times;</div>  <!--character entity representing x-->
        <div class="container">
            <h2>Login</h2>
            <form action="login.php" method="POST">
                <div class="container-element">
                    <label for="username">Username: </label>
                    <input type="text" name="username" id="username" required> <br><br>
                </div>
                <div class="container-element">
                    <label for="password">Password: </label>
                    <input type="password" name="password" id="password" required> <br><br>
                </div>
                <div class="container-element">    
                    <button type="submit">Login</button>
                </div>
                <div class="container-element">
                    <a href="#">Forgot Password?</a>
                </div>    
            </form> 
        </div>
    </div>
</body>
</html>
