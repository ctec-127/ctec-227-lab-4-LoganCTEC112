<?php 
$pageTitle = "Registration";
require 'inc/header.inc.php';
require 'inc/nav.inc.php';
require 'inc/functions.inc.php';
require_once 'inc/db_connect.inc.php';


if (is_post()) {
    $username = $db->real_escape_string(strtolower($_POST['username']));
    $email = $db->real_escape_string(strtolower($_POST['email']));
    $first_name = $db->real_escape_string($_POST['first_name']);
    $last_name = $db->real_escape_string($_POST['last_name']);
    $password = hash('sha512', $db->real_escape_string($_POST['password']));
    $sql = "INSERT INTO user (username,email,first_name,last_name,password)
                VALUES('$username','$email','$first_name','$last_name','$password')";

    // echo $sql;
    $result = $db->query($sql);

    if (!is_dir('user/' . $username)) {
        mkdir('user/' . $username);
        mkdir('user/' . $username . '/uploads');
        mkdir('user/' . $username . '/deleted');
    }

    if (!$result) {
        echo "<div>Something went wrong... Please try again.</div>";
    } else {        
        echo "<div class=\"container\">You have registered for an account!<br>";
        echo "<a href=\"login.php\" title=\"Login Page\">Login to start building your gallery.</a></div>";
    }
}
?>
<div class="container col-lg-8 col-md-8 col-sm-12 form-container">
<h1>Gallery Registration</h1>
<form action="register.php" method="POST" class="">
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" class="form-control" aria-describedby="usernameInfo">
        <small id="usernameInfo" class="form-text text-muted">This is used to let you see your own personal image gallery.</small>
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
    <label for="password">Password</label>
        <input type="password" id="password" name="password" class="form-control">
        <span id="showPassword" onclick="showPassword();">Show Password</span>
    </div>
    <button type="submit" class="btn btn-primary">Register</button>
    <button type="reset" class="btn btn-danger">Clear Form</button>
</form>
</div>
<script src="script.js"></script>
<?php require 'inc/footer.inc.php'; ?>