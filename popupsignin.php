<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-in</title>
    <link rel="stylesheet" href="popupsignin.css?v=<?php echo time(); ?>">
</head>
<body>
    <?php
        include 'menu.php';
    ?>
<div class="big">
    <div class="center">
        <p id="show-login">Login</p>
    </div>
    <div class="popup">    
        <div class="container">
            <h2>Login</h2>
            <form action="login.php" method="POST">
                <div class="container-element">
                    <label for="username">Username: </label><br>
                    <input type="text" name="username" id="username" required> <br><br>
                </div>
                <div class="container-element">
                    <label for="password">Password: </label><br>
                    <input type="password" name="password" id="password" required> <br><br>
                </div>
                <!--<div class="container-element">
                    <label>Role: </label>
                    <select name="role" id="">
                        <option value="select-role">Select Role</option>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select><br><br>-->
                </div>
                <div class="container-element">    
                    <button id="loginBtn" class="btn" type="submit">Login</button><br><br>
                </div>
                <!-- <div class="container-element"> -->
                    <!-- <a href="#">Forgot Password?</a> -->
                <!-- </div>     -->

                <div >
                    <p>Don't have an account? Click Here.</p>
                    <button class="btn"><a href="signup.php">Register</a></button>
                </div>

            </form> 
        </div>
    </div>

    <!-- <script src="script.js"></script> -->

</body>
</html>
