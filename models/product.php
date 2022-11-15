<?php
class Product extends Db
{
public function getAllProducts()
{
    // viet cau truy van
$sql = self::$connection->prepare("SELECT * 
FROM products 
ORDER BY `id` DESC LIMIT 0, 10" );
$sql -> execute(); // return object
$item = array();
$item = $sql -> get_result() -> fetch_all(MYSQLI_ASSOC);
return $item;
}

public function getProductById($id)
{
    // viet cau truy van
$sql = self::$connection->prepare("SELECT * FROM products WHERE id = ?");
$sql->bind_param("i",$id);
$sql -> execute(); // return object
$item = array();
$item = $sql -> get_result() -> fetch_all(MYSQLI_ASSOC);
return $item;
}

public function getProductByManu($manu_id)
{
    // viet cau truy van
$sql = self::$connection->prepare("SELECT * FROM products WHERE manu_id = ?");
$sql->bind_param("i",$manu_id);
$sql -> execute(); // return object
$item = array();
$item = $sql -> get_result() -> fetch_all(MYSQLI_ASSOC);
return $item;
}
}
?>