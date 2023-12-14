<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./pages/admin.css">
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
<section class="registration">

  <?php
  session_start();
  if(isset($_SESSION['authenticated'])){
    ?>

    <form action="index.html" class="submit">
      <h2 class="main__headline">User page</h2>
      <a class="button logOut" href="/script/php/logout.php">Logout</a>
    </form>

    <?php
    if(isset($_SESSION['root'])){

    }
  } else{
  ?>

  <form method="post" action="shop.php" class="submit">
    <h2 class="main__headline">Admin sign-in</h2>
    <fieldset>
      <legend>Вход на сайт</legend>
      <div class="input__group">
        <label class="label" for="login">Логин: </label>
        <input class="input__login" id="login" type="text">
        <span class="error_message"></span>
      </div>
      <div class="input__group">
        <label class="label" for="password">Пароль: </label>
        <input class="input__password" id="password" type="password">
        <span class="error_message"></span>
      </div>
      <button class="button signIn" type="submit"> Вход </button>
    </fieldset>
  </form>

<?php
  }
?>
</section>
</main>
<footer class="footer">
</footer>
<script src="./script/admin.js"></script>

</body>

</html>

