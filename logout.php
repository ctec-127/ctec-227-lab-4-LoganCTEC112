<?php
session_start();
session_destroy();
header('location: login.php?message=You have been logged out, see you next time!');
?>