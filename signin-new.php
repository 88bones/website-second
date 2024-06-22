<?php

// Start the session
session_start();

include 'connection.php';
include 'functions.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Retrieve posted data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate the input
    if (!empty($username) && !is_numeric($username) && !empty($password)) {

        // Read from database
        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            if ($result && mysqli_num_rows($result) > 0) {
                $user_data = mysqli_fetch_assoc($result);

                // Check if the password matches
                if ($user_data['password'] === $password) {

                    // Set session variables
                    $_SESSION['userid'] = $user_data['userid'];
                    $_SESSION['username'] = $user_data['username'];
                    $_SESSION['role'] = $user_data['role'];

                    // Redirect based on the role
                    if ($user_data['role'] === 'admin') {
                        header('Location: admin-page.php');
                    } else {
                        header('Location: home.php');
                    }
                    die;
                }
            }
        }
    } else {
        echo "Please enter some valid information";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-In</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="signin-new.css?v=<?php echo time(); ?>">

    <script src="https://kit.fontawesome.com/4591222058.js" crossorigin="anonymous"></script>
</head>

<body>

    <div class="container">
        <div class="form-box">
            <h1 id="title">Sign In</h1>
            <form action="" method="POST">
                <div class="input-group">
                    <div class="input-field">
                        <i class="fa-solid fa-circle-user"></i>
                        <input type="text" id="text" name="username" class="form-control" placeholder="Username" required>
                    </div>

                    <div class="input-field">
                        <i class="fa-solid fa-key"></i>
                        <input type="password" id="text" name="password" class="form-control" placeholder="Password" required>
                    </div>

                    <p class="lol">Don't have an account? Click <a href="signup-new-1.php">Here</a></p>
                </div>
                <div class="btn-field">
                    <button type="submit" name="login" class="disable" id="signinBtn">Sign In</button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>