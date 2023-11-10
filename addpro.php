<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="home.css">
    <title>Add Product</title>
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
        input[type="number"],
        input[type="file"] {
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
    <h2>Add Product</h2>
    <form method="POST" action="add_product.php" enctype="multipart/form-data">
        <label for="name">Product Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="price">Product Price:</label>
        <input type="number" id="price" name="price" required>

        <label for="image">Product Image:</label>
        <input type="file" id="image" name="image">

        <input type="submit" value="Add Product">
    </form>
    </div>
</body>
</html>
