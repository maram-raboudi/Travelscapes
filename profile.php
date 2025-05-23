<?php
session_start();
// Dummy data – replace with database fetch in production
$user = [
    'name' => 'maram',
    'email' => 'maram@gmail.com',
    'mobile' => '53622111',
    'address' => '123 nakhil, tunis, tunisia',
    'profile_pic' => 'uploads/default.png'
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Profile - Travelscapes</title>
    <link rel="stylesheet" href="./css/profile.css">
    <style>
        .profile-container {
            max-width: 600px;
            margin: 40px auto;
            padding: 20px;
            border-radius: 10px;
            background-color: #f9f9f9;
        }
        .profile-container h2 {
            text-align: center;
        }
        .profile-info, .profile-photo {
            margin: 20px 0;
        }
        .profile-photo img {
            width: 150px;
            border-radius: 50%;
        }
        .form-group {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

<div class="profile-container">
    <h2>Your Profile</h2>

    <div class="profile-photo">
        <img src="<?php echo $user['profile_pic']; ?>" alt="Profile Picture">
    </div>

    <form action="upload_profile.php" method="post" enctype="multipart/form-data">
        <label for="photo">Update Profile Picture:</label>
        <input type="file" name="photo" id="photo">
        <input type="submit" value="Upload">
    </form>

    <div class="profile-info">
        <p><strong>Name:</strong> <?php echo htmlspecialchars($user['name']); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
        <p><strong>Mobile:</strong> <?php echo htmlspecialchars($user['mobile']); ?></p>
        <p><strong>Address:</strong> <?php echo htmlspecialchars($user['address']); ?></p>
    </div>
</div>
<script src="./js/profile.js"></script>
</body>
</html>
