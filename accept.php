<?php
// Include the configuration file
include("config.php");

// Check if the unique code parameter is present in the URL
if(isset($_GET['code'])) {
    $code = $_GET['code'];

    // Perform the accept operation
    $query = "UPDATE pickup SET status = 'Accepted' WHERE unique_code = '$code'";
    $result = mysqli_query($conn, $query);

    if($result) {
        // Accept operation successful
        header("Location: display.php");
        exit();
    } else {
        // Accept operation failed
        echo "Error accepting the record: " . mysqli_error($conn);
    }
} else {
    // Redirect back to the display page if the unique code parameter is missing
    header("Location: display.php");
    exit();
}
?>
