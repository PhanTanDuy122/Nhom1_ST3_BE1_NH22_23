<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Detail</title>
	<link rel="stylesheet" type="text/css" href="public/css/style.css">
</head>
<body>
	<?php
	require "config.php";
	require "models/db.php";
	require "models/product.php";
	$product = new Product;
	if(isset($_GET['id'])):
		$id = $_GET['id'];
		$getProductById = $product -> getProductById($id);
	?>
	<div class='sanpham'>
		<img style="width:300px" src='./img/<?php echo $getProductById[0]['image'] ?>'>
		<h1><?php echo $getProductById[0]['name'] ?></h1>
		<b>Giá: </b> <span class='gia'><?php echo $getProductById[0]['price'] ?></span><br>
		<p><?php echo $getProductById[0]['description'] ?></p>
		<a class="addcart" href="cart.php?id=<?php echo $getProductById[0]['id'] ?>">Add To Cart</a>
	</div>
	<?php endif;?>
</body>
</html>