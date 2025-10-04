<?php
// php/config.php
$servername = "localhost";
$username = "root";
$password = "";  // set your MySQL password here
$dbname = "momentum_eats";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Start session to track cart
session_start();
?>