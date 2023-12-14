<?php
if(isset($_POST['product_id'])){
  if(isset($_COOKIE['product_id']))
    $tmp = json_decode($_COOKIE["product_id"], true);
  else
    $tmp = array();

  if(isset($tmp[$_POST["product_id"]])){
      $tmp[$_POST["product_id"]]["count"] += 1;
  } else{
      $tmp[$_POST["product_id"]]["count"] = 1;
  }
    setcookie("product_id", json_encode($tmp), time() + 60*60*24, "/");

  echo 'Продукт добавлен';
}
?>
