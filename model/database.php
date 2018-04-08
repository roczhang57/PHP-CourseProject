<?php
$dsn = 'mysql:host=webdev.bentley.edu;dbname=f17team4';
$username = 'F17Team4';
$password = 'F17Team4';
$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

try {
    $db = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    include('../errors/database_error.php');
    exit();
}

function display_db_error($error_message) {
    include '../errors/database_error.php';
    exit;
}

?>