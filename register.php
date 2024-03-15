<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>
    <?php
        include 'home.php';
    ?>
    <button onclick="toggleForm()">Register</button>

    <div id="registerForm" class="form-popup">
        <form action="register.php" method="POST" class="form-container">
            <h2>Register</h2>
            <label for="username"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="username" required>

            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="email" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>

            <button type="submit" class="btn">Register</button>
            <button type="button" class="btn cancel" onclick="toggleForm()">Close</button>
        </form>
    </div>

    <script src="script.js"></script>
</body>
</html>
