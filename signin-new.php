<?php

// session_start();

//     include 'connection.php';
//     include 'functions.php';



//both works to redirect the user to the login page if the user is not logged in
// if(!isset($_SESSION["user"])) {
// header("Location: signin-new.php");
//}

//start the session
session_start();

include 'connection.php';
include 'functions.php';

//check if the user is alreadylogged in, redirect to home page if true
// if(isset($_SESSION["username"])) {
// header("Location: home.php");
// exit;
// }

//check if the form is submitted
//     if($_SERVER['REQUEST_METHOD'] == 'POST') {

//         //something was posted
//         $username = $_POST['username'];
//         // $email = $_POST['email'];
//         $password = $_POST['password'];

//         //read from database
//         $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
//         $result = mysqli_query($conn, $sql);

//         if($result) {
//             //set session variables
//             $_SESSION["username"] = $username;
//             // $_SESSION["email"] = $email;
//             // $_SESSION["role"] = "admin";
//             header("Location: home.php");
//             exit;
//         } else {
//             header("Location: signin-new.php?error=invalid");
//             exit;
//         }
//     }

// check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // if(isset($name) || isset($username) || isset($email) || isset($password)) {

    //something was posted
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($username) && !is_numeric($username) && !empty($email) && !empty($password)) {

        //read from database
        $sql = "SELECT * FROM users WHERE username = '$username' AND email = '$email'";
        $result = mysqli_query($conn, $sql);

        if ($result) {

            if ($result &&  mysqli_num_rows($result) > 0) {

                $user_data = mysqli_fetch_assoc($result);

                if ($user_data['password'] === $password) {

                    $_SESSION['userid'] = $user_data['userid'];
                    header('Location: home.php');
                    die;
                }
            }
        }
    } else {
        echo "Please enter some valid information";
    }
    // }
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
                        <i class="fa-solid fa-envelope"></i>
                        <input type="email" id="text" name="email" class="form-control" placeholder="Email" required>
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