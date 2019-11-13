<?php get_header(); ?>

        <section class="blog">
            <div class="container">
                <span class="blog__name blog__name_center">НАШИ СТАТЬИ</span>
                <h1 class="blog__list-title">Полезный контент<br>на тему продвижения</h1>
                <div class="blog__filter">
                    <h2 class="blog__filter-link blog__filter-link_cur"  value="http://luxeo.site/category/all/"><i class="material-icons">insert_drive_file</i>ВСЕ СТАТЬИ</h2>
                    <h2 class="blog__filter-link" value="http://luxeo.site/category/seo/"><i class="material-icons">bar_chart</i>SEO</h2>
                    <h2 class="blog__filter-link"  value="http://luxeo.site/category/smm/"><i class="material-icons">insert_drive_file</i>SMM</h2>
                    <h2 class="blog__filter-link"  value="http://luxeo.site/category/ppc/"><i class="material-icons">add_circle_outline</i>PPC</h2>
                </div>
                <!--<ul>
                <?php
                    /*$args = array(
                        'show_optional_all' => 'All',
                        );
                    wp_list_categories($args);*/
                ?>
                </ul>-->
                <!--<div class="blog__list">-->
                 <?php
                 $args = array(
    'posts_per_page' => 9,
    'post_type'      => 'post',
    'paged'          => get_query_var( 'paged' ),
    ); 
                 $wp_query = new WP_Query($args); ?>
                 <?php if ( $wp_query->have_posts() ) : ?>

                 <div class="blog__list" id="blog-list">

                 <?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>

                    <?php $categories = get_the_category(); ?>
                    <div class="blog__block blog-block">
                        <div class="blog-block__img-container">
                            <img src="<?php the_post_thumbnail_url(); ?>" alt="" class="blog-block__img">
                            <p class="blog-block__type"><?php echo $categories[0]->name; ?></p>
                        </div>
                        <div class="blog-block__info">
                            <p class="blog-block__info-box"><i class="material-icons">today</i><?php the_time('d.m.Y'); ?></p>
                            <p class="blog-block__info-box"><i class="material-icons">visibility</i><?php if(function_exists('the_views')) { the_views(); } ?></p>
                            <p class="blog-block__info-box"><i class="material-icons">insert_comment</i><?= get_comments_number() ?></p>
                        </div>
                        <h3 class="blog-block__title"><a href="" class="blog-block__link"><?php the_title(); ?></a></h3>
                        <div class="blog-block__footer">
                            <img src="<?php echo get_avatar_url( get_the_author_meta('user_email')); ?>" alt="" class="blog-block__prof">
                            <p class="blog-block__name"><?= get_author_name() ?></p>
                            <div class="blog-block__rating rating">
                                <a href=""><i class="material-icons">star_rate</i></a>
                                <a href=""><i class="material-icons">star_rate</i></a>
                                <a href=""><i class="material-icons">star_rate</i></a>
                                <a href=""><i class="material-icons">star_rate</i></a>
                                <a href=""><i class="material-icons">star_rate</i></a>
                            </div>
                        </div>
                    </div>

                 <?php
                     endwhile;?>
                     <?php //luxeo_pagination(); ?>
                     <?php wp_reset_postdata();?>
                     </div>
                     <?php endif;
                 ?>
                <!--</div>-->
                <?php luxeo_pagination(); ?>
                <?php wp_reset_query(); ?>

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

        <?php get_footer(); ?>
        <!--<footer class="footer">
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
        </footer>-->
    <!--</div>

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

</html>-->
