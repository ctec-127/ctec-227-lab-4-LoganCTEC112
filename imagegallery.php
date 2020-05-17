<?php 
$pageTitle = "Gallery";
require 'inc/header.inc.php';
require_once 'inc/nav.inc.php';
session_start();
if (!isset($_SESSION['username'])) {
   header('location: login.php');
} else {
    $_SESSION['folder'] = 'user/' . $_SESSION['username'] . '/uploads'; 

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


    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        // what file do we need to move?
        $tmp_file = $_FILES['file_upload']['tmp_name'];
        // set target file name
        $target_file = basename($_FILES['file_upload']['name']);
        // set upload folder name
        $upload_dir = $_SESSION['folder'];
        if (move_uploaded_file($tmp_file, $upload_dir . "/" . $target_file)) {
            $message = "File uploaded successfully";
        } else {
            $error = $_FILES['file_upload']['error'];
            $message = $upload_errors[$error];
        }
    }
    

    require 'inc/gallerydisplay.inc.php';
    require 'inc/footer.inc.php';
} ?>
    
    <script src="script.js"></script>