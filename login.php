<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Detail</title>
	<link rel="stylesheet" type="text/css" href="public/css/style.css">
</head>
<body>
    <form action="login.php" method = "post">
        <label for="username" class = "form-lable">Username: </label>
        <input type="text" name = "username" >
        <label for="password" class = "form-lable">Password: </label>
        <input type="password" name = "password">
        <input type="submit">
    </form>
    <?php
    include 'indexlogin.php';
    require "config.php";
	require "models/db.php";
	require "models/product.php";
    $username = "";
    $password = "";
    $tam = '';
    if(isset($_SESSION['username'])){
        header('location: admin.php');
    }
    if(isset($_POST["username"])&&isset($_POST["password"])){
        $username = $_POST["username"];
        $password = $_POST["password"];
        $tam = new User($username, $password, "", "");
        if($tam -> login($username, $password)){
            // echo "Logged in successfully";
            $_SESSION['username'] = $username;
            header('location: admin.php');
        }
        else{
            echo "Logged unsuccess";
        }
    }
    ?>
</body>
</html>