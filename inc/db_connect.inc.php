<?php
// Database connection

$db = new mysqli('localhost', 'root', '', 'gallery_accounts');

// Error check
if ($db->connect_error) {
    $error = $db->connect_error;
    echo $error;
}

// Encode database connection
$db->set_charset('utf8');