<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Users</title>
    <link rel="stylesheet" href="users-create.css?v=<?php echo time(); ?>">

    <script>
        function validateForm() {
            var name = document.getElementById("name").value;
            var username = document.getElementById("username").value;
            var email = document.getElementById("email").value;
            var password = document.getElementById("password").value;
            var role = document.getElementById("role").value;

            if (name == "" || username == "" || email == "" || password == "" || role == "") {
                alert("All fields must be filled out");
                return false;
            }

            var emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            if (!emailPattern.test(email)) {
                alert("Please enter a valid email address");
                return false;
            }

            if (role == "") {
                alert("Please select a role");
                return false;
            }

            return true;
        }
    </script>
</head>

<body>
    <?php
    include 'menu.php';
    ?>
    <div class="addusers">

        <form action="" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">

            <div class="users-body">
                <label for="name">Name</label><br>
                <input type="text" id="name" name="name" class="">
            </div>

            <div class="users-body">
                <label for="username">Username</label><br>
                <input type="text" id="username" name="username" class="">
            </div>

            <div class="users-body">
                <label for="email">Email</label><br>
                <input type="email" id="email" name="email" class="">
            </div>

            <div class="users-body">
                <label for="password">Password</label><br>
                <input type="text" id="password" name="password" class="">
            </div>

            <div class="users-body">
                <label>Select Role</label><br>
                <select name="role" id="role" class="">
                    <option value="">Select Role</option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select><br><br>
            </div>

            <div class="sb-btm">
                <input type="submit" value="Submit" name='submit'>
            </div>

        </form>
    </div>



    <?php
    include 'connection.php';
    $error = 0;

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $role = $_POST['role'];

        // if(empty($name) || empty($username)) {
        // header('location:users-create.php?message=Please fill your name and username');
        // }

        $result = mysqli_query($conn, "INSERT INTO `users`(`name`, `username`, `email`, `password`,`role`) 
                VALUES ('$name','$username','$email','$password','$role')");

        if (!$result) {
            die("Query Failed" . mysqli_error($conn));
        } else {
            header('Location: users-create.php?insert_msg=Data has been added successfully.');
        }
    }
    ?>

    <!--list of users-->
    <?php
    include 'connection.php';
    $sql = "SELECT * FROM users";
    $row = mysqli_query($conn, $sql);
    echo '
                   <div class="data">
                    <table >
                    <tr>
                    <th>USER ID</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Role</th>
                    <th colspan=2>Action</th>

                    </tr>
                    </div>
        ';


    while ($result = mysqli_fetch_assoc($row)) {
        echo '<tr>
                            <td>' . $result['userid'] . '</td>
                            <td>' . $result['name'] . '</td>
                            <td>' . $result['username'] . '</td>
                            <td>' . $result['email'] . '</td>
                            <td>' . $result['password'] . '</td>
                            <td>' . $result['role'] . '</td>
                            <td><a href="users-update-1.php?userid=' . $result['userid'] . '">Edit</a></td>
                            <td><a href="users-delete-1.php?userid=' . $result['userid'] . '">Delete</a></td>
    </tr>';

        echo '<br>';
    }
    echo '</table>';
    ?>

    </table>
    </div>
</body>

</html>