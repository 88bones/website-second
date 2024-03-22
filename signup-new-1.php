<?php
session_start();


include 'connection.php';
include 'functions.php';


//both works to redirect the user to the login page if the user is not logged in
// if(!isset($_SESSION["user"])) {
//     header("Location: signin-new.php");
// }

// session_start();    

// include 'connection.php';
// include 'functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //something was posted
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    if (!empty($name) && !empty($username) && !is_numeric($username) && !empty($email) && !empty($password) && !empty($confirm_password) && ($password == $confirm_password)) {

        //save to database
        $sql = "INSERT INTO `users`(`name`, `username`, `email`, `password`) VALUES('$name', '$username','$email', '$password')";
        mysqli_query($conn, $sql);
        header('Location: signin-new.php');
        die;
        // exit;

    } else {
        echo "Please enter some valid information";
    }

    // $errors = array();

    // if(empty($name) OR !empty($username) OR !empty($email) OR !empty($password) OR !empty($confirm_password)){
    //     array_push($errors, "All fields are ");
    // }
    // if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    //     array_push($errors, "Please enter a valid email address");
    // }
    // if(strlen($password)<8) {
    //     array_push($errors, "Password must be at least 8 characters long");
    // }
    // if($password!== $confirm_password) {
    //     array_push($errors, "Passwords do not match");
    // } 
    // if(count($errors) > 0) {
    //     foreach($errors as $error) {
    //         echo "<div class='alert alert-danger'>$error</div>";
    //     }
    // } else {
    //     require_once 'connection.php';
    //     //save to database
    //      $sql = "INSERT INTO `users`(`name`, `username`, `email`, `password`) VALUES('$name', '$username','$email', '$password')";
    //      $stmt = mysqli_stmt_init($conn);
    //      $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
    //      if($prepareStmt) {
    //         mysqli_stmt_bind_param($stmt,"sss",$name,$username,$email,$password_hash);
    //         mysqli_stmt_execute($stmt);
    //         echo "<div class='alert alert-success'>You have registered successfully.</div>";
    //      } else {
    //         die;
    //      }
    //  mysqli_query($conn, $sql);
    //  header('Location: signin-new.php');
    //  die;
    // exit;
    // } 
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-Up</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="signup-new-1.css">

    <script src="https://kit.fontawesome.com/4591222058.js" crossorigin="anonymous"></script>
</head>

<body>

    <div class="container">
        <div class="form-box">
            <h1 id="title">Sign Up</h1>
            <form action="" class="" method="POST" onsubmit="return validation()">
                <div class="input-group">
                    <div class="input-field" id="nameField">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Name">
                    </div>

                    <div class="input-field">
                        <i class="fa-solid fa-circle-user"></i>
                        <input type="text" id="username" name="username" class="form-control" placeholder="Username">
                    </div>

                    <div class="input-field">
                        <i class="fa-solid fa-envelope"></i>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Email">
                    </div>

                    <div class="input-field">
                        <i class="fa-solid fa-key"></i>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                    </div>

                    <div class="input-field" id="cpassField">
                        <i class="fa-solid fa-key"></i>
                        <input type="password" id="repassword" name="confirm_password" class="form-control" placeholder="Confirm Password">
                    </div>

                    <p>Already have an account? Click <a href="signin-new.php">Here</a></p>
                </div>

                <div class="btn-field">
                    <button type="submit" class="enable" id="signupBtn">Sign Up</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        function validation() {
            let error = 0;
            const nameRegex = /^[a-zA-Z ]+$/;
            const userNameRegex = /^[a-zA-Z0-9_]+$/;
            const passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
           // const phoneRegex = /^\d{10}$/;
            const emailRegex = /^[^\s@]+@[^s@]+\.[^/s@]+$/;

            const name = document.getElementById('name').value;
            const uname = document.getElementById('usernamename').value;
            const pass = document.getElementById('password').value;
            const email = document.getElementById('email').value;

            if (!nameRegex.test(name)) {
                document.getElementById('nameError').style = 'display: block';
                error++;
            }
            if (!passwordRegex.test(passwordRegex)) {
                document.getElementById('passError').style = 'display: block';
                alert('Invalid password');
                error++;
                //console.log("hello");
            }
            if (!userNameRegex.test(uname)) {
                document.getElementById('unameError').style = 'display: block';
                error++;
            }

            if (!emailRegex.test(email)) {
                document.getElementById('emailError').style = 'display: block';
                error++;
            }
            if (error != 0) {
                return false;
                //preventDefault();
            }
        }
    </script>

</body>

</html>