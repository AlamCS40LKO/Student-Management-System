<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "school_management_system";

$data = mysqli_connect($host, $user, $password, $db);

if (!$data) {
    die("Failed to connect to the database");
}

?>