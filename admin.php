<?php
    session_start();

    if(!isset($_SESSION['username'])){
        header('locatin: login.php');
        
    }
?>
<h1>day la trang admin</h1>
<a href="logout.php">
    <button type="submit" name = "dangxuat">Dang Xuat</button>
</a>