<?php
session_start();

$targetDir = "uploads/";
$targetFile = $targetDir . basename($_FILES["photo"]["name"]);
$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
$allowed = ['jpg', 'jpeg', 'png', 'gif'];

if (in_array($imageFileType, $allowed) && move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFile)) {
    // Here you would update the database with the new file path
    echo "Profile picture uploaded successfully.<br><a href='profile.php'>Back to Profile</a>";
} else {
    echo "Upload failed.<br><a href='profile.php'>Back to Profile</a>";
}
