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
  $dbh = null;
} catch (PDOException $e){
  die($e->getMessage());
}
