<?php
session_start();
if(isset($_SESSION['authenticated']) && isset($_POST)){
  $host = "localhost";
  $db_name = "happyflower";
  $charset = "utf8";
  $user = "admin";
  $pass = "admin";
  $dsn = "mysql:host=$host;dbname=$db_name;charset=$charset";

  $data = file_get_contents("php://input");
  var_dump($data);
  $good = json_decode($data, true);
  try{
    $dbh = new PDO($dsn, $user, $pass);
    if($good['id'] !== "null"){
      $query_update = $dbh ->prepare("UPDATE goods SET name=:name, price=:price, img_source=:img_source WHERE id=:id");
      $query_update->execute($good);
      echo "Item updated";
    } else {
      $query_insert = $dbh->prepare("INSERT INTO `goods`(`name`, `price`, `img_source`) VALUES (:name,:price,:img_source);");
      $query_insert->bindParam(':name', $good['name']);
      $query_insert->bindParam(':price', $good['price']);
      $query_insert->bindParam(':img_source', $good['img_source']);
//      $query_insert->execute($good);
      $query_insert->execute();
      echo "Item added";
    }
    $dbh = null;
  } catch (PDOException $e){
    die($e->getMessage());
  }
}

