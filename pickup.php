<?php
include("config.php")
?>
<?php
if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $pn = $_POST['pno'];
  $em = $_POST['email'];
  $address = $_POST['address'];
  $date = $_POST['date'];
  $pickup_from = $_POST['pickup_from'];
  $mg = $_POST['message'];

  


  // Assuming you have a database connection established
  // Replace the database credentials with your own
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "scrap";

  // Create a connection to the database
  $conn = mysqli_connect($servername, $username, $password, $dbname);

  // Check if the connection was successful
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Validate email
  if (!filter_var($em, FILTER_VALIDATE_EMAIL)) {
    echo '<script>alert("Invalid email address");</script>';
    exit;
  }

  // Validate mobile number
  if (!preg_match("/^[0-9]{10}$/", $pn)) {
    echo '<script>alert("Invalid mobile number");</script>';
    exit;
  }

  // Generate a unique code
  $uniqueCode = uniqid();

  // Insert the data into the pickup table along with the unique code
  $query = "INSERT INTO pickup (unique_code, name, mobile, Email, address, date, pickup_from, message)
  VALUES ('$uniqueCode', '$name', '$pn', '$em', '$address', '$date', '$pickup_from', '$mg')";
  $data = mysqli_query($conn, $query);

  // Check if the data insertion was successful
  if ($data) {
    mysqli_close($conn);
    header("Location: thankyou.php?code=$uniqueCode");
    exit;
  } else {
    echo '<script>alert("Data insertion failed");</script>';
  }
}
?>



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
  <link rel="stylesheet" href="pickup.css">
  <style>
    .hero-content{
    width: 100%;
    height: 150vh;
    background-position: center;
    background-size: cover;
    color: #fff;
}


.hero-content nav{
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding-left: 10%;
    padding-right: 16%;
    padding-top: 10px;
    border: 30%;
    background-color: lightseagreen;
}

.login{
  padding-left:2rem;
}

.hero-content nav .brand{
    font-size: 1.7rem;
    font-weight: bold;
}

.hero-content nav ul li{
    display: inline-block;
    padding-left: 2rem;
    font-size: 1rem;
    font-weight: bold;
}

.hero-content nav ul li a{
    color: #fff;
    text-decoration: none;
}

.hero-content nav ul li a:hover{
    color: black;
    transition: .5s;
}

.hero-content nav button{
    width: 150px;
    padding: 8px 0;
    background-color: blueviolet;
    border-radius: 0;
    border: none;
    outline: none;
    font-size: 1rem;
    font-weight: bold;
    color: #fff;
}

.hero-content nav button:hover{
    transform: scale(1.1);
    transition: .5s;
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
      width: 100px;
    }

      button[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 18px 25px;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        width: 30%;
      }

      button[type="submit"]:hover {
        background-color: #45a049;
      }
  </style>
</head>
<body>
  <div class="hero-content">
    <!-- <nav>
    <div class="logo">
        <img src="img/lll.jpeg" alt="Logo">
      <ul>
        <li><a href="homepage.html">Home</a></li>
        <li><a href="pickup.php">Pickup request</a></li>
        <li><a href="product.php">Price list</a></li>
        <li><a href="track.php">Track request</a></li>
        <li><a href="contact.html">Contact us</a></li>
        <li><a href="feedback.php">Feedback</a></li>
      </ul>
      <div class="login">
        <a href="admin.php">
          <button type="submit">Admin login</button>
        </a>
      </div>
    </nav> -->
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
    <form action="pickup.php" method="POST"> <!-- Updated action attribute -->
      <div>
        <h1 style="color:black; padding-left: 3%; font-family: Arial, Helvetica, sans-serif;">PICKUP REQUEST FORM</h1>
        <h4 style="color: gray; padding-left: 3%;">Leave your info and we will get back to you soon</h4>
      </div>
      <label for="name">Name*</label>
      <input title="name" type="text" placeholder="Enter your name" name="name" required>
      <label for="mobile">Mobile*</label>
      <input title="mobile" type="text" placeholder="Enter your mobile number" name="pno" required>
      <label for="Email">Email*</label>
      <input title="Email" type="text" placeholder="Enter your Email" name="email" required>
      <label for="Address">Address*</label>
      <textarea id="address" name="address" placeholder=" please enter your full address*" required></textarea>
      <h5 style="color: red;">* still we are trying to extend our service and locations</h5>
      <label for="date">Date*</label>
      <input title="date" type="date"  name="date" required>
      <label for="pickup">Pickup From*</label>
      <select name="pickup_from" required>
        <option value="apartment">Apartment</option>
        <option value="individual_house">Individual house</option>
        <option value="school_college">School/College</option>
        <option value="corporate_office">Corporate office</option>
        <option value="industry">Industry</option>
        <option value="other">Other - please mention below</option>
      </select>
      <label for="message">Message:</label>
      <textarea id="message" name="message" placeholder="What do you want to sell? or Message for us *" required></textarea>
      <button type="submit" name="submit">Send Message</button>
      <h4 style="color: gray;">* These fields are required. We do not share your information with third parties.</h4>
    </form>
    <div class="footer">
      <p>Phone: <a href="tel:+918951706046">+918951706046</a></p>
      <p>Email: info@mytrashrecycle.com</p>
      </div>
    <div>
      <a href="https://wa.me/+918951706046" target="_blank" class="whatsapp-float">
        <img src="img/WhatsApp.png" alt="WhatsApp" width="40" height="40">
      </a>
    </div>
    </div>
    </body>
</html>


