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
    .edit-form {
      display: none;
      margin-top: 10px;
    }
    .edit-form input {
      margin-bottom: 5px;
    }
    .edit-form button {
      padding: 5px 10px;
    }
    
  </style>
</head>
<body>
  <div class="hero-content">
    <nav>
      <div class="logo">
        <img src="img/hl.png" alt="Logo">
        <h2 class="brand">Halepaper</h2>
      </div>
      <ul>
        <li><a href="addadmin.php">Add admin</a></li>
        <li><a href="display.php">Accept and reject</a></li>
        <li><a href="addpro.php">Add product</a></li>
        <li><a href="change.php">Change details</a></li>
      </ul>
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

      if (isset($_GET['delete']) && isset($_GET['id'])) {
        $productId = $_GET['id'];
    
        // Delete the product from the database
        $query = "DELETE FROM products WHERE id = $productId";
        $result = mysqli_query($connection, $query);
    
        if ($result) {
            echo "Product deleted successfully.";
        } else {
            echo "Failed to delete the product: " . mysqli_error($connection);
        }
    }

      // Fetch the product data from the database
      $query = "SELECT * FROM products";
      $result = mysqli_query($connection, $query);

      // Display the product data on the webpage
      while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="product-item">';
        echo '<img class="product-image" src="images/' . $row['image'] . '" alt="Product">';
        echo '<div class="product-name">' . $row['name'] . '</div>';
        echo '<div class="product-price">₹        ' . $row['price'] . '</div>';
        echo '<button class="edit-button" onclick="showEditForm(' . $row['id'] . ')">Edit</button>';
        echo '<a href="delete.php?delete=1&id=' . $row['id'] . '" onclick="return confirm(\'Are you sure you want to delete this product?\')">Delete</a>';
        echo '<form class="edit-form" id="edit-form-' . $row['id'] . '" method="POST" action="update_pro.php">';
        echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
        echo '<input type="text" name="name" placeholder="Product Name" value="' . $row['name'] . '">';
        echo '<input type="number" name="price" placeholder="Product Price" value="' . $row['price'] . '">';
        echo '<button type="submit">Save</button>';
        echo '</form>';
        echo '</div>';
      }

      // Close the database connection
      mysqli_close($connection);
      ?>
    </div>
  </div>

  <script>
    function showEditForm(productId) {
      const editForm = document.getElementById('edit-form-' + productId);
      if (editForm.style.display === 'none') {
        editForm.style.display = 'block';
      } else {
        editForm.style.display = 'none';
      }
    }
  </script>
</body>
</html>
