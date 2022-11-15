<?php 
require "config.php";
require "models/db.php";
require "models/product.php"; 
    session_start();
    if(!isset($_SESSION['giohang'])) $_SESSION['giohang']=[];
    if (isset($_GET['del']) && ($_GET['del'] >= 0)) {
        array_splice($_SESSION['giohang'], $_GET['del'], 1);
    }
    if(isset($_POST['addcart']) && ($_POST['addcart'])){
        $hinh = $_POST['hinh'];
        $tensp = $_POST['tensp'];
        $gia = $_POST['gia'];
        $soluong =$_POST['soluong'];
        $sp = [$hinh, $tensp, $gia, $soluong];
        $_SESSION['giohang'][] = $sp;        

    }
    function showgiohang(){
        if (isset($_SESSION['giohang']) && (is_array($_SESSION['giohang']))) {
            $tong = 0;
            for ($i=0; $i < sizeof($_SESSION['giohang']); $i++) { 
                $tt = $_SESSION['giohang'][$i][2] * $_SESSION['giohang'][$i][3];
                $tong += $tt;
                echo '</tr>
                <tr>
                <td>'.($i + 1).'</td>               
                <td>'.$_SESSION['giohang'][$i][1].'</td>
                <td>'.$_SESSION['giohang'][$i][2].'</td>
                <td>'.$_SESSION['giohang'][$i][3].'</td>
                <td>
                    <div>'.$tt.'</div>
                </td>
                <td>
                    <a href = "cart.php?del='.$i.'">Delete</a>
                </td>
            </tr>';
            }
        }
        echo '<tr>
                <th colspan = "5">Tổng Đơn Hàng</th>
                <th>
                    <div>'.$tong.'</div>
                </th>
        </tr>';
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>cart</title>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
</head>

<body>
    <h1>Your cart</h1>
    <table border="1" cellspacing="0" cellpadding="5">
        <tr>
            <th>#id</th>
            <th>Product's Name</th>
            <th>Price</th>
            <th>Amount</th>
            <th>Into Money</th>
            <th>Delete</th>
            <?php showgiohang() ?>
            <!-- </tr>
		<tr>
		<td>p01</td>
		<td>Apple iPhone 5S Silver 16GB</td>	
		<td>2</td>
		<td>219.95</td>
		<td><a href="del.php?id=p01">Delete</a></td>
	</tr>
		<tr>
		<td>p02</td>
		<td>Apple iPhone 5C White 16GB</td>	
		<td>2</td>
		<td>183.95</td>
		<td><a href="del.php?id=p02">Delete</a></td>
	</tr> -->
    </table>
</body>

</html>