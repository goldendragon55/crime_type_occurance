<?php
include ("config.php")
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Admin login</title>
</head>
<body>
    <div class="container">
        <div class="myform">
         <form method="post" action="">
            <h2>ADMIN LOGIN</h2>
            <INPut type="text" placeholder="Admin name" name="username">
                <input type="password" placeholder="password" name="password">
                <button type="submit" name="login">LOGIN</button>
         </form>
        </div>
        <div class="image"></div>
        <img src="./img/m.webp" width="250px"></img>
    </div>
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "select * from admin where username='" . $username . "' AND password='" . $password . "' ";
    $result = mysqli_query($conn, $sql);

    $total = mysqli_num_rows($result);
    //echo $total;

    if($total)
    {
        header("location:dashboard.html");
    }
    else{
        echo "<script>alert('Login Failed')</script>";
    }
}
?>