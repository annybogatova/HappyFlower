<?php
session_start();

$success = false;

$host = "localhost";
$db_name = "happyflower";
$charset = "utf8";
$user = "user";
$pass = "user";
$dsn = "mysql:host=$host;dbname=$db_name;charset=$charset";
try{
  $dbh = new PDO($dsn, $user, $pass);
  $query_select = $dbh -> query("SELECT * FROM admin");
  $query_select -> setFetchMode(PDO::FETCH_ASSOC);

  if(isset($_POST)){
    $data = file_get_contents("php://input");
    $user = json_decode($data, true);

    while ($row = $query_select->fetch()){
      if($row['login'] == $user['login'] && md5($row['password']) == md5($user['password'])){
        $_SESSION['authenticated'] = true;
        $success = true;
        if ($user['login'] == "admin"){
          $_SESSION['root'] = "all";
        }
        echo  "Welcome, ".$user['login']."!";
      }
    }
    if(!$success){
      echo "Неверное имя пользователя или пароль.";
    }
  }
  $dbh = null;
} catch (PDOException $e){
  die($e->getMessage());
}

