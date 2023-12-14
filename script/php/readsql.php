<?php
$host = "localhost";
$db_name = "happyflower";
$charset = "utf8";
$user = "user";
$pass = "user";
$dsn = "mysql:host=$host;dbname=$db_name;charset=$charset";
try{
  $dbh = new PDO($dsn, $user, $pass);
  $query_select = $dbh -> query("SELECT * FROM goods");
  $query_select -> setFetchMode(PDO::FETCH_ASSOC);

  if(isset($_GET['id'])){
    while ($row = $query_select->fetch()){
      if($row['id'] == $_GET['id']){
        $data = new stdClass();
        $data->name = $row['name'];
        $data->price = $row['price'];
        $data->img = $row['img_source'];
        echo json_encode($data);
      }
    }
  }

  $dbh = null;
} catch (PDOException $e){
  die($e->getMessage());
}
