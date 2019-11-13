<?php get_header(); ?>

<?php if( have_posts() ) the_post(); ?>

        <section class="blog">
            <div class="blog__container">
                <div class="blog__info-top">
                    <p class="blog__info-box"><i class="material-icons">today</i><?php the_time('d.m.Y'); ?></p>
                    <p class="blog__info-box"><i class="material-icons">visibility</i><?php echo do_shortcode('[views id="' . get_the_ID() . '"]'); ?></p>
                    <p class="blog__info-box"><i class="material-icons">insert_comment</i><?php echo get_comments_number(); ?></p>
                </div>
                <h1 class="blog__list-title"><?php the_title(); ?></h1>
                <div class="blog__social-links-fix social-blog">
                    <a href="#" class="social-blog__link social-blog__link_facebook"></a>
                    <a href="#" class="social-blog__link social-blog__link_twitter"></a>
                    <a href="#" class="social-blog__link social-blog__link_google"></a>
                    <a href="#" class="social-blog__link social-blog__link_linkedin"></a>
                </div>
                <div class="blog__author">
                    <img src="<?php echo get_avatar_url( get_the_author_meta('user_email')); ?>" alt="" class="blog__author-photo">
                    <p class="blog__author-name"><?php the_author(); ?></p>
                    <p class="blog__author-position"><?php esc_textarea(the_author_meta('description')); ?></p>
                </div>
                <div class="blog__preview">
                    <img src="../assets/img/Layer_1271.png" alt="" class="blog__img-preview">
                    <?php $categories = get_the_category(); ?>
                    <p class="blog__type"><?php echo $categories[0]->name; ?></p>
                </div>
                <?php //the_content(); ?>
                <h3 class="blog__title">Прогнозная аналитика — отдельное направление в анализе данных</h3>
                <p class="blog__paragraph">Она позволяет принимать решения, которые смогут принести заранее известный результат. Это делает данный инструмент особенно полезным в сфере онлайн-бизнеса. </p>
                <h4 class="blog__quote">Прогнозная аналитика — это необходимый навыкs для каждого предпринимателя</h4>
                <p class="blog__paragraph">Бизнесмен должен уметь анализировать данные, чтобы принимать эффективные бизнес решения. Для уже существующего бизнеса, а также на этапе его создания можно оценить емкость рынка, прогнозировать спрос, анализировать тренды и на основе полученных данных принимать какие-либо решения.</p>
                <p class="blog__paragraph">Современные инструменты позволяют оценить данные и принять правильные управленческие бизнес решения. Сегодня мы рассмотрим такой простой инструмент, как Google trends. Несмотря на свою простоту, инструмент позволяет предпринимателям и маркетологам получить массу полезной информации, на основе которой они могут получить бесценные данные для своего бизнеса.</p>
                <p class="blog__paragraph">Сегодня мы рассмотрим только малую часть возможностей Google trends, которые доступны каждому владельцу бизнеса.</p>
                <h3 class="blog__title">Прогнозная аналитика — отдельное направление в анализе данных</h3>
                <p class="blog__paragraph">Все помнят историю про спиннеры, которая была главной темой 2017 года. Если сейчас посмотреть на функцию тренда по спиннерам, мы увидим следующую картину:</p>
                <img src="../assets/img/Layer_1356.png" alt="" class="blog__img">
                <p class="blog__paragraph">Представьте себе, если бы вы знали про такой рост спроса в марте 2017.</p>
                <p class="blog__paragraph">Примером «новых спинеров» в контексте хайпа и роста спроса может быть «бейблейд» На графике видно, что с осени 2017 года тренд начал резко расти, а значит — вырос и спрос на такой товар. Те, кто успел воспользоваться сложившейся ситуацией, смогли получить прибыль.</p>
                <h3 class="blog__title">Прогнозная аналитика — это важный инструмент в ваших руках</h3>
                <p class="blog__paragraph">Собирайте данные, анализируйте их и уже потом принимайте какое-либо решение. В бизнесе нельзя действовать наугад, тогда вы не сможете гарантировать результат.</p>
                <p class="blog__paragraph">Прогнозная аналитика позволит быть на шаг впереди конкурентов и вывести бизнес на новый уровень.</p>
                <div class="blog__slider-conteiner">
                    <div class="slides blog__slider">
                        <div class="slides__container">
                            <div class="slide blog__slide">
                                <img src="../assets/img/stefan-stefancik-257625-unsplash.png" alt="" class="blog__slide-img">
                            </div>
                            <div class="slide blog__slide">
                                <img src="../assets/img/screen3_main.png" alt="" class="blog__slide-img">
                            </div>
                            <div class="slide blog__slide">
                                <img src="../assets/img/shutterstock_520633585.png" alt="" class="blog__slide-img">
                            </div>
                        </div>
                    </div>
                    <div class="blog__slider-button slider-btns">
                        <a href="" class="slider-btns__btn slider-btns__btn_prev"></a>
                        <a href="" class="slider-btns__btn slider-btns__btn_next"></a>
                    </div>
                </div>
                <p class="blog__paragraph">Если вы хотите оценить текущий спрос и спрогнозировать будущее, воспользуйтесь следующими шагами:</p>
                <ul class="blog__list">
                    <li>Соберите семантику (список ключевых слов, по которым ищут ваш товар или услугу)</li>
                    <li>Оцените тренд по каждому из ключей в <a href="http://trends.google.com.ua">http://trends.google.com.ua</a></li>
                    <li>Оцените cпрос в Keywordplanner</li>
                    <li>С помощью временных рядов спрогнозируйте тренд на будущее</li>
                    <li>Воспользовавшись данными о спросе и тренде оцените емкость рынка</li>
                </ul>
                <?php the_content(); ?>
                <hr class="blog__line">
                <div class="blog__social">
                    <p class="blog__rating">
                        Понравилась статья? Оставьте свой голос
                        <span class="rating rating_r3">
                            <a href="#"><i class="material-icons">star_rate</i></a>
                            <a href="#"><i class="material-icons">star_rate</i></a>
                            <a href="#"><i class="material-icons">star_rate</i></a>
                            <a href="#"><i class="material-icons">star_rate</i></a>
                            <a href="#"><i class="material-icons">star_rate</i></a>
                        </span>
                        <?php //if(function_exists('the_google_rating')) { echo the_google_rating();} ?>
                        <?php do_shortcode('[wp-review]'); ?>
                    </p>
                    <div class="blog__social-links social-blog">
                        <a href="#" class="social-blog__link social-blog__link_facebook"></a>
                        <a href="#" class="social-blog__link social-blog__link_twitter"></a>
                        <a href="#" class="social-blog__link social-blog__link_google"></a>
                        <a href="#" class="social-blog__link social-blog__link_linkedin"></a>
                    </div>
                </div>
                <div class="blog__other">
                    <a href="#" class="blog__other-prev">
                        <div class="blog__other-arrow-prev"></div>
                        <div class="blog__other-name-container">
                            <span>
                                <span class="blog__other-name-prev">Предыдущая статья</span>
                                <span class="blog__other-title-prev">Hreflang для мультиязычного сайта</span>
                            </span>
                        </div>
                    </a>
                    <a href="#" class="blog__other-next">
                        <div class="blog__other-name-container">
                            <span>
                                <span class="blog__other-name-next">Следующая статья</span>
                                <span class="blog__other-title-next">Продвиньте свой сайт в ТОП локальной выдачи</span>
                            </span>
                        </div>
                        <div class="blog__other-arrow-next"></div>
                    </a>
                </div>
            </div>
        </section>
        <section class="blog blog_recomend">
            <div class="blog__container">
                <div class="blog__list">
                    <div class="blog__block blog-block">
                        <div class="blog-block__img-container">
                            <img src="../assets/img/Layer_1224.png" alt="" class="blog-block__img">
                            <p class="blog-block__type">Маркетинг</p>
                        </div>
                        <div class="blog-block__info">
                            <p class="blog-block__info-box"><i class="material-icons">today</i>16.04.2018</p>
                            <p class="blog-block__info-box"><i class="material-icons">visibility</i>1288</p>
                            <p class="blog-block__info-box"><i class="material-icons">insert_comment</i>12</p>
                        </div>
                        <h3 class="blog-block__title"><a href="" class="blog-block__link">Google Trends для бизнеса: как спрогнозировать спрос и сделать правильные выводы</a></h3>
                        <div class="blog-block__footer">
                            <img src="../assets/img/Layer_1337.png" alt="" class="blog-block__prof">
                            <p class="blog-block__name">SeoFan</p>
                            <div class="blog-block__rating rating">
                                <a href=""><i class="material-icons">star_rate</i></a>
                                <a href=""><i class="material-icons">star_rate</i></a>
                                <a href=""><i class="material-icons">star_rate</i></a>
                                <a href=""><i class="material-icons">star_rate</i></a>
                                <a href=""><i class="material-icons">star_rate</i></a>
                            </div>
                        </div>
                    </div>
                    <div class="blog__block blog-block">
                        <div class="blog-block__img-container">
                            <img src="../assets/img/Layer_1224.png" alt="" class="blog-block__img">
                            <p class="blog-block__type">Маркетинг</p>
                        </div>
                        <div class="blog-block__info">
                            <p class="blog-block__info-box"><i class="material-icons">today</i>16.04.2018</p>
                            <p class="blog-block__info-box"><i class="material-icons">visibility</i>1288</p>
                            <p class="blog-block__info-box"><i class="material-icons">insert_comment</i>12</p>
                        </div>
                        <h3 class="blog-block__title"><a href="" class="blog-block__link">Google Trends для бизнеса: как спрогнозировать спрос и сделать правильные выводы</a></h3>
                        <div class="blog-block__footer">
                            <img src="../assets/img/Layer_1337.png" alt="" class="blog-block__prof">
                            <p class="blog-block__name">SeoFan</p>
                            <div class="blog-block__rating rating">
                                <a href=""><i class="material-icons">star_rate</i></a>
                                <a href=""><i class="material-icons">star_rate</i></a>
                                <a href=""><i class="material-icons">star_rate</i></a>
                                <a href=""><i class="material-icons">star_rate</i></a>
                                <a href=""><i class="material-icons">star_rate</i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <form action="" class="blog__form form">
                    <h5 class="blog__form-title">Хотите получать новые статьи на почту?</h5>
                    <p class="blog__form-description">Подпишитесь на рассылку. Ничего лишнего, только полезная информация.</p>
                    <div class="form__input-conteiner blog__input">
                        <input type="text" id="name" class="site-push__input form__input" required>
                        <label for="name" class="form__label">Имя</label>
                        <i class="material-icons form__input-ico">person</i>
                    </div>
                    <div class="form__input-conteiner blog__input">
                        <input type="text" id="email" class="site-push__input form__input" required>
                        <label for="email" class="form__label form__label_important">Email</label>
                        <i class="material-icons form__input-ico">email</i>
                    </div>
                    <button class="blog__button blog__form-btn">ОТПРАВИТЬ ЗАЯВКУ</button>
                    <p class="blog__form-conf">*Ваши данные никогда не будут переданы 3-м лицам</p>
                </form>
            </div>
        </section>

        <footer class="footer">
            <div class="footer__main">
                <div class="footer__block">
                    <div class="footer__block-title">О КОМПАНИИ</div>
                    <hr class="footer__line">
                    <p class="footer__text">Эффективное продвижение бизнеса в поисковых системах и социальных сетях.</p>
                    <p class="footer__text">Принцип работы компании Luxeo — максимизация прибыли наших клиентов путем наращивания трафика целевых посетителей.</p>
                </div>
                <div class="footer__block">
                    <div class="footer__block-title">УСЛУГИ</div>
                    <hr class="footer__line">
                    <a href="#" class="footer__link">Прогнозная аналитика</a>
                    <a href="" class="footer__link">SEO продвижение</a>
                    <a href="" class="footer__link">Контекстная реклама</a>
                    <a href="" class="footer__link">Провижение в соц.сетях</a>
                    <a href="" class="footer__link">Комплексное продвижение</a>
                    <a href="" class="footer__link">Аудит</a>
                </div>
                <div class="footer__block">
                    <div class="footer__block-title">МЕНЮ</div>
                    <hr class="footer__line">
                    <a href="" class="footer__link">О компании</a>
                    <a href="" class="footer__link">Блог</a>
                    <a href="" class="footer__link">Кейсы</a>
                    <a href="" class="footer__link">Клиенты</a>
                    <a href="" class="footer__link">Отзывы</a>
                    <a href="" class="footer__link">Контакты</a>
                </div>
                <div class="footer__block">
                    <div class="footer__block-title">КАК НАС НАЙТИ</div>
                    <hr class="footer__line">
                    <p class="footer__text">Адрес:<br>улица Тополева, 4,<br>город Киев, 03049</p>
                    <p class="footer__text">Email:
                        <a href="mailto:order@luxeo.com.ua" class="footer__link">order@luxeo.com.ua</a>
                    </p>
                    <div class="footer__social">
                        <a href="" class="social social_facebook"></a>
                        <a href="" class="social social_instagram"></a>
                        <a href="" class="social social_google"></a>
                        <a href="" class="social social_youtube"></a>
                    </div>
                </div>
            </div>
            <div class="footer__second">
                <a href="" class="footer__second-link">Политика конфиденциальности</a>
                <a href="" class="footer__second-link">Отказ от ответственности</a>
                <a href="" class="footer__second-link">Согласие с рассылкой</a>
                <a href="" class="footer__rezart">Rezart Agency</a>
            </div>
        </footer>
    </div>

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
                    <ul class="menu header__menu">
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
                    </ul>
                </nav>
                <ul class="header__lang lang">
                    <li class="lang__button"><a href="" class="lang__link">Укр</a></li>
                    <li class="lang__button"><a href="" class="lang__link lang__link_cur">Рус</a></li>
                </ul>
            </div>
        </div>
    </header>

    <div class="popup">
        <div class="popup__container popup__container_thank">
            <div class="popup__btn-close"></div>
            <img src="assets/img/spasibo_icon_luxeo2.svg" alt="" class="popup__ico">
            <h4 class="popup__title">Спасибо за заявку!</h4>
            <p class="popup__description">В ближайшее время к вам перезвонит наш аккаунт-менеджер, чтобы уточнить детали</p>
        </div>
    </div>

    <div class="popup" id="popup__communications">
        <div class="popup__container popup__container_communications">
            <div class="popup__btn-close"></div>
            <h4 class="popup__title">Заполните заявку</h4>
            <p class="popup__description">и наш менеджер свяжется с вами в течении 3-х часов</p>
            <form action="" class="popup__form form">
                <div class="form__input-conteiner">
                    <input type="text" id="name-popup" class="site-push__input form__input">
                    <label for="name-popup" class="form__label">Имя</label>
                    <i class="material-icons form__input-ico">person</i>
                </div>
                <div class="form__input-conteiner">
                    <input type="text" id="phone-popup" class="site-push__input form__input">
                    <label for="phone-popup" class="form__label form__label_important">Телефон</label>
                    <i class="material-icons form__input-ico">phone</i>
                </div>
                <button type="button" class="blue-button popup__send-form">ЗАКАЗАТЬ ЗВОНОК</button>
                <p class="popup__conf-date">*Ваши данные никогда не будут переданы 3-м лицам</p>
            </form>
        </div>
    </div>
</body>

</html>
