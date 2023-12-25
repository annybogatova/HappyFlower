<?php

try{

  if (isset($_POST['id'])){

    $host = "localhost";
    $db_name = "happyflower";
    $charset = "utf8";
    $user = "admin";
    $pass = "admin";
    $dsn = "mysql:host=$host;dbname=$db_name;charset=$charset";

    $dbh = new PDO($dsn, $user, $pass);

    if(isset($_POST['delete-img'])){
      $sql = "SELECT `id`, `name`, `price`, `img_source` FROM `goods` WHERE id=:id;";
      $query_select = $dbh->prepare($sql);
      $query_select->bindParam(':id', $_POST['id']);
      $query_select->execute();
      $query_select->setFetchMode(PDO::FETCH_ASSOC);
      $row = $query_select->fetch();
      $path = 'C:\xampp\htdocs\HappyFlower';
      $path = $path.($row['img_source']);

      if(file_exists($path)){
        unlink($path);
      }
      $dbh2 = null;
    }

    $sql = "DELETE FROM `goods` WHERE `goods`.`id` = :id;";
    $query = $dbh->prepare($sql);
    $query->bindParam(':id', $_POST['id']);
    $query->execute();
    $dbh = null;
    echo "Success";
  }

} catch (PDOException $e){
  die($e->getMessage());
}
