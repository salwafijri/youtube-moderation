<?php
$conn = new mysqli("localhost", "root", "", "yt_moderation");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>