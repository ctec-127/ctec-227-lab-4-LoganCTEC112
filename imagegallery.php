<?php 
require_once 'inc/functions.inc.php';
$pageTitle = "Gallery";
require 'inc/header.inc.php';
session_start();
// Finish line below once have login page done
$_SESSION['folder'] = 'Logan'; 

    // File upload error definitions
    $upload_errors = array(
        UPLOAD_ERR_OK                 => "No errors.",
        UPLOAD_ERR_INI_SIZE          => "Larger than upload_max_filesize.",
        UPLOAD_ERR_FORM_SIZE         => "Larger than form MAX_FILE_SIZE.",
        UPLOAD_ERR_PARTIAL             => "Partial upload.",
        UPLOAD_ERR_NO_FILE             => "Please select a file to upload",
        UPLOAD_ERR_NO_TMP_DIR         => "No temporary directory.",
        UPLOAD_ERR_CANT_WRITE         => "Can't write to disk.",
        UPLOAD_ERR_EXTENSION         => "File upload stopped by extension."
    );

    // $path1 = 'images/uploads';
    // $path2 = 'images/temp';
    // if (is_dir($path1)) {
    // } else {
    //     mkdir($path1);
    //     mkdir($path2);
    // }
    // ASK FOR HELP WITH THIS DON"T UNDERSTAND THE SOURCE DOCS FOR mkdir()

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        // what file do we need to move?
        $tmp_file = $_FILES['file_upload']['tmp_name'];
        // set target file name
        $target_file = basename($_FILES['file_upload']['name']);
        // set upload folder name
        $upload_dir = $_SESSION['folder'];
        if (move_uploaded_file($tmp_file, "uploads/" . $upload_dir . "/" . $target_file)) {
            $message = "File uploaded successfully";
        } else {
            $error = $_FILES['file_upload']['error'];
            $message = $upload_errors[$error];
        }
    }
    ?>
    <?php require_once 'inc/nav.inc.php'; ?>



    <?php
        if (isset($_SESSION['username'])) {
            require_once 'gallerydisplay.inc.php';
        } else {
            ?>
            <h1>Welcome to the Gallery, <?= isset($_SESSION['username']) ? $_SESSION['username'] : 'Please <a href="register.php">register</a> or <a href="login.php">login</a>' ?></h1>
            <?php
        }
    ?>

    

    <script src="script.js"></script>
<?php require 'inc/footer.inc.php'; ?>