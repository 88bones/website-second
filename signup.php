<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>
    
<?php 
    include 'menu.php';
?>

    <h2 class="">Sign-Up</h2>
    
    <form action="signup-db.php" method="POST">

        <div class="form-group">    
            <label for="username"><b>Name</b></label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" required><br>
        </div>

        <div class="form-group">
            <label for="username"><b>Username</b></label>
            <input type="text" class="formcontrol" id="username" name="username" placeholder="Enter Username" required><br>
        </div>

        <div class="form-group">
            <label for="email"><b>Email</b></label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email" required><br>
        </div>

        <div class="form-group">        
            <label for="password"><b>Password</b></label>
            <input type="text" class="form-control" id="password" name="password" placeholder="Enter Password" required><br>
        </div>

        <div class="form-group">        
            <label for="cpassword"><b>Confirm Password</b></label>
            <input type="password" class="form-control" id="password" name="cpassword" placeholder="Confirm Password" required><br>
            <small id="" class="">Enter the same password.</small>
        </div>

        <div class="form-group">
                    <label>Role: </label>
                    <select name="role" id="">
                        <option value="select-role">Select Role</option>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select><br><br>
                </div>

            <button type="submit" class="btn">Register</button>
            <!-- <button type="button" class="btn cancel" onclick="toggleForm()">Close</button> -->
        </form>

    </div>

    <!-- <script src="script.js"></script> -->
</body>
</html>
