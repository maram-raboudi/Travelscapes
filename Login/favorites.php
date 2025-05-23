<?php
session_start();
if (!isset($_SESSION['usersuid'])) {
    header("Location: ../Login/loggin.php");
    exit();
}

if (isset($_GET['add'])) {
    $place = $_GET['add'];
    $_SESSION['favorites'][] = $place;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Favorite Places</title>
    <link rel="stylesheet" href="../css/favorites.css">
</head>
<body>

    <h1>Your Favorite Places</h1>
    <ul id="favorites-list">
    <?php
    if (!empty($_SESSION['favorites'])) {
        foreach ($_SESSION['favorites'] as $fav) {
            echo "<li>$fav</li>";
        }
    } else {
        echo "<li>No favorites yet.</li>";
    }
    ?>
    </ul>

    <script src="../js/favorites.js"></script>
</body>
</html>
