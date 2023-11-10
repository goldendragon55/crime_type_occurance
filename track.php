<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Head content... -->
  <meta charset="UTF-8">
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
    /* CSS styles... */
    html, body {
      height: 100%;
      margin: 0;
      padding: 0;
    }
    .hero-content {
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      min-height: 100vh;
    }
    .content {
      text-align: center;
      margin-top: 40px; /* Adjust the margin-top value as needed */
    }
    .search-form {
      display: flex;
      justify-content: center;
    }
    
    .search-input {
      padding: 10px;
      width: 500px;
      border: 1px solid black;
      border-radius: 300px;
      border: 1px solid #ccc;
    }

    .search-submit {
      background-color: #4CAF50;
      color: white;
      padding: 15px 30px;
      border: 1px;
      border-radius: 20px;
      cursor: pointer;
      margin-left: 10px;
    }

    .search-submit:hover {
      background-color: #45a049;
    }

    .status-box {
      background-color: white;
      padding: 20px;
      border-radius: 15px;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
      text-align: center;
      margin-top: 20px;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .status-heading {
      font-size: 25px;
      margin-bottom: 10px;
    }

    .status-message {
      color: black;
      margin-top: 10px;
      text-align: center;
    }

    .footer {
      flex-shrink: 0;
      background-color: #f5f5f5;
      text-align: center;
      padding: 20px;
    }

    h2 {
      color: black;
    }
  </style>
</head>
<body>
  <div class="hero-content">
    <!-- Navbar code... -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #08AEEA;
    background-image: linear-gradient(0deg, #08AEEA 0%, #2AF598 100%);">
      <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="img/lll.jpeg" alt="Logo" style="width: 100px;"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
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
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="#">Contact us</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="content">
      <!-- Content code... -->
      <h2>Please enter a unique code.</h2>

      <form class="search-form" method="GET" action="track.php">
        <input class="search-input" type="text" name="code" placeholder="Enter unique code" required>
        <input class="search-submit" type="submit" value="Search">
      </form>

      <?php
      include("config.php");

      // Check if the unique code parameter is present in the URL
      if(isset($_GET['code'])) {
        $code = $_GET['code'];

        // Fetch the record from the database based on the unique code
        $query = "SELECT * FROM pickup WHERE unique_code = '$code'";
        $result = mysqli_query($conn, $query);

        if (!$result) {
          die("Database query failed: " . mysqli_error($conn));
        }

        $row = mysqli_fetch_assoc($result);

        if ($row) {
          $status = $row['status'];
          $message = "";

          if ($status == "Accepted") {
            $message = "Thank you for your patience. The pickup will be done on the mentioned date.";
          } elseif ($status == "Rejected") {
            $message = "Sorry for the inconvenience. Your request has been rejected.";
          } else {
            $message = "Your request is still pending.";
          }

          // Display the status and message in a box
          echo "<div class='status-box'>";
          echo "<h2 class='status-heading'>Status: $status</h2>";
          echo "<p class='status-message'>$message</p>";
          echo "</div>";
        } else {
          echo "<p>No record found for the provided unique code.</p>";
        }
      }
      ?>
    </div>

    <div class="footer">
      <p>Phone: <a href="tel:+918951706046">+918951706046</a></p>
      <p>Email: info@mytrashrecycle.com</p>
    </div>

    <a href="https://wa.me/+918951706046" target="_blank" class="whatsapp-float">
      <img src="img/WhatsApp.png" alt="WhatsApp" width="40" height="40">
    </a>
  </div>
</body>
</html>

\