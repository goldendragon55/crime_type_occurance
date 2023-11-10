<?php
// Check if the unique code is present in the URL
if (isset($_GET['code'])) {
  $uniqueCode = $_GET['code'];
} else {
  // If the unique code is not present, handle the error or redirect the user
  // For example, you can display an error message or redirect to another page
  //header("Location: error.php");
  //exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thank You</title>
  <style>
    body {
      background-color: #f1f1f1;
    }

    .message-box {
      width: 400px;
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }
  </style>
</head>
<body>
  <div class="message-box">
    <h3>Thank You! Your form submission was successful.</h3>
    <p>We appreciate your interest, and we will get back to you soon.</p>
  
    <?php if (isset($uniqueCode)) : ?>
      <p>Your unique code is: <?php echo $uniqueCode; ?></p>
    <?php endif; ?>
  </div>
</body>
</html>
