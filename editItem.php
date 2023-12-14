<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./pages/edit.css">
  <title>Happy Flower</title>
</head>

<body class="page">
<header class="services-header">
  <nav class="nav header__nav">
    <div class="nav__container">
      <div class="box-logo">
        <img class="logo" src="./images/header/logo/logo.svg" alt="логотип цветочный магазинчик счастья">
      </div>
      <ul class="lists header__lists">
        <li class="list header__list header__list-main"><a class="link header__link header__link-main"
                                                           href="./index.html">HAPPYFLOWER</a>
        </li>
      </ul>
    </div>
  </nav>
</header>
<main class="main">
    <form method="post" action="script/php/add.php" class="edit" enctype="multipart/form-data">
      <fieldset>
        <legend>Edit item</legend>
        <div class="input__group">
          <label class="label" for="name">name: </label>
          <input class="input__login" id="name" type="text">
          <span class="error_message"></span>
        </div>
        <div class="input__group">
          <label class="label" for="price">price: </label>
          <input class="input__login" id="price" type="number">
          <span class="error_message"></span>
        </div>
        <div class="input__group">
          <label class="label" for="img">img_source: </label>
          <input class="input__login" id="img" type="text">
          <span class="error_message"></span>
        </div>
        <div class="input__group">
          <input type="file" name="plant_img" >
        </div>
        <button class="button changeDB" type="submit" id="action_btn"> Добавить </button>

      </fieldset>
    </form>
</main>
<footer class="footer">
</footer>

<script src="./script/index.js"></script>
<script src="./script/editItem.js"></script>

</body>

</html>
