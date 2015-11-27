<?php
    $username='root';
$password='Fdx&Ups2009';
$database='cms';

$mysqli = new mysqli('localhost', $username, $password, $database);

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
    }
?>
