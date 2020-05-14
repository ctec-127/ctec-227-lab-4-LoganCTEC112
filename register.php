<?php 
$pageTitle = "Registration";
require 'inc/header.inc.php';
require 'inc/nav.inc.php';
require 'inc/functions.inc.php';
require_once 'inc/db_connect.inc.php';
// Create if statement to make sure uploads folder exists
session_start(); 

if (is_post()) {
    $username = $db->real_escape_string($_POST['username']);
    $email = $db->real_escape_string($_POST['email']);
    $first_name = $db->real_escape_string($_POST['first_name']);
    $last_name = $db->real_escape_string($_POST['last_name']);
    $password = hash('sha512', $db->real_escape_string($_POST['password']));
    $sql = "INSERT INTO user (username,email,first_name,last_name,password)
                VALUES('$username','$email','$first_name','$last_name','$password')";

    echo $sql;
    $result = $db->query($sql);

    if (!$result) {
        echo "<div>Something went wrong... Please try again.</div>";
    } else {        
        folder_checker($username);
        echo "<div class=\"container\">You have registered for an account!<br>";
        echo "<a href=\"login.php\" title=\"Login Page\">Login to start building your gallery.</a></div>";
    }
}
?>
<div class="container col-lg-10 col-md-10 col-sm-12">
<h1>Gallery Registration</h1>
<form action="register.php" method="POST" class="">
    <div class="form-group">
        <!-- Add a way to disallow special characters for username -->
        <label for="username">Username</label>
        <input type="text" id="username" name="username" class="form-control" aria-describedby="usernameInfo">
        <small id="usernameInfo" class="form-text text-muted">This will be used to create your Gallery.</small>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" class="form-control">
    </div>
    <div class="form-group">
        <label for="first_name">First Name</label>
        <input type="text" id="first_name" name="first_name" class="form-control">
    </div>
    <div class="form-group">
    <label for="last_name">Last Name</label>
        <input type="text" id="last_name" name="last_name" class="form-control">
    </div>
    <div class="form-group">
        <!-- Add JavaScript to handle show/hide password -->
    <label for="password">Password</label>
        <input type="password" id="password" name="password" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Register</button>
    <button type="reset" class="btn btn-danger">Clear Form</button>
</form>
</div>

<?php require 'inc/footer.inc.php'; ?>