<?php

// TODO: combine it with deleting as changeDB.php

session_start();
if (isset($_SESSION['authenticated']) && isset($_POST)) {

//  var_dump($_POST);

  $host = "localhost";
  $db_name = "happyflower";
  $charset = "utf8";
  $user = "admin";
  $pass = "admin";
  $dsn = "mysql:host=$host;dbname=$db_name;charset=$charset";

  if(isset($_POST['name']) && isset($_POST['price']) && isset($_POST['id']))
    if(isset($_FILES['myFile'])){
      try {
        if (
          !isset($_FILES['myFile']['error']) ||
          is_array($_FILES['myFile']['error'])
        ) {
          throw new RuntimeException('Invalid parameters.');
        }

        switch ($_FILES['myFile']['error']) {
          case UPLOAD_ERR_OK:
            break;
          case UPLOAD_ERR_NO_FILE:
            throw new RuntimeException('No file sent.');
          case UPLOAD_ERR_INI_SIZE:
          case UPLOAD_ERR_FORM_SIZE:
            throw new RuntimeException('Exceeded filesize limit.');
          default:
            throw new RuntimeException('Unknown errors.');
        }

        //check filesize
        if ($_FILES['myFile']['size'] > 1000000) {
          throw new RuntimeException('Exceeded filesize limit.');
        }

        // type check
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        if (false === $ext = array_search(
            $finfo->file($_FILES['myFile']['tmp_name']),
            array(
              'jpg' => 'image/jpeg',
              'png' => 'image/png',
              'gif' => 'image/gif',
            ),
            true
          )) {
          throw new RuntimeException('Invalid file format.');
        }


        $file = $_FILES['myFile'];
        $path = 'C:\xampp\htdocs\HappyFlower\images\shop\plants\\';
        $prep = explode('.', $file['name']);
        $fileExt = end($prep);
        $fileName = uniqid('image_') . "." . $fileExt;
        $fileLocation = $path . $fileName;
        $localpath = '/images/shop/plants/' . $fileName;

        $dbh = new PDO($dsn, $user, $pass);
        if ($_POST['id'] != "0") {
          $sql = "UPDATE goods SET name=:name, price=:price WHERE id=:id";

        } else {
          $sql = "INSERT INTO `goods`(`name`, `price`, `img_source`) VALUES (:name,:price,:img_source);";
        }

        $query = $dbh->prepare($sql);
        $query->bindParam(':name', $_POST['name']);
        $query->bindParam(':price', $_POST['price']);
        if ($_POST['id'] != "0") {
          $query->bindParam(':id', $_POST['id']);
        } else {
          $query->bindParam(':img_source', $localpath);
          move_uploaded_file($file['tmp_name'], $fileLocation);
        }
        $query->execute();
        echo "Success";
        $dbh = null;
      } catch (PDOException $e) {
        die($e->getMessage());
      } catch (RuntimeException $e) {
        echo "Error: ".$e->getMessage();
      }
    }
}





//session_start();
//if(isset($_SESSION['authenticated']) && isset($_POST)){
//
//  var_dump($_POST);
//
//  $host = "localhost";
//  $db_name = "happyflower";
//  $charset = "utf8";
//  $user = "admin";
//  $pass = "admin";
//  $dsn = "mysql:host=$host;dbname=$db_name;charset=$charset";
//
//  if(isset($_POST['name']) && isset($_POST['price']) && isset($_POST['img'])){
//    $good = array(
//      'name' => $_POST['name'],
//      'price' => $_POST['price'],
//      'id' => $_POST['id'],
//      'img' => $_POST['img']
//    );
//
//  }
//
////  $data = file_get_contents("php://input");
////  var_dump($data);
////  $good = json_decode($data, true);
//
//  if($file = $_FILES["plant_img"]) {
//    $path = __DIR__ . '\sourses\plants';
//    $subpath = explode(".", $file['name']);
//    $fileExt = end($subpath);
//    $filename = uniqid('plant_') . '.' . $fileExt;
//    $img_source = $path.$filename;
//    try {
//      $dbh = new PDO($dsn, $user, $pass);
//      if ($good['id'] !== "null") {
//        $query_update = $dbh->prepare("UPDATE goods SET name=:name, price=:price, img_source=:img_source WHERE id=:id");
//        $query_update->bindParam(':name', $good['name']);
//        $query_update->bindParam(':price', $good['price']);
//        $query_update->bindParam(':img_source', $img_source);
//        $query_update->execute();
//        move_uploaded_file($file['tmp_name'], $img_source);
////        $query_update->execute($good);
//        echo "Item updated";
//      } else {
//        $query_insert = $dbh->prepare("INSERT INTO `goods`(`name`, `price`, `img_source`) VALUES (:name,:price,:img_source);");
//        $query_insert->bindParam(':name', $good['name']);
//        $query_insert->bindParam(':price', $good['price']);
//        $query_insert->bindParam(':img_source', $img_source);
////      $query_insert->execute($good);
//        $query_insert->execute();
//        move_uploaded_file($file['tmp_name'], $img_source);
//
//        echo "Item added";
//      }
//      $dbh = null;
//    } catch (PDOException $e) {
//      die($e->getMessage());
//    }
//  }
//}
//
