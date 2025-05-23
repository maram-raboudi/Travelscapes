<?php
session_start();
require_once 'admin/dbconnect.php'; // fichier où tu te connectes à la base de données

if (!isset($_SESSION['user_id'])) {
    // Rediriger si l'utilisateur n'est pas connecté
    header('Location: ./Login/login.php');
    exit();
}

$user_id = $_SESSION['user_id'];

// Requête pour obtenir le solde de l'utilisateur
$sql = "SELECT balance FROM users WHERE id = ?";
$sql = "SELECT balance FROM login WHERE usersid = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($balance);
$stmt->fetch();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Cart - Travelscapes</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>

<header>
    <h1>Welcome to Your Cart</h1>
</header>

<section class="cart-info">
    <h2>Your current balance:</h2>
    <p><strong><?php echo number_format($balance, 2); ?> DT</strong></p>
</section>

<a href="home.php" class="btn">Back to Home</a>

</body>
</html>
