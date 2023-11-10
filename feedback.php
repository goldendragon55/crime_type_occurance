<?php
include("config.php")
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
  <link rel="icon" href="img/hl.png">
    
    <title>Document</title>
<style>
body{
    background: black;
}

.title
{
    font-size: 24px;
    font-weight: 700;
    margin-bottom: 25px;
    text-transform: uppercase;
    color: black;
    text-align: center;
    padding-top:20%;
}

    form {
  max-width: 500px;
  margin: 0 auto;
  padding: 20px;
  background-color: #f9f9f9;
  border: 1px solid #ccc;
  border-radius: 5px;
}

label {
  display: block;
  margin-bottom: 10px;
  font-weight: bold;
}

input[type="text"],
input[type="email"],
textarea {
  width: 90%;
  padding: 10px;
  margin-bottom: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

textarea {
  height: 150px;
}

button[type="submit"] {
  background-color: #4CAF50;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

button[type="submit"]:hover {
  background-color: #45a049;
}

label{
  color:black;
}

input[type="text"]:focus,
input[type="email"]:focus,
textarea:focus {
  border: 2px solid #4CAF50;
}

input[type="text"]:invalid,
input[type="email"]:invalid,
textarea:invalid {
  border: 2px solid #ff0000;
}

input[type="text"]:valid,
input[type="email"]:valid,
textarea:valid {
  border: 2px solid #4CAF50;
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
    <form action="" method="POST">
        <div class="title">
            Feedback form
        </div>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
      
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
      
        <label for="subject">Subject:</label>
        <input type="text" id="subject" name="subject" required>
      
        <label for="message">Message:</label>
        <textarea id="message" name="message" required></textarea>
      
        <button type="submit" name="submit">Submit</button>
      </form> 
</body>
</html>

<?php
if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $em = $_POST['email'];
    $sb = $_POST['subject'];
    $mg = $_POST['message'];

    $query = "INSERT INTO feedback VALUES('$name','$em','$sb','$mg')";
    $data = mysqli_query($conn, $query);

    if ($data) {
      echo "<script>alert('Data inserted successfully'); window.location.href = 'homepage.html';</script>";
  } else {
      echo "<script>alert('Data insertion failed');</script>";
  }
  
}
?>
