<?php
include("config.php");

// Check if the form submission was made
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Insert the username and password into the database
    $query = "INSERT INTO admin (username, password) VALUES ('$username', '$password')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Redirect to a success page
        header("Location: success.php");
        exit();
    } else {
        // Redirect back to the add-user.php page with an error parameter
        header("Location: add-user.php?error=" . urlencode(mysqli_error($conn)));
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Head content here -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
  <link rel="stylesheet" href="home.css">
  <link rel="stylesheet" href="font-awesome.min.css"> 
  <link rel="stylesheet" href="bootstrap.min.css">
  <link rel="stylesheet" href="css/linearicons.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <link rel="icon" href="img/hl.png">
  <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
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

        h2 {
            text-align: center;
            margin-top: 20px;
        }

        form {
            max-width: 300px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="hero-content">
        <!-- Navigation and form content here -->
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #08AEEA;
    background-image: linear-gradient(0deg, #08AEEA 0%, #2AF598 100%);
    ">
      <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="img/lll.jpeg" alt="Logo" style="width: 100px;"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="#">Pickup request</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="#">Price list</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="#">Track request</a>
            </li><li class="nav-item">
              <a class="nav-link active" href="#">Contact us</a>
            </li>

           
          </ul>
        </div>
      </div>
    </nav>
    <h2>Add User</h2>
    <form method="POST" action="">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <input type="submit" value="Add admin">
    </form>
</div>
    
    
    <?php
    if (isset($_GET['error'])) {
        // Display the error message if it exists
        echo "<script>alert('Error adding admin: " . $_GET['error'] . "');</script>";
    }
    ?>
</body>
</html>
