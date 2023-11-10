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

// Check if the delete parameter is present in the URL
if (isset($_GET['id'])) {
    $productId = $_GET['id'];

    // Delete the product from the database
    $query = "DELETE FROM products WHERE id = $productId";
    $result = mysqli_query($connection, $query);

    if ($result) {
        echo '<script>alert("Product deleted successfully.");</script>';
        echo '<script>window.location.href = "change.php";</script>';
    } else {
        echo '<script>alert("Failed to delete the product: ' . mysqli_error($connection) . '");</script>';
        echo '<script>window.location.href = "change.php";</script>';
    }
}

// Close the database connection
mysqli_close($connection);
?>
