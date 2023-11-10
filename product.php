<!DOCTYPE html>
<html lang="en">
<head>
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
      width: 100px;
    }
    .product-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      padding-top:5%;
    }
    .product-item {
      width: 23%;
      height:250px;
      margin-bottom: 20px;
      text-align: center;
      border:3px solid black;
    }
    .product-image {
      width: 100%;
      height: 50%;
    }
    .product-name {
      font-weight: bold;
      margin-top: 10px;
    }
    .product-price {
      margin-top: 5px;
    }
    .download-btn {
      text-align: center;
      margin-top: 20px;
    }
    .download-btn a {
      display: inline-block;
      padding: 10px 20px;
      background-color: #333;
      color: #fff;
      text-decoration: none;
    }
  </style>
</head>
<body>
  <div class="hero-content">
    <!-- <nav>
    <div class="logo">
        <img src="img/lll.jpeg" alt="Logo">
      </div>
      <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="pickup.php">Pickup request</a></li>
        <li><a href="product.php">Price list</a></li>
        <li><a href="track.php">Track request</a></li>
        <li><a href="contact.html">Contact us </a></li>
        <li><a href="feedback.php">Feedback</a></li>
      </ul>
      <div class="login">
        <a href="admin.php">
          <button type="submit">Admin login</button>
        </a>
      </div>
    </nav> -->

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

    <div class="product-container">
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

    // Fetch the product data from the database
    $query = "SELECT * FROM products";
    $result = mysqli_query($connection, $query);

    // Display the product data on the webpage
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="product-item">';
        echo '<img class="product-image" src="images/' . $row['image'] . '" alt="Product">';
        echo '<div class="product-name">' . $row['name'] . '</div>';
        echo '<div class="product-price">$' . $row['price'] . '</div>';
        echo '</div>';
    }

    // Close the database connection
    mysqli_close($connection);
    ?>
  </div>

  <div class="download-btn">
    <a href="price list.pdf" download>For more info, click here to download</a>
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
