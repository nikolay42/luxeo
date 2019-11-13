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
                    <!--<a href="#" class="footer__link">Прогнозная аналитика</a>
                    <a href="" class="footer__link">SEO продвижение</a>
                    <a href="" class="footer__link">Контекстная реклама</a>
                    <a href="" class="footer__link">Провижение в соц.сетях</a>
                    <a href="" class="footer__link">Комплексное продвижение</a>
                    <a href="" class="footer__link">Аудит</a>-->
                                    <?php
            $options = array(
        'echo' => false,
        'container' => false,
        'theme_location' => 'footer-services',
        'walker'         => new Footer_Walker(),
    );

    $menu = wp_nav_menu($options);
    echo preg_replace(array(
        '#^<ul[^>]*>#',
        '#</ul>$#'
    ), '', $menu);
?>
                </div>
                <div class="footer__block">
                    <div class="footer__block-title">МЕНЮ</div>
                    <hr class="footer__line">
                                    <?php
            $options = array(
        'echo' => false,
        'container' => false,
        'theme_location' => 'footer-menu',
        'walker'         => new Footer_Walker(),
    );

    $menu = wp_nav_menu($options);
    echo preg_replace(array(
        '#^<ul[^>]*>#',
        '#</ul>$#'
    ), '', $menu);
?>
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
    <?php wp_footer(); ?>
</body>

</html>