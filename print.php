<?php
include("config.php");

// Check if the unique code is provided
if (!isset($_GET["code"])) {
    echo "Invalid request.";
    exit();
}

$uniqueCode = $_GET["code"];

// Retrieve record from the database based on the unique code
$query = "SELECT * FROM pickup WHERE unique_code = '$uniqueCode'";
$result = mysqli_query($conn, $query);

if (!$result || mysqli_num_rows($result) == 0) {
    echo "Record not found.";
    exit();
}

$row = mysqli_fetch_assoc($result);

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Print Invoice</title>
    <style>
        /* CSS styles for the print view */
        body {
            font-family: Arial, sans-serif;
            background-color: #ffffff;
            margin: 0;
            padding: 20px;
        }
        .logo {
            display: flex;
            align-items: center;
        }
        .logo img {
            height: 40px;
            margin-right: 10px;
        }
        .brand {
            font-size: 24px;
        }
        .invoice-number {
            font-size: 16px;
            margin-top: 20px;
        }
        .customer-info {
            margin-top: 30px;
            font-size: 14px;
        }
        .pickup-details {
            margin-top: 20px;
            font-size: 14px;
        }
        .message {
            margin-top: 30px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="logo">
        <img src="img/hl.png" alt="Logo">
        <h2 class="brand">Halepaper</h2>
    </div>

    <h3 class="invoice-number">Invoice Number: <?php echo $row['unique_code']; ?></h3>

    <div class="customer-info">
        <p><strong>Name:</strong> <?php echo $row['name']; ?></p>
        <p><strong>Mobile:</strong> <?php echo $row['mobile']; ?></p>
        <p><strong>Email:</strong> <?php echo $row['Email']; ?></p>
        <p><strong>Address:</strong> <?php echo $row['address']; ?></p>
    </div>

    <div class="pickup-details">
        <p><strong>Date:</strong> <?php echo $row['date']; ?></p>
        <p><strong>Pickup From:</strong> <?php echo $row['pickup_from']; ?></p>
    </div>

    <p class="message"><?php echo $row['message']; ?></p>

    <script>
        window.onload = function() {
            window.print();
        }
    </script>
</body>
</html>
