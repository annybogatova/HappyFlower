<?php
    $goods = array(
      1000 =>array("name" => "Эхеверия Таурус", "price" => "400 p.", "img_source" => "./images/shop/plant1.png"),
      1001 =>array("name" => "Седум Шталя", "price" => "400 p.", "img_source" => "./images/shop/plant2.png"),
      1002 =>array("name" => "Граптопеталум Аметистовый", "price" => "400 p.", "img_source" => "./images/shop/plant3.png"),
      1003 =>array("name" => "Синокрассула Юннаньская", "price" => "400 p.", "img_source" => "./images/shop/plant4.png"),
      1004 =>array("name" => "Хавортия Купера", "price" => "400 p.", "img_source" => "./images/shop/plant5.png"),
      1005 =>array("name" => "Седум Буррито", "price" => "400 p.", "img_source" => "./images/shop/plant7.png"),
      1006 =>array("name" => "Мини-садик из суккулентов", "price" => "1500 p.", "img_source" => "./images/shop/plant6.png")
    );
?>


<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./pages/shop.css">
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
          <li class="list header__list"><a class="link header__link header__link_active" href="shop.php">Магазин</a>
          </li>
          <li class="list header__list"><a class="link header__link" href="./services.html">Услуги</a></li>
          <li class="list header__list"><a class="link header__link" href="./delivery.html">Доставка</a></li>
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
    <section class="plants">
      <h2 class="main__headline">Онлайн-магазин</h2>
      <div class="link plants__cards">
        <?php
        foreach ($goods as $id => $good){?>
          <form method="post" action="add_to_cart.php">
            <input type="hidden" name="product_id" value="<?=$id?>">
            <input type="hidden" name="product_name" value="<?=$good["name"]?>">
            <figure class="plants__card">
              <div class="plants__card-container">
                <img src="<?=$good["img_source"]?>" class="plants__card-image" alt="<?=$good["name"]?>">
                <button type="button" class="addToCart" data-product-id="<?=$id?>">
                  <img src="./images/shop/shopping-basket.png" alt="Корзина" class="plants__card-basket">
                </button>
              </div>
              <figcaption class="plants__card-text">
                <p class="plants__card-text-name"><?=$good["name"]?></p>
                <p class="plants__card-text-price"><?=$good["price"]?></p>
              </figcaption>
            </figure>
          </form>
          <?php
        }
        ?>
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
    <!--#config timefmt="%Y"-->
    <!--#set var="currentYear" value="$DATE_LOCAL"-->
    <p class="footer__year">&copy; 2022 - 2023<!--#echo var="currentYear"--> </p>
  </footer>
  <script src="./script/index.js"></script>


  <script
    src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
    crossorigin="anonymous"></script>

  <script>
    $('.addToCart').on('click', function () {
      //console.log($(this).attr('data-product-id'));
      let productId = $(this).attr('data-product-id');

      $.ajax({
        url: '/add_to_cart.php',
        method: 'post',
        dataType: 'html',
        data: {product_id: productId},
        success: function(data){
          //alert('success');
          //location.reload();
          console.log(data);
        }
      });
    });
  </script>

</body>

</html>
