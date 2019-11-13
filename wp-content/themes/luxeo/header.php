<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>SMM</title>

    <meta name="viewport" content="width=device-width, maximum-scale=1.0">

<?php wp_head(); ?>
<script>
var articles_number = 9;
var from_load_more_button = false;
$(function(){
    //var articles_number = 10;

    $(".blog__filter-link").click(function() {

                if($(this).hasClass("blog__filter-link_cur") && from_load_more_button == false)
                {
                    ;
                }
                else
                {
                    from_load_more_button = false;
                    $( ".blog__filter h2" ).removeClass("blog__filter-link_cur");
                    $(this).addClass("blog__filter-link_cur");

                     $.ajax({
                        type: 'GET',
                        url: '<?php echo admin_url("admin-ajax.php") ?>',
                        data: 'action=get_posts_by_cat&cat=' + $(this).attr("value") + '&articles_number=' + articles_number,
                        success: function (data) {
                                        $('.blog__list').empty();
                                        var data_parse = JSON.parse(data);

                                            var i;
                                            for (i = 0; i < data_parse.length - 1; i++) { 
                                                var el = '<div class="blog__block blog-block">';
                                                el += '<div class="blog-block__img-container">';
                                                el += '<img src="' + data_parse[i]['img'] + '" alt="" class="blog-block__img">';
                                                el += '<p class="blog-block__type">' + data_parse[i]['category_name'] + '</p>';
                                                el += '</div>';
                                                el += '<div class="blog-block__info">';
                                                el += '<p class="blog-block__info-box"><i class="material-icons">today</i>' + data_parse[i]['time'] + '</p>';
                                                el += '<p class="blog-block__info-box"><i class="material-icons">visibility</i>' + data_parse[i]['views'] + '</p>';
                                                el += '<p class="blog-block__info-box"><i class="material-icons">insert_comment</i>' + data_parse[i]['comments_number'] + '</p>';
                                                el += '</div>';
                                                el += '<h3 class="blog-block__title"><a href="' + data_parse[i]['link'] + '" class="blog-block__link">' + data_parse[i]['title'] + '</a></h3>'
                                                el += '<div class="blog-block__footer">';
                                                el += '<img src="' + data_parse[i]['author_img'] + '" alt="" class="blog-block__prof">';
                                                el += '<p class="blog-block__name">' + data_parse[i]['author'] + '</p>';
                                                el += '<div class="blog-block__rating rating">';
                                                el += '<a href=""><i class="material-icons">star_rate</i></a>';
                                                el += '<a href=""><i class="material-icons">star_rate</i></a>';
                                                el += '<a href=""><i class="material-icons">star_rate</i></a>';
                                                el += '<a href=""><i class="material-icons">star_rate</i></a>';
                                                el += '<a href=""><i class="material-icons">star_rate</i></a>';
                                                el += '</div></div></div>';

                                                $('.blog__list').append(el);
                                            }

                                        $('.blog__pages-list').empty();
                                        var pagination = data_parse[data_parse.length - 1];
                                        $('.blog__pages-list').append(pagination['pagination']);
                                }
                        });
                }
        });

    $(".blog__pages-list").on("click",".blog__num-page", function(event){
        event.preventDefault();
        var myvar = $(this).text();
        var myvar2 = $('.blog__filter-link_cur').attr("value");

                        $.ajax({
                        type: 'GET',
                        url: '<?php echo admin_url("admin-ajax.php") ?>',
                        data: 'action=get_posts_by_cat&cat=' + $('.blog__filter-link_cur').attr("value") + '&blog_page=' + $(this).text() + '&articles_number=' + articles_number,
                        success: function (data) {
                                        $('.blog__list').empty();
                                        var data_parse = JSON.parse(data);

                                            var i;
                                            for (i = 0; i < data_parse.length - 1; i++) { 
                                                var el = '<div class="blog__block blog-block">';
                                                el += '<div class="blog-block__img-container">';
                                                el += '<img src="' + data_parse[i]['img'] + '" alt="" class="blog-block__img">';
                                                el += '<p class="blog-block__type">' + data_parse[i]['category_name'] + '</p>';
                                                el += '</div>';
                                                el += '<div class="blog-block__info">';
                                                el += '<p class="blog-block__info-box"><i class="material-icons">today</i>' + data_parse[i]['time'] + '</p>';
                                                el += '<p class="blog-block__info-box"><i class="material-icons">visibility</i>' + data_parse[i]['views'] + '</p>';
                                                el += '<p class="blog-block__info-box"><i class="material-icons">insert_comment</i>' + data_parse[i]['comments_number'] + '</p>';
                                                el += '</div>';
                                                el += '<h3 class="blog-block__title"><a href="' + data_parse[i]['link'] + '" class="blog-block__link">' + data_parse[i]['title'] + '</a></h3>'
                                                el += '<div class="blog-block__footer">';
                                                el += '<img src="' + data_parse[i]['author_img'] + '" alt="" class="blog-block__prof">';
                                                el += '<p class="blog-block__name">' + data_parse[i]['author'] + '</p>';
                                                el += '<div class="blog-block__rating rating">';
                                                el += '<a href=""><i class="material-icons">star_rate</i></a>';
                                                el += '<a href=""><i class="material-icons">star_rate</i></a>';
                                                el += '<a href=""><i class="material-icons">star_rate</i></a>';
                                                el += '<a href=""><i class="material-icons">star_rate</i></a>';
                                                el += '<a href=""><i class="material-icons">star_rate</i></a>';
                                                el += '</div></div></div>';

                                                $('.blog__list').append(el);
                                            }

                                        $('.blog__pages-list').empty();
                                        var pagination = data_parse[data_parse.length - 1];
                                        $('.blog__pages-list').append(pagination['pagination']);
                                }
                        });
    });

    $(".blog__pages-list").on("click",".blog__button.blog__button_load-more", function(event){
        event.preventDefault();
        articles_number += 9;
        from_load_more_button = true;
        $('.blog__num-page[value="1"]').click();
    });
    
    });
</script>
</head>

<body>
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="header__logo logo">
                    <img src="../assets/img/logo.png" alt="" class="logo__image">
                    <div class="logo__name">
                        <p class="logo__main-name">LUXEO</p>
                        <p class="logo__secondary-name">INTERNET MARKETING</p>
                    </div>
                </div>
                <div class="header__menu-btn">
                    <div class="hamburger">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    Меню
                </div>
                <ul class="header__lang header__lang-top lang">
                    <li class="lang__button"><a href="" class="lang__link">Укр</a></li>
                    <li class="lang__button"><a href="" class="lang__link lang__link_cur">Рус</a></li>
                </ul>
                <div class="header__cont">
                    <div class="header__call btn-popup__communications">ПЕРЕЗВОНИТЕ МНЕ</div>
                    <ul class="header__contacts contacts">
                        <li class="contacts__number"><a class="contacts__link" href="tel:+38 (044) 221 65 09"><span class="contacts__number-code">+38 </span>(044) 221 65 09</a></li>
                        <li class="contacts__number"><a class="contacts__link" href="tel:+38 (095) 807 96 97"><span class="contacts__number-code">+38 </span>(095) 807 96 97</a></li>
                        <li class="contacts__number"><a class="contacts__link" href="tel:+38 (097) 299 87 04"><span class="contacts__number-code">+38 </span>(097) 299 87 04</a></li>
                        <li class="contacts__number"><a class="contacts__link" href="tel:+38 (073) 409 12 49"><span class="contacts__number-code">+38 </span>(073) 409 12 49</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="header__bot">
            <div class="container">
                <nav>
                <?php
        wp_nav_menu( array(
        'theme_location' => 'header',
        'walker'         => new Header_Walker(),
        'container'      => 'ul',
        //'container_class' => 'menu header__menu',
        'menu_class' => 'menu header__menu',
    ) );
?>
                    <!--<ul class="menu header__menu">
                        <li class="menu__button menu__button_drop">
                            <a href="" class="menu__link">Sео ПРОДВИЖЕНИЕ</a>
                            <div class="menu__drop">
                                <div class="container">
                                    <div class="menu__drop-left">
                                        <p class="menu__drop-title">SEO продвижение сайта</p>
                                        <hr class="header__line">
                                        <div class="menu__drop-links">
                                            <a href="" class="menu__drop-link"><i class="material-icons">arrow_forward</i>SEO на запад</a>
                                            <a href="" class="menu__drop-link"><i class="material-icons">arrow_forward</i>SEO на этапе разработки</a>
                                            <a href="" class="menu__drop-link"><i class="material-icons">arrow_forward</i>Продвижение интернет-магазинов</a>
                                            <a href="" class="menu__drop-link"><i class="material-icons">arrow_forward</i>SEO-консультация </a>
                                            <a href="" class="menu__drop-link"><i class="material-icons">arrow_forward</i>Продвижение сайтов услуг</a>
                                            <a href="" class="menu__drop-link"><i class="material-icons">arrow_forward</i>SEO аудит сайта</a>
                                            <a href="" class="menu__drop-link"><i class="material-icons">arrow_forward</i>Продвижение по трафику</a>
                                            <a href="" class="menu__drop-link"><i class="material-icons">arrow_forward</i>Стоимость продвижения сайта</a>
                                        </div>
                                    </div>
                                    <div class="menu__drop-right">
                                        <p class="menu__drop-title">Последние кейсы</p>
                                        <hr class="header__line">
                                        <a href="" class="menu__drop-case"><i class="material-icons">folder_open</i>DHL — Всемирный логистический провайдер в области авиа, морских перевозок и логистических решений.</a>
                                        <a href="" class="menu__drop-case"><i class="material-icons">folder_open</i>Forter — интернет-магазин систем безопасности</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="menu__button menu__button_drop">
                            <a href="" class="menu__link">КОНТЕКСТНАЯ РЕКЛАМА</a>
                            <div class="menu__drop">
                                <div class="container">
                                    <div class="menu__drop-left">
                                        <p class="menu__drop-title">Контентная реклама</p>
                                        <hr class="header__line">
                                        <div class="menu__drop-links">
                                            <a href="" class="menu__drop-link"><i class="material-icons">arrow_forward</i>SEO на запад</a>
                                            <a href="" class="menu__drop-link"><i class="material-icons">arrow_forward</i>SEO на этапе разработки</a>
                                            <a href="" class="menu__drop-link"><i class="material-icons">arrow_forward</i>Продвижение интернет-магазинов</a>
                                            <a href="" class="menu__drop-link"><i class="material-icons">arrow_forward</i>SEO-консультация </a>
                                            <a href="" class="menu__drop-link"><i class="material-icons">arrow_forward</i>Продвижение сайтов услуг</a>
                                            <a href="" class="menu__drop-link"><i class="material-icons">arrow_forward</i>SEO аудит сайта</a>
                                            <a href="" class="menu__drop-link"><i class="material-icons">arrow_forward</i>Продвижение по трафику</a>
                                            <a href="" class="menu__drop-link"><i class="material-icons">arrow_forward</i>Стоимость продвижения сайта</a>
                                        </div>
                                    </div>
                                    <div class="menu__drop-right">
                                        <p class="menu__drop-title">Последние кейсы</p>
                                        <hr class="header__line">
                                        <a href="" class="menu__drop-case"><i class="material-icons">folder_open</i>DHL — Всемирный логистический провайдер в области авиа, морских перевозок и логистических решений.</a>
                                        <a href="" class="menu__drop-case"><i class="material-icons">folder_open</i>Forter — интернет-магазин систем безопасности</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="menu__button menu__button_drop">
                            <a href="" class="menu__link">SMM</a>
                            <div class="menu__drop">
                                <div class="container">
                                    <div class="menu__drop-left">
                                        <p class="menu__drop-title">SMM</p>
                                        <hr class="header__line">
                                        <div class="menu__drop-links">
                                            <a href="" class="menu__drop-link"><i class="material-icons">arrow_forward</i>SEO на запад</a>
                                            <a href="" class="menu__drop-link"><i class="material-icons">arrow_forward</i>SEO на этапе разработки</a>
                                            <a href="" class="menu__drop-link"><i class="material-icons">arrow_forward</i>Продвижение интернет-магазинов</a>
                                            <a href="" class="menu__drop-link"><i class="material-icons">arrow_forward</i>SEO-консультация </a>
                                            <a href="" class="menu__drop-link"><i class="material-icons">arrow_forward</i>Продвижение сайтов услуг</a>
                                            <a href="" class="menu__drop-link"><i class="material-icons">arrow_forward</i>SEO аудит сайта</a>
                                            <a href="" class="menu__drop-link"><i class="material-icons">arrow_forward</i>Продвижение по трафику</a>
                                            <a href="" class="menu__drop-link"><i class="material-icons">arrow_forward</i>Стоимость продвижения сайта</a>
                                        </div>
                                    </div>
                                    <div class="menu__drop-right">
                                        <p class="menu__drop-title">Последние кейсы</p>
                                        <hr class="header__line">
                                        <a href="" class="menu__drop-case"><i class="material-icons">folder_open</i>DHL — Всемирный логистический провайдер в области авиа, морских перевозок и логистических решений.</a>
                                        <a href="" class="menu__drop-case"><i class="material-icons">folder_open</i>Forter — интернет-магазин систем безопасности</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="menu__button">
                            <a href="" class="menu__link">КЕЙСЫ</a>
                        </li>
                        <li class="menu__button">
                            <a href="" class="menu__link">ОТЗЫВЫ</a>
                        </li>
                        <li class="menu__button menu__button_drop">
                            <a href="" class="menu__link">БЛОГ</a>
                            <div class="menu__drop">
                                <div class="container">
                                    <div class="menu__drop-left">
                                        <p class="menu__drop-title">Блог</p>
                                        <hr class="header__line">
                                        <div class="menu__drop-links">
                                            <a href="" class="menu__drop-link"><i class="material-icons">arrow_forward</i>SEO на запад</a>
                                            <a href="" class="menu__drop-link"><i class="material-icons">arrow_forward</i>SEO на этапе разработки</a>
                                            <a href="" class="menu__drop-link"><i class="material-icons">arrow_forward</i>Продвижение интернет-магазинов</a>
                                            <a href="" class="menu__drop-link"><i class="material-icons">arrow_forward</i>SEO-консультация </a>
                                            <a href="" class="menu__drop-link"><i class="material-icons">arrow_forward</i>Продвижение сайтов услуг</a>
                                            <a href="" class="menu__drop-link"><i class="material-icons">arrow_forward</i>SEO аудит сайта</a>
                                            <a href="" class="menu__drop-link"><i class="material-icons">arrow_forward</i>Продвижение по трафику</a>
                                            <a href="" class="menu__drop-link"><i class="material-icons">arrow_forward</i>Стоимость продвижения сайта</a>
                                        </div>
                                    </div>
                                    <div class="menu__drop-right">
                                        <p class="menu__drop-title">Последние кейсы</p>
                                        <hr class="header__line">
                                        <a href="" class="menu__drop-case"><i class="material-icons">folder_open</i>DHL — Всемирный логистический провайдер в области авиа, морских перевозок и логистических решений.</a>
                                        <a href="" class="menu__drop-case"><i class="material-icons">folder_open</i>Forter — интернет-магазин систем безопасности</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="menu__button">
                            <a href="" class="menu__link">КОНТАКТЫ</a>
                        </li>
                        <li class="menu__button menu__button_more">
                            <a href="" class="menu__link">ЕЩЁ</a>
                            <div class="menu__drop">
                                <div class="container">
                                    <div class="menu__more">
                                        <div class="menu__more-block">
                                            <p class="menu__more-title">О компании</p>
                                            <div class="menu__more-links">
                                                <a href="" class="menu__more-link"><i class="material-icons">arrow_forward</i>О компании</a>
                                                <a href="" class="menu__more-link"><i class="material-icons">arrow_forward</i>Кейсы</a>
                                                <a href="" class="menu__more-link"><i class="material-icons">arrow_forward</i>Клиенты</a>
                                                <a href="" class="menu__more-link"><i class="material-icons">arrow_forward</i>Отзывы</a>
                                                <a href="" class="menu__more-link"><i class="material-icons">arrow_forward</i>Вакансии</a>
                                                <a href="" class="menu__more-link"><i class="material-icons">arrow_forward</i>Контакты</a>
                                            </div>
                                        </div>
                                        <div class="menu__more-block">
                                            <p class="menu__more-title">Продвижение в соцсетях</p>
                                            <div class="menu__more-links">
                                                <a href="" class="menu__more-link"><i class="material-icons">arrow_forward</i>Продвижение Фейсбук</a>
                                                <a href="" class="menu__more-link"><i class="material-icons">arrow_forward</i>Продвижение Инстаграмм</a>
                                                <a href="" class="menu__more-link"><i class="material-icons">arrow_forward</i>Таргетированная реклама</a>
                                                <a href="" class="menu__more-link"><i class="material-icons">arrow_forward</i>SMM Аудит</a>
                                                <a href="" class="menu__more-link"><i class="material-icons">arrow_forward</i>Консультация по SMM</a>
                                            </div>
                                        </div>
                                        <div class="menu__more-block">
                                            <p class="menu__more-title">Комплексное продвижение</p>
                                            <div class="menu__more-links">
                                                <a href="" class="menu__more-link"><i class="material-icons">arrow_forward</i>Консультация по комплексному<br>продвижению</a>
                                                <a href="" class="menu__more-link"><i class="material-icons">arrow_forward</i>Аудит продвижения</a>
                                            </div>
                                        </div>
                                        <div class="menu__more-block">
                                            <p class="menu__more-title">Аудит</p>
                                            <div class="menu__more-links">
                                                <a href="" class="menu__more-link"><i class="material-icons">arrow_forward</i>SEO</a>
                                                <a href="" class="menu__more-link"><i class="material-icons">arrow_forward</i>PPC</a>
                                                <a href="" class="menu__more-link"><i class="material-icons">arrow_forward</i>SMM</a>
                                            </div>
                                        </div>
                                        <div class="menu__more-block">
                                            <p class="menu__more-title">Прогнозная аналитика</p>
                                            <div class="menu__more-links">
                                                <a href="" class="menu__more-link"><i class="material-icons">arrow_forward</i>Прогноз трафика</a>
                                                <a href="" class="menu__more-link"><i class="material-icons">arrow_forward</i>Скоринг</a>
                                                <a href="" class="menu__more-link"><i class="material-icons">arrow_forward</i>Анализ ниши<br>для стартапа</a>
                                            </div>
                                        </div>
                                        <div class="menu__more-block">
                                            <p class="menu__more-title">Блог</p>
                                            <div class="menu__more-links">
                                                <a href="" class="menu__more-link"><i class="material-icons">arrow_forward</i>Все разделы</a>
                                                <a href="" class="menu__more-link"><i class="material-icons">arrow_forward</i>SEO</a>
                                                <a href="" class="menu__more-link"><i class="material-icons">arrow_forward</i>PPC</a>
                                                <a href="" class="menu__more-link"><i class="material-icons">arrow_forward</i>Маркетинг</a>
                                                <a href="" class="menu__more-link"><i class="material-icons">arrow_forward</i>Новости</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>-->
                </nav>
                <ul class="header__lang lang">
                    <li class="lang__button"><a href="" class="lang__link">Укр</a></li>
                    <li class="lang__button"><a href="" class="lang__link lang__link_cur">Рус</a></li>
                </ul>
            </div>
        </div>
    </header>
        <div class="content">
        <section class="crumb">
            <!--<div class="container">
                <a href="" class="crumb__page">Главная страница</a>
                <a href="" class="crumb__page">Блог</a>
                <p class="crumb__page">Все статьи</p>
            </div>-->
            <?php if( function_exists('kama_breadcrumbs') ) kama_breadcrumbs(' / '); ?>
            <?php //echo breadcrumbs(); ?>
        </section>