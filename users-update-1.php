<?php
include 'connection.php';
include 'menu.php';
$stylesheet_url = "users-update-1.css";
echo "<link rel='stylesheet' href='{$stylesheet_url}'>";

?>
<?php

if (isset($_GET['userid'])) {
    $userid = $_GET['userid'];


    $sql = "SELECT * FROM users WHERE userid = '$userid'";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Query failed" . mysqli_error($conn));
    } else {
        $row = mysqli_fetch_assoc($result);
        // print_r($row);
    }
}

?>


<?php
if (isset($_POST['update_users'])) {
    if (isset($_GET['userid_new'])) {
        $idnew = $_GET['userid_new'];
    }

    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $sql = "UPDATE users SET name = '$name', username = '$username', email = '$email', password = '$password', role = '$role' WHERE userid = '$idnew'";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Query failed" . mysqli_error($conn));
    } else {
        header('Location: users-create.php?update_msg=Data successfully updated.');
    }
}


?>
<div class="update">
    <form action="users-update-1.php?userid_new=<?php echo $userid; ?>" method="POST" enctype="multipart/form-data">

        <div class="users-body">
            <label for="name">Name</label><br>
            <input type="text" name="name" class="form-control" value="<?php echo $row['name'] ?>" required>
        </div>

        <div class="users-body">
            <label for="username">Username</label><br>
            <input type="text" name="username" class="form-control" value="<?php echo $row['username'] ?>">
        </div>

        <div class="users-body">
            <label for="email">Email</label><br>
            <input type="email" name="email" class="form-control" value="<?php echo $row['email'] ?>">
        </div>

        <div class="users-body">
            <label for="password">Password</label><br>
            <input type="text" name="password" class="form-control" value="<?php echo $row['password'] ?>">
        </div>

        <div class="users-body">
            <label>Select Role</label><br>
            <select name="role" class="">
                <option value="">Select Role</option>
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select><br><br>
        </div>

        <div class="sb-btm">
            <!-- <input type="submit" value="Submit" name='submit'> -->
            <input type="submit" class="btn btn-success" name="update_users" value="UPDATE">
        </div>

    </form>

</div>