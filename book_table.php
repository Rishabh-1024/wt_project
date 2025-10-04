<?php
// book_table.php

session_start();
require 'config.php'; // Database connection

// 1. Get POST values
$restaurant_id = $_POST['restaurant_id'];
$from_time = $_POST['from_time'];
$to_time = $_POST['to_time'];
$number_people = $_POST['number_people'];

// 2. Fetch restaurant name from database
$sql = "SELECT name FROM restaurants WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $restaurant_id);
$stmt->execute();
$stmt->bind_result($restaurant_name);
$stmt->fetch();
$stmt->close();

// 3. Store all booking info in session
$_SESSION['booking_info'] = [
    'restaurant_name' => $restaurant_name,
    'from_time' => $from_time,
    'to_time' => $to_time,
    'number_people' => $number_people
];

// 4. Redirect to confirmation page
header("Location: booking_confirmed.php");
exit();

?>
