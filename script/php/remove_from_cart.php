<?php

if(isset($_POST['product_id'])){
  if(isset($_COOKIE['product_id']))
    $tmp = json_decode($_COOKIE["product_id"], true);

  if(isset($_POST["deleteAll"])){
    unset($tmp[$_POST['product_id']]);
  } else if($tmp[$_POST["product_id"]]["count"]>1){
    $tmp[$_POST["product_id"]]["count"] -= 1;
  } else{
    unset($tmp[$_POST['product_id']]);
  }
  setcookie("product_id", json_encode($tmp), time() + 60*60*24, "/");

  echo 'Удаление куки';
}
