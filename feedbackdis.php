<!DOCTYPE html>
<html>
<head>
    <title>Display</title>
    <style>
        body {
            background: #D071f9;
        }
        table {
            background-color: white;
        }
    </style>
</head>
<body>

<?php
include("config.php");

$query = "SELECT * FROM feedback";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) != 0) {
    echo "<h2 align='center'><mark>Feedback</mark></h2>";
    echo "<center><table border='2' cellspacing='4' width='90%'>
           <tr>
            <th width='10%'>Name</th>
            <th width='20%'>Email</th>
            <th width='10%'>Subject</th>
            <th width='50%'>Message</th>
           </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
            <td>".$row['name']."</td>
            <td>".$row['email']."</td>
            <td>".$row['subject']."</td>
            <td>".$row['message']."</td>
        </tr>";
    }
    echo "</table></center>";
    mysqli_free_result($result);
} else {
    echo "<script>alert('Table has no recorded data')</script>";
}

mysqli_close($conn);
?>

<a href="dashboard.html" style="display: block; text-align: center; margin-top: 20px;">Back to Dashboard</a>

</body>
</html>
