<?php
session_start();
$host = 'localhost';
$user = 'root';
$pass = '';
$database = 'smile';
$conn = mysqli_connect($host, $user, $pass, $database);
if (!$conn) {
    echo "Somthing Wrong";
}
