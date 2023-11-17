<?php

if(isset($_POST['product_id'])){
  if(isset($_COOKIE['product_id']))
    $tmp = json_decode($_COOKIE["product_id"], true);
    unset($tmp[$_POST['product_id']]);
    setcookie("product_id", json_encode($tmp));

  echo 'Удаление куки';
}
