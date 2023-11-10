<?php
// Replace the following variables with your own database credentials
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'scrap';

// Create a new connection
$connection = mysqli_connect($hostname, $username, $password, $database);

// Check if the connection was successful
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form submission was made
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the form data
    $productId = $_POST['id'];
    $productName = $_POST['name'];
    $productPrice = $_POST['price'];

    // Update the product information in the database
    $query = "UPDATE products SET name='$productName', price='$productPrice' WHERE id='$productId'";
    $result = mysqli_query($connection, $query);

    if ($result) {
        // Display a pop-up message using JavaScript
        echo '<script>alert("Product information updated successfully.");</script>';
        // Redirect the user back to the dashboard page
        echo '<script>window.location.href = "change.php";</script>';
        exit; // Terminate the script execution
    } else {
        echo "Error updating product information: " . mysqli_error($connection);
    }
}

// Close the database connection
mysqli_close($connection);
?>
