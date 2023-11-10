<?php
include("config.php");
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="home.css">
    <title>Display</title>
    <style>
        body {
            background: #D071f9;
        }
        table {
            background-color: white;
        }
        .accept,.reject,.print{
            background-color: green;
            color: white;
            border: 0;
            outline: none;
            border-radius: 5px;
            height: 22px;
            width: 80px;
            font-weight: bold;
            cursor: pointer;
        }
        .reject{
            background-color: red;
        }
        .print{
            background-color: blue;
        }
        .hero-content {
      background-color: white;
      color: black;
    }
    .logo {
      display: flex;
      align-items: center;
    }
    .logo img {
      height: 40px; /* Adjust the height as needed */
      margin-right: 10px;
    }
    </style>
</head>
<body>

<?php
include("config.php");

$query = "SELECT * FROM pickup";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Database query failed: " . mysqli_error($conn));
}

$total = mysqli_num_rows($result);

if ($total != 0) {
    echo "<h2 align='center'><mark>Members Information</mark></h2>";
    echo "<center><table border='2' cellspacing='4' width='100%'>
           <tr>
            <th width='3%'>ID</th>
            <th width='10%'>unique_code</th>
            <th width='10%'>Name</th>
            <th width='20%'>Mobile</th>
            <th width='8%'>Email</th>
            <th width='8%'>Address</th>
            <th width='8%'>date</th>
            <th width='4%'>pickup_from</th>
            <th width='4%'>message</th>
            <th width='30%'>operations</th>
           </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
            <td>".$row['id']."</td>
            <td>".$row['unique_code']."</td>
            <td>".$row['name']."</td>
            <td>".$row['mobile']."</td>
            <td>".$row['Email']."</td>
            <td>".$row['address']."</td>
            <td>".$row['date']."</td>
            <td>".$row['pickup_from']."</td>
            <td>".$row['message']."</td>
            

            <td>
                <a href='accept.php?code=$row[unique_code]'><input type='submit' value='accept' class='accept'></a>
                <a href='reject.php?code=$row[unique_code]'><input type='submit' value='reject' class='reject' onclick='return checkReject()'></a>
                <a href='print.php?code=$row[unique_code]'><input type='submit' value='Print' class='print'></a>
            </td>
           </tr>";
    }

    echo "</table></center>";
} else {
    echo "<script>alert('Table has no recorded data')</script>";
}
?>
<a href="dashboard.html" style="display: block; text-align: center; margin-top: 20px;">Back to Dashboard</a>
</body>
</html>


<script>
function checkReject()
{
    return confirm('Are you sure you want to reject this record?');
}
</script>
