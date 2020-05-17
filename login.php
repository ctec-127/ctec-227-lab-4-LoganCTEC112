<?php 
$pageTitle = "Login";
session_start(); 
require 'inc/header.inc.php';
require 'inc/nav.inc.php';
require 'inc/functions.inc.php';
require_once 'inc/db_connect.inc.php';


if (is_post()) {
    $username = $db->real_escape_string($_POST['username']);
    $password = hash('sha512', $db->real_escape_string($_POST['password']));
 
    $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";

    $result = $db->query($sql);
    // echo $sql;
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION['username'] = $row['username'];
        header('location: imagegallery.php');
    } else {
        echo '<p>Incorrect username or password. Please try again</p>';
    }
}
?>

<div class="container col-lg-10 col-md-10 col-sm-12 form-container">
    <h1>Welcome to Gallery! Please login below or <a href="register.php">Register</a>.</h1>

    <form action="login.php" method="POST">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="form-control">
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control">
            <span id="showPassword" onclick="showPassword();">Show Password</span>
        </div>
        <input type="submit" value="Login" class="btn btn-success">

    </form>

</div>

<script src="script.js"></script>
<?php require 'inc/footer.inc.php'; ?>
