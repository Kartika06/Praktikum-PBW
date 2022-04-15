<?php 

$server = "localhost";
$user = "root";
$pass = "";
$database = "database";

$conn = mysqli_connect("localhost", "root", "", "database");

if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}

?>