<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "scrap";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Form submission handling
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $price = $_POST["price"];
    $image = $_FILES["image"]["name"];

    // Upload image file
    $targetDirectory = "images/";
    $targetFile = $targetDirectory . basename($image);
    move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile);

    // Insert new product into the database
    $sql = "INSERT INTO products (name, price, image) VALUES ('$name', '$price', '$image')";
    if (mysqli_query($conn, $sql)) {
        echo "New product added successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Close database connection
mysqli_close($conn);
?>



