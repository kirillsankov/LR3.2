<?php
$sql = 'SELECT * FROM `list_of_companies`';
if(!isset($_COOKIE["sql"])){
    createCookieSql($sql,"list_of_companies");
}
if(isset($_GET["companies"])&&$_GET["companies"] == "yes"){
    createCookieSql($sql,"list_of_companies");
}
else if(isset($_GET["indicators"])&&$_GET["indicators"] == "yes"){
    createCookieSql('SELECT * FROM `list_of_indicators`',"list_of_indicators");
}
else if(isset($_GET["regions"])&&$_GET["regions"] == "yes"){
    createCookieSql('SELECT * FROM `list_of_regions`',"list_of_regions");
}
else if(isset($_GET["entries"])&&$_GET["entries"] == "yes") {
    createCookieSql('SELECT * FROM `log_entries`',"log_entries");
}

if(isset($_GET["name"]) && $_GET["name"] !="" && (!isset($_GET["id"]) || $_GET["id"] == "")){
    $sql = $_COOKIE["mainRequest"] .  "WHERE name LIKE '".$_GET["name"]."%'";
    createCookieSqlFilter($sql);
}
if(isset($_GET["id"]) && $_GET["id"] !="" && (!isset($_GET["name"]) || $_GET["name"] == "")){
    $sql = $_COOKIE["mainRequest"] .  "WHERE id LIKE ".$_GET["id"];
    createCookieSqlFilter($sql);
}
if((isset($_GET["id"]) && $_GET["id"] !="") && (isset($_GET["name"]) && $_GET["name"] != "")){
    $sql = $_COOKIE["mainRequest"] .  "WHERE id LIKE ".$_GET["id"] . " AND name LIKE '".$_GET["name"]."%'";
    createCookieSqlFilter($sql);
}


function createCookieSql($sqlRequest, $title)
{
    setcookie("title", $title, time()+3600);
    $sql = $sqlRequest;
    setcookie("sql",$sql,time()+3600);
    setcookie("mainRequest", $sql, time()+3600);
    header('Location: /site(LR_3.2)/');
}
function createCookieSqlFilter($sqlRequest)
{
    setcookie("sql",$sqlRequest,time()+3600);
    header('Location: /site(LR_3.2)/');
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/291a12d8a4.js" crossorigin="anonymous"></script>
    <title>Cart</title>
</head>
<body>
    <header>
        <div class="heading">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <a href="#"><img class="logo-img" src="img/logo.png" alt="Логотип"></a>
                    </div>
                    <div class="col-md-3">
                        <p class="title_site">Покупка и продажа <br>
                            оборудования для бизнеса</p>
                    </div>
                    <div class="col-md-3">
                        <form class="form-search  adaptiv_search" action="#">
                            <input class="inpu-search" type="search" name="text" id="searchID"
                                   placeholder="Найти оборудование">
                            <button class="btn-search">
                                <img class="img-search" src="img/search.png" alt="">
                            </button>
                        </form>
                    </div>
                    <div class="col-md-3 margin-fix">
                        <a class="register" href="#">Регистрация</a>
                        <input class="login" type="button" value="Войти">
                    </div>
                </div>
            </div>
        </div>
        <div class="menu">
            <div class="container">
                <div class="row row-menu">
                    <div class="col-md-8 menu-list">
                        <ul class="menu-ul">
                            <li class="nav-item dropdown white-text text-orange">
                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                                   aria-expanded="false">ОБОРУДОВАНИЕ</a>
                                <ul class="dropdown-menu text-orange bg-black">
                                    <li><a class="dropdown-item" href="#">Автомобилестроение</a></li>
                                    <li><a class="dropdown-item" href="#">Биотопливо и альтернативная энергетика</a></li>
                                    <li><a class="dropdown-item" href="#">Деревообрабатывающее оборудование</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Добывающее и промысловое оборудование</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown white-text text-orange">
                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                                   aria-expanded="false">ПРЕДПРИЯТИЯ</a>
                                <ul class="dropdown-menu text-orange bg-black">
                                    <li><a class="dropdown-item" href="#">Автомобилестроение</a></li>
                                    <li><a class="dropdown-item" href="#">Биотопливо и альтернативная энергетика</a></li>
                                    <li><a class="dropdown-item" href="#">Деревообрабатывающее оборудование</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Добывающее и промысловое оборудование</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown white-text text-orange">
                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                                   aria-expanded="false"> ДОСКА ОБЪЯВЛЕНИЙ</a>
                                <ul class="dropdown-menu text-orange bg-black">
                                    <li><a class="dropdown-item" href="#">Доска объявлений по пищевому оборудованию</a></li>
                                    <li><a class="dropdown-item" href="#">Производство металлов / металлообрабатывающее
                                        оборудование</a></li>
                                    <li><a class="dropdown-item" href="#"> Сварочное оборудование / сварочные материалы</a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Электрооборудование и материалы</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown white-text text-orange">
                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                                   aria-expanded="false">БИЗНЕС ИДЕИ</a>
                                <ul class="dropdown-menu bg-black">
                                    <li><a class="dropdown-item" href="#">Автобизнес</a></li>
                                    <li><a class="dropdown-item" href="#">Бизнес в интернете</a></li>
                                    <li><a class="dropdown-item" href="#">Бизнес идеи для села</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Бизнес идеи с минимальными вложениями</a></li>
                                </ul>
                            </li>
                            <li class="text-white text-orange link"><a href="#">МАГАЗИН ЗАЯВОК</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <ul class="menu-ul">
                            <li class="nav-item dropdown white-text text-orange">
                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                                   aria-expanded="false">Новости</a>
                                <ul class="dropdown-menu text-orange bg-black">
                                    <li><a class="dropdown-item" href="#">Власть и бизнес</a></li>
                                    <li><a class="dropdown-item" href="#">Финансы</a></li>
                                    <li><a class="dropdown-item" href="#">Оборудование</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Потребрынок</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown white-text text-orange">
                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                                   aria-expanded="false">Статьи</a>
                                <ul class="dropdown-menu text-orange bg-black">
                                    <li><a class="dropdown-item" href="#">Власть и бизнес</a></li>
                                    <li><a class="dropdown-item" href="#">Финансы</a></li>
                                    <li><a class="dropdown-item" href="#">Оборудование</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Потребрынок</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown white-text text-orange">
                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                                   aria-expanded="false">Интервью</a>
                                <ul class="dropdown-menu text-orange bg-black">
                                    <li><a class="dropdown-item" href="#">Машиностроение и металлообработка</a></li>
                                    <li><a class="dropdown-item" href="#">Деревообработка</a></li>
                                    <li><a class="dropdown-item" href="#">Пищевое оборудование</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Власть и бизнес</a></li>
                                </ul>
                            </li>
                            <li class="text-white text-orange link"><a href="#">Реклама</a></li>
                        </ul>
                    </div>
                </div>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
                        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
                        crossorigin="anonymous"> </script>
            </div>
        </div>
    </header>
    <div class="main-content container">
        <section class="goods">
            <div class="card" style="width: 18rem;">
                <img src="img/product/1.jfif" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Газирование напитков, АГСМ</h5>
                    <p class="card-text">500 000 руб</p>
                    <a href="#" class="btn btn-primary">Приборести</a>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img src="img/product/2.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Уровнемеры, индикаторы уровня, УПМ, ИПМ</h5>
                    <p class="card-text">70 000 руб</p>
                    <a href="#" class="btn btn-primary">Приборести</a>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img src="img/product/3.jfif" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Углекислотное оборудование, Агростроймонтаж</h5>
                    <p class="card-text">500 000 руб</p>
                    <a href="#" class="btn btn-primary">Приборести</a>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img src="img/product/4.jfif" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Полуприцеп-цистерны для транспортировки жидкой двуокиси углерода, ЦЖУ</h5>
                    <p class="card-text">500 000 руб</p>
                    <a href="#" class="btn btn-primary">Приборести</a>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img src="img/product/5.jfif" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Станция перекачивания сжиженных газов, ремкомплект, запасные части, Агростроймонтаж</h5>
                    <p class="card-text">90 000 руб</p>
                    <a href="#" class="btn btn-primary">Приборести</a>
                </div>
            </div>
        </section>
        <div class="filter">
            <div class="form">
                <form method="get" action="/site(LR_3.2)" class="filter__form">
                    <div class="menu-form">
                        <p class="filter__text filter__form-item "><a class="submenu__link" href="#">Выбрать таблицу</a> <i class="fa fa-angle-down"></i></p>
                        <div class="submenu">
                            <a class="submenu__link" href="?companies=yes">list_of_companies</a>
                            <a class="submenu__link" href="?indicators=yes">list_of_indicators</a>
                            <a class="submenu__link" href="?regions=yes">list_of_regions</a>
                            <a class="submenu__link" href="?entries=yes">log_entries</a>
                        </div>
                    </div>
                    <p class="filter__text filter__form-item">Поиск по id:
                    </p><input name="id" id="id"  class="filter__input filter__form-item" type="text">
                    <p class="filter__text filter__form-item">Поиск по имени:
                    </p><input name="name"id="name" class="filter__input filter__form-item" type="text">
                    <button id="submit" class="filter__button filter__form-item" type="submit">Найти</button>
                </form>
            </div>
            <?php
               include "script.php";
            ?>
        </div>

    </div>
    <footer>
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="menu-footer">
                            <li class="footer-menu-list"><a href="#" class="footer-menu-link">УПРАВЛЕНИЕ ПРЕДПРИЯТИЕМ</a>
                            </li>
                            <li class="footer-menu-list"><a href="#" class="footer-menu-link">ПОЛИТИКА ПОРТАЛА</a></li>
                            <li class="footer-menu-list"><a href="#" class="footer-menu-link"> ВЫСТАВКИ </a></li>
                            <li class="footer-menu-list"><a href="#" class="footer-menu-link">О ПРОЕКТЕ </a></li>
                            <li class="footer-menu-list"><a href="#" class="footer-menu-link">НОВОСТИ КОМПАНИЙ </a></li>
                            <li class="footer-menu-list"><a href="#" class="footer-menu-link">ОБЗОР РЫНКОВ</a></li>
                            <li class="footer-menu-list"><a href="#" class="footer-menu-link">ЛИЗИНГ</a></li>
                        </ul>
                        <hr class="hr-style">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="sell_device">
                            <div class="sell_device_title">
                                <a class="sell_device_link">
                                    ПРОДАЖА ОБОРУДОВАНИЯ
                                </a>
                                <div class="row sity_display">
                                    <div class="col-md-3">
                                        <ul class="sell_device_menu">
                                            <li class="sell_device_list"><a href="" class="sell_device_sity">Нижний Новгород</a></li>
                                            <li class="sell_device_list"><a href="" class="sell_device_sity">Пермь</a></li>
                                            <li class="sell_device_list"><a href="" class="sell_device_sity">Уфа</a></li>
                                            <li class="sell_device_list"><a href="" class="sell_device_sity">Казань</a></li>
                                            <li class="sell_device_list"><a href="" class="sell_device_sity">Ижевск</a></li>
                                            <li class="sell_device_list"><a href="" class="sell_device_sity">Самара</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3">
                                        <ul class="sell_device_menu">
                                            <li class="sell_device_list"><a href="" class="sell_device_sity">Санкт-Петербург</a></li>
                                            <li class="sell_device_list"><a href="" class="sell_device_sity">Красноярск</a></li>
                                            <li class="sell_device_list"><a href="" class="sell_device_sity">Новосибирск</a></li>
                                            <li class="sell_device_list"><a href="" class="sell_device_sity">Омск</a></li>
                                            <li class="sell_device_list"><a href="" class="sell_device_sity">Екатеринбург</a></li>
                                            <li class="sell_device_list"><a href="" class="sell_device_sity">Челябинск</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3">
                                        <ul class="sell_device_menu">
                                            <li class="sell_device_list"><a href="" class="sell_device_sity">Владимир</a></li>
                                            <li class="sell_device_list"><a href="" class="sell_device_sity">Воронеж</a></li>
                                            <li class="sell_device_list"><a href="" class="sell_device_sity">Калуга</a></li>
                                            <li class="sell_device_list"><a href="" class="sell_device_sity">Кострома</a></li>
                                            <li class="sell_device_list"><a href="" class="sell_device_sity">Москва</a></li>
                                            <li class="sell_device_list"><a href="" class="sell_device_sity">Тверь</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3">
                                        <ul class="sell_device_menu">
                                            <li class="sell_device_list"><a href="" class="sell_device_sity">Тула</a></li>
                                            <li class="sell_device_list"><a href="" class="sell_device_sity">Ярославль</a></li>
                                            <li class="sell_device_list"><a href="" class="sell_device_sity">Волгоград</a></li>
                                            <li class="sell_device_list"><a href="" class="sell_device_sity">Краснодар</a></li>
                                            <li class="sell_device_list"><a href="" class="sell_device_sity">Ростов-на-Дону</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <p class="footer-text">2000 — 2021 &copy; «Гипер-Пресс» <br>
                            Equipnet.ru — "Оборудование для бизнеса"</p>
                        <a href="#"><img src="img/footer/mailru.gif" alt="" class="footer-main-img"></a>
                        <a href="#"><img src="img/footer/stat.png" alt="" class="footer-main-img"></a>
                    </div>
                    <div class="col-md-3">
                        <p class="footer-text">
                            Все материалы данного сайта, авторские права на которые принадлежат EquipNet.ru, не могут быть
                            скопированы.
                        </p>
                    </div>
                    <div class="col-md-3">
                        <p class="footer-text">
                            Реклама: <a class="footer-link " href="mailto:reklama@equipnet.ru">reklama@equipnet.ru</a> <br>
                            Тех. поддержка: <a class="footer-link" href="mailto:support@equipnet.ru">support@equipnet.ru</a>
                            <br>
                            Редактор сайта: <a class="footer-link" href="mailto:redaktor@equipnet.ru">
                            redaktor@equipnet.ru</a> <br>
                        </p>
                    </div>
                    <div class="col-md-3">
                        <a href=""><img class="footer-img-link" src="img/footer-link/vk-link.png" alt=""></a>
                        <a href=""><img class="footer-img-link" src="img/footer-link/facebook-link.png" alt=""></a>
                        <a href=""><img class="footer-img-link" src="img/footer-link/youtube-link.png" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="script.js"></script>
</body>
</html>