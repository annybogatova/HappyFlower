<?php
include './script/php/readsql.php';

?>

<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./pages/cart.css">

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
          <li class="list header__list"><a class="link header__link" href="shop.php">Магазин</a></li>
          <li class="list header__list"><a class="link header__link" href="./services.html">Услуги</a></li>
          <li class="list header__list"><a class="link header__link header__link_active"
              href="./delivery.html">Доставка</a></li>
          <li class="list header__list"><a class="link header__link" href="./blog.html">Блог</a></li>
        </ul>
      </div>
      <div class="header__menu">
        <a href="cart.php" class="box-bag">
          <img class="bag" src="./images/header/bag-icon.svg" alt="знак корзины">
        </a>
        <div class="hamburger">
          <input type="checkbox" id="hamburger__toggle">
          <label class="hamburger__btn" for="hamburger__toggle">
            <span></span>
          </label>
        </div>
      </div>
    </nav>
  </header>

  <main class="main">
    <section class="cart-items">
      <h2 class="main__headline">Корзина</h2>
        <div class="cart-items__container">
          <div class="cart-items__lines">
            <div class="cart-items__item">Продукт</div>
            <div class="cart-items__item">Цена</div>
            <div class="cart-items__item">Количество</div>
            <div class="cart-items__item">Сумма</div>
          </div>
          <?php
          $sum = 0;
          if(isset($_COOKIE["product_id"]) && isset($query_select)){
            $products = json_decode($_COOKIE["product_id"], true);
            while ($row = $query_select->fetch()){
              foreach ($products as $id => $value) {
                if($row['id'] == $id) {?>
                  <div class="cart-items__lines">
                    <div class="cart-items__item"><?=$row['name']?></div>
                    <div class="cart-items__item"><?=$row['price']?> р.</div>
                    <div class="cart-items__item">
                      <button type="button" class="button deleteOneFromCart" data-product-id="<?=$id?>">
                        -
                      </button>
                      <p><?=$value['count']?></p>
                      <button type="button" class="button addToCart"  data-product-id="<?=$id?>">
                        +
                      </button>
                    </div>
                    <div class="cart-items__item"><?=($row['price'] * $value['count'])?> р.</div>
                    <button type="submit" class="button deleteAllFromCart" data-product-id="<?=$id?>" >
                      <img src="images/cart/trash1.svg" alt="Удалить товар" class="cart-items__delete">
                    </button>
                  </div>

                  <?php
                  $sum += $row['price'] * $value['count'];
                }
              }
            }
          }?>
          <div class="cart-items__lines">
            <p class="cart-items__total-text">Общая стоимость:</p>
            <p class="cart-items__total-text"><?=$sum?> р.</p>
          </div>

        </div>
    </section>
  </main>
  <footer class="footer">
    <div class="footer__container">
      <div class="footer__email">
        <p class="footer__email_header">e-mail</p>
        <p class="footer__email_text">happyflover.l@gmail.com</p>
      </div>
      <div class="footer__adress">
        <p class="footer__adress_header">Адрес</p>
        <p class="footer__adress_text">г. Москва, м. Авиамоторная, ул. Первомайская, д. 18к2</p>
      </div>
      <div class="footer__time">
        <p class="footer__time_header">Время работы</p>
        <p class="footer__time_text">пн-пт: с 9.00 до 21.00 <br>
          сб-вс: с 11.00 до 20.00 <br>
          (кроме праздников)</p>
      </div>
      <div class="footer__social">
        <a class="footer__inst-icon" href="https://www.instagram.com/"></a>
        <a class="footer__vk-icon" href="https://vk.com/"></a>
        <a class="footer__fb-icon" href="https://ru-ru.facebook.com/"></a>
      </div>
    </div>
    <p class="footer__year">&copy; 2022 - 2023</p>
  </footer>
  <script src="script/storage.js"></script>
  <script
    src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
    crossorigin="anonymous"></script>

  <script>
    $('.deleteOneFromCart').on('click', function (){
      let productID = $(this).attr('data-product-id');
      $.ajax({
        url: './script/php/remove_from_cart.php',
        method: 'post',
        dataType: 'html',
        data: {product_id: productID},
        success: function (data){
          console.log(data);
          location.reload();
        }
      });
    });

    $('.deleteAllFromCart').on('click', function (){
      let productID = $(this).attr('data-product-id');
      $.ajax({
        url: './script/php/remove_from_cart.php',
        method: 'post',
        dataType: 'html',
        data: {product_id: productID, deleteAll: 1},
        success: function (data){
          console.log(data);
          location.reload();
        }
      });
    });

    $('.addToCart').on('click', function () {
      let productId = $(this).attr('data-product-id');
      $.ajax({
        url: './script/php/add_to_cart.php',
        method: 'post',
        dataType: 'html',
        data: {product_id: productId},
        success: function(data){
          location.reload();
          console.log(data);
        }
      });
    });
  </script>
</body>

</html>
