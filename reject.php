<?php
// Include the configuration file
include("config.php");

// Check if the unique code parameter is present in the URL
if(isset($_GET['code'])) {
    $code = $_GET['code'];

    // Perform the reject operation
    $query = "UPDATE pickup SET status = 'Rejected' WHERE unique_code = '$code'";
    $result = mysqli_query($conn, $query);

    if($result) {
        // Reject operation successful
        header("Location: display.php");
        exit();
    } else {
        // Reject operation failed
        echo "Error rejecting the record: " . mysqli_error($conn);
    }
} else {
    // Redirect back to the display page if the unique code parameter is missing
    header("Location: display.php");
    exit();
}
?>
