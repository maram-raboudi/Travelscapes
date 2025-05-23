<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "travelscapes";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$hotelId = 1; // Replace with actual hotel ID
$cityId = 1;  // Replace with actual city ID
$journeyDays = 5; // You can make this dynamic later
$hotelDetails = ['hotelName' => 'N/A', 'hotelCost' => 0];
$cityName = 'N/A';

// Fetch hotel details
$hotelStmt = $conn->prepare("SELECT hotel, cost FROM hotels WHERE hotelid = ?");
$hotelStmt->bind_param("i", $hotelId);
$hotelStmt->execute();
$hotelResult = $hotelStmt->get_result();

if ($hotelResult->num_rows > 0) {
    $row = $hotelResult->fetch_assoc();
    $hotelDetails['hotelName'] = $row['hotel'];
    $hotelDetails['hotelCost'] = $row['cost'];
}

// Fetch city name
$cityStmt = $conn->prepare("SELECT city FROM cities WHERE cityid = ?");
$cityStmt->bind_param("i", $cityId);
$cityStmt->execute();
$cityResult = $cityStmt->get_result();

if ($cityResult->num_rows > 0) {
    $row = $cityResult->fetch_assoc();
    $cityName = $row['city'];
}

// Initial cost calculation
$initialCost = $hotelDetails['hotelCost'] * $journeyDays;

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/bookingform.css">
    <title>Booking Page</title>
</head>
<body>
    <div class="card-container">
        <div class="booking-details">
            <h2>Booking Details</h2>
            <p>City Name: <?php echo htmlspecialchars($cityName); ?></p>
            <p>Hotel Name: <?php echo htmlspecialchars($hotelDetails['hotelName']); ?></p>
        </div>

        <form method="post" action="./Payment_Interface/payment.html">
            <h2>Booking Form</h2>
            <input type="text" name="name" placeholder="Name" required><br>
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="number" name="tourists" id="touristsInput" placeholder="Number of Tourists" required><br>
            <label for="dob">Date of Birth:</label>
            <input type="date" name="dob" id="dob" required><br>
            <input type="tel" name="contact" placeholder="Contact Number" required><br>

            <p>Cost: Rs. <span id="calculatedCost"><?php echo $initialCost; ?></span></p>

            <button type="submit" name="proceed" value="Proceed">Proceed for Payment</button>
        </form>
    </div>

    <script>
        const touristsInput = document.getElementById("touristsInput");
        const calculatedCost = document.getElementById("calculatedCost");
        const initialCost = <?php echo $hotelDetails['hotelCost']; ?>;
        const journeyDays = <?php echo $journeyDays; ?>;

        function calculateCost() {
            const tourists = parseInt(touristsInput.value) || 0;
            const totalCost = initialCost * journeyDays * tourists;
            calculatedCost.textContent = totalCost;
        }

        touristsInput.addEventListener("input", calculateCost);
        calculateCost(); // Initial call
    </script>
</body>
</html>
