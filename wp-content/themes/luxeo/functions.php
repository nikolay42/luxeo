<?php

add_theme_support( 'post-thumbnails' );
add_theme_support( 'menus' );

/*if ( function_exists('register_sidebar') ) {
  register_sidebar(array(*/
    /*'before_widget' => '<li id="%1$s" class="widget %2$s">',
    'after_widget' => '</li>',
    'before_title' => '<span class="widgettitle">',
    'after_title' => '</span>',*/
  /*));
}*/

/*<?php
    global $_wp_sidebars_widgets;
    echo '<pre>';
    print_r($_wp_sidebars_widgets);
    echo '</pre>';
?>*/

/*
    ========================================
    Scripts and Styles Including
    ========================================
*/
function qlab_scripts() {
    
    wp_enqueue_style( 'qlab-base', get_template_directory_uri().'/assets/css/base.css' );
    wp_enqueue_style( 'qlab-header', get_template_directory_uri().'/assets/css/header.css' );
    wp_enqueue_style( 'qlab-style', get_template_directory_uri().'/style.css' );
    wp_enqueue_style( 'qlab-main-media', get_template_directory_uri().'/assets/css/main-media.css' );
    wp_enqueue_style( 'qlab-screen', get_template_directory_uri().'/assets/css/screen.css' );
    wp_enqueue_style( 'qlab-screen-media', get_template_directory_uri().'/assets/css/screen-media.css' );
    wp_enqueue_style( 'qlab-slider', get_template_directory_uri().'/assets/css/slider.css' );
    wp_enqueue_style( 'qlab-footer', get_template_directory_uri().'/assets/css/footer.css' );
    wp_enqueue_style( 'qlab-chart', get_template_directory_uri().'/assets/css/chart.css' );
    wp_enqueue_style( 'qlab-video', get_template_directory_uri().'/assets/css/video.css' );
    wp_enqueue_style( 'qlab-blog', get_template_directory_uri().'/assets/css/blog.css' );
    wp_enqueue_style( 'qlab-fonts', 'https://fonts.googleapis.com/icon?family=Material+Icons' );

    wp_enqueue_script( 'qlab-jquery', get_template_directory_uri() . '/assets/js/jquery-3.2.1.min.js', array(), '3.2.1', false  );	
    wp_enqueue_script( 'qlab-checkform', get_template_directory_uri() . '/assets/js/check-form.js', array(), '', false );
    wp_enqueue_script( 'qlab-slider', get_template_directory_uri() . '/assets/js/slider.js', array(), '', false );
    wp_enqueue_script('qlab-calculator', get_template_directory_uri() . '/assets/js/calculator.js', array(), '', false);
    wp_enqueue_script('qlab-question', get_template_directory_uri() . '/assets/js/question.js', array(), '', false);
    wp_enqueue_script( 'qlab-header', get_template_directory_uri().'/assets/js/header.js', array(), '', false );
    wp_enqueue_script( 'qlab-technologies', get_template_directory_uri().'/assets/js/tehnologies.js', array(), '', false );
    wp_enqueue_script( 'qlab-popup', get_template_directory_uri().'/assets/js/popup.js', array(), '', false );
    wp_enqueue_script( 'qlab-video', get_template_directory_uri().'/assets/js/video.js', array(), '', false );
}
add_action( 'wp_enqueue_scripts', 'qlab_scripts' );
/*
    ========================================
    Menu Locations
    ========================================
*/
register_nav_menus( array(
  'header' => 'Хедер',
  'footer-services' => 'Футер - Услуги',
  'footer-menu' => 'Футер - Меню',
) );

/*
    ========================================
    My Walker Classes
    ========================================
*/
class Header_Walker extends Walker_Nav_Menu
{

    private $curItem;

    function start_lvl(&$output, $depth = 0, $args = array()){

        //$str = 'eboy';
        if(strcmp($this->curItem->title, 'SEO продвижение') == 0)
            $str = 'SEO продвижение сайта';
        else
            $str = $this->curItem->title;

        /*if(strcmp($this->curItem->title, 'Контекстная реклама') == 0)
            $str = 'Контекстная реклама';

        if(strcmp($this->curItem->title, 'SMM') == 0)
            $str = 'SMM';

        if(strcmp($this->curItem->title, 'Блог') == 0)
            $str = 'Блог';*/

        if(strcmp($this->curItem->title, 'Ещё') == 0)
            $output .= '<div class="menu__drop">
                                    <div class="container">
                                        <div class="menu__more">';
        else
            $output .= '<div class="menu__drop">
                                        <div class="container">
                                            <div class="menu__drop-left">
                                                <p class="menu__drop-title">' . $str . '</p>
                                                <hr class="header__line">
                                                <div class="menu__drop-links">';
                                            /*<a href="" class="menu__drop-link"><i class="material-icons">arrow_forward</i>Стоимость продвижения сайта</a>*/
                                        /*</div>
                                    </div>
                                    <div class="menu__drop-right">
                                        <p class="menu__drop-title">Последние кейсы</p>
                                        <hr class="header__line">
                                        <a href="" class="menu__drop-case"><i class="material-icons">folder_open</i>DHL — Всемирный логистический провайдер в области авиа, морских перевозок и логистических решений.</a>
                                        <a href="" class="menu__drop-case"><i class="material-icons">folder_open</i>Forter — интернет-магазин систем безопасности</a>
                                    </div>
                                </div>
                            </div>';*/
    }

    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)

    {
        $this->curItem = $item;

        if(strcmp($item->title, 'Ещё') == 0)
        {
            $class_part = 'more'/* . ' ' . $item->ID*/;
            //var_dump($item->menu_item_parent);
        }
        else
            $class_part = 'drop';

        if($depth == 0 && $args->walker->has_children)
            $str = 'menu__button_' . $class_part;
        else
            $str = '';

        if($depth == 0)
            $item_output = '<li class="menu__button ' .  $str . '">
                            <a href="' . $item->url . '" class="menu__link">' . $item->title . '</a>'
                            /*<div class="menu__drop">
                                <div class="container">'*/;
        else
        {
            if(strcmp($this->curItem->type, 'my-custom-type') == 0)//my-custom-type
                $item_output = '<div class="menu__more-block"><p class="menu__more-title">' . $item->title . '</p><div class="menu__more-links">';
            else
                if($item->menu_item_parent == 519)
                {
                    $menu_name = 'Luxeo.com.ua Header Menu';
                    //$locations = get_nav_menu_locations();

                    //if( $locations && isset($locations[ $menu_name ]) ){
                        $menu = wp_get_nav_menu_object( $menu_name ); // получаем объект меню

                        $menu_items = wp_get_nav_menu_items( $menu ); // получаем элементы меню

                        // создаем список
                        //$menu_list = '<ul id="menu-' . $menu_name . '">';

                        foreach ( (array) $menu_items as $key => $menu_item ){
                            if(/*strcmp($menu_item->type, 'my-custom-type') != 0 && */$menu_item->ID == $item->ID)
                                if($key == (count($menu_items) - 1) || strcmp($menu_items[$key + 1]->type, 'my-custom-type') == 0)
                                {
                                    $item_output = '<a href="' . $item->url . '" class="menu__more-link"><i class="material-icons">arrow_forward</i>' . $item->title . '</a></div></div>';
                                }
                                else
                                    $item_output = '<a href="' . $item->url . '" class="menu__more-link"><i class="material-icons">arrow_forward</i>' . $item->title . '</a>';

                            //$menu_list .= '<li><a href="' . $menu_item->url . '">' . $menu_item->title . '</a></li>';
                        }

                        //$menu_list .= '</ul>';
                    //}
                }
                else
                    $item_output = '<a href="' . $item->url . '" class="menu__drop-link"><i class="material-icons">arrow_forward</i>' . $item->title . '</a>';
        }

        /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            // Получим элементы меню на основе параметра $menu_name (тоже что и 'theme_location' или 'menu' в аргументах wp_nav_menu)
// Этот код - основа функции wp_nav_menu, где получается ID меню из слага

        /*$menu_name = 'Luxeo.com.ua Header Menu';
        $locations = get_nav_menu_locations();

        if( $locations && isset($locations[ $menu_name ]) ){
            $menu = wp_get_nav_menu_object( $locations[ $menu_name ] ); // получаем объект меню

            $menu_items = wp_get_nav_menu_items( $menu ); // получаем элементы меню

            // создаем список
            //$menu_list = '<ul id="menu-' . $menu_name . '">';

            foreach ( (array) $menu_items as $key => $menu_item ){
                if(strcmp($menu_item->type, 'my-custom-type') != 0 && $menu_item->ID == $item->ID)
                    if($key == (count($menu_items) - 1) || strcmp($menu_items[$key + 1]->type, 'my-custom-type') == 0)


                //$menu_list .= '<li><a href="' . $menu_item->url . '">' . $menu_item->title . '</a></li>';
            }

            //$menu_list .= '</ul>';
        }*/
        //else 
            //$menu_list = '<ul><li>Меню "' . $menu_name . '" не определено.</li></ul>';
        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        /*if($depth == 1)
            $item_output = '<a href="' . $item->url .'" class="menu__drop-link"><i class="material-icons">arrow_forward</i>' . $item->title . '</a>';*/


        // build html

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);

    }

    function end_el(&$output, $item, $depth = 0, $args = array()){
        if($depth == 0)
            $output .= '</li>';
    }

    function end_lvl( &$output, $depth = 0, $args = array() ) {
        //if($depth > 0)
        if($this->curItem->menu_item_parent == 519)
             $output .= '</div>
                    </div></div>
                    </div>';
        else
            $output .= '</div>
                    </div><div class="menu__drop-right">
                        <p class="menu__drop-title">Последние кейсы</p>
                        <hr class="header__line">
                        <a href="" class="menu__drop-case"><i class="material-icons">folder_open</i>DHL — Всемирный логистический провайдер в области авиа, морских перевозок и логистических решений.</a>
                        <a href="" class="menu__drop-case"><i class="material-icons">folder_open</i>Forter — интернет-магазин систем безопасности</a>
                    </div></div>
                    </div>';
    }

    /*function start_lvl(&$output, $depth = 0, $args = array())
    {

        if($depth == 0)
        {
            $output .= '<ul class="menu header__menu">';
        }

        if($depth == 1)
        {
            $output .= '<div class="menu__drop-left">
                                        <p class="menu__drop-title">SEO продвижение сайта</p>
                                        <hr class="header__line">
                                        <div class="menu__drop-links">';
        }

    }

    function end_lvl( &$output, $depth = 0, $args = array() ) {


        if($depth == 0)
        {
            $output .= '</ul>';
        }

        if($depth == 1)
        {
            $output .= '<a href="" class="menu__drop-link"><i class="material-icons">arrow_forward</i>Продвижение интернет-магазинов</a>
                                            <a href="" class="menu__drop-link"><i class="material-icons">arrow_forward</i>SEO-консультация </a>
                                            <a href="" class="menu__drop-link"><i class="material-icons">arrow_forward</i>Продвижение сайтов услуг</a>
                                            <a href="" class="menu__drop-link"><i class="material-icons">arrow_forward</i>SEO аудит сайта</a>
                                            <a href="" class="menu__drop-link"><i class="material-icons">arrow_forward</i>Продвижение по трафику</a>
                                            <a href="" class="menu__drop-link"><i class="material-icons">arrow_forward</i>Стоимость продвижения сайта</a>
            </div></div>
            <div class="menu__drop-right">
                                        <p class="menu__drop-title">Последние кейсы</p>
                                        <hr class="header__line">
                                        <a href="" class="menu__drop-case"><i class="material-icons">folder_open</i>DHL — Всемирный логистический провайдер в области авиа, морских перевозок и логистических решений.</a>
                                        <a href="" class="menu__drop-case"><i class="material-icons">folder_open</i>Forter — интернет-магазин систем безопасности</a>
                                    </div>';
        }

    }

    function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output )

    {

        $id_field = $this->db_fields['id'];

        if ( is_object( $args[0] ) ) {

            $args[0]->has_children = ! empty( $children_elements[$element->$id_field] );

        }

        return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );

    }

    // add main/sub classes to li's and links

    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)

    {

        if($depth == 0)
            $item_output = '<li class="menu__button menu__button_drop">
                            <a href="' . $item->url . '" class="menu__link">' . $item->title . '</a>
                            <div class="menu__drop">
                                <div class="container">';

        if($depth == 1)
            $item_output = '<a href="' . $item->url .'" class="menu__drop-link"><i class="material-icons">arrow_forward</i>' . $item->title . '</a>';


        // build html

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);

    }

    public function end_el( &$output, $item, $depth = 0, $args = array() ) {

        if($depth == 0)
                $output .= '</div></div></li>';

    }*/

}

class Footer_Walker extends Walker_Nav_Menu
{

    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)

    {
        $item_output = '<a href="' . $item->url . '" class="footer__link">' . $item->title . '</a>';

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);

    }
}

/**
 * Пагинация
 */
function luxeo_pagination( $args = array() ) {
    
    /*if(isset($args['ajax']))
    {
        $defaults = array(
            'range'           => (int)@$GLOBALS['wp_query']->max_num_pages,
            'custom_query'    => FALSE,
            'previous_string' => __( 'Previous', 'text-domain' ),
            'next_string'     => __( 'ЗАГРУЗИТЬ БОЛЬШЕ СТАТЕЙ', 'text-domain' ),
            //'before_output'   => '<div class="blog__pages-list" id="blog-pages-list">',
            //'after_output'    => '</div>'
        );
    }
    else
    {*/
    //$myajax = $args['ajax'];
        $defaults = array(
        'range'           => (int)@$GLOBALS['wp_query']->max_num_pages,
        'custom_query'    => FALSE,
        'previous_string' => __( 'Previous', 'text-domain' ),
        'next_string'     => __( 'ЗАГРУЗИТЬ БОЛЬШЕ СТАТЕЙ', 'text-domain' ),
        'before_output'   => '<div class="blog__pages-list" id="blog-pages-list">',
        'after_output'    => '</div>'
        );
    /*}*/
    
    $args = wp_parse_args( 
        $args, 
        apply_filters( 'wp_bootstrap_pagination_defaults', $defaults )
    );
    
    $args['range'] = (int) $args['range'] - 1;
    if ( !$args['custom_query'] )
        $args['custom_query'] = @$GLOBALS['wp_query'];
    $count = (int) $args['custom_query']->max_num_pages;
    $page  = intval( get_query_var( 'paged' ) );
    $ceil  = ceil( $args['range'] / 2 );

    if ( $count <= 1 )
        return FALSE;
    
    if ( !$page )
        $page = 1;
    
    if ( $count > $args['range'] ) {
        if ( $page <= $args['range'] ) {
            $min = 1;
            $max = $args['range'] + 1;
        } elseif ( $page >= ($count - $ceil) ) {
            $min = $count - $args['range'];
            $max = $count;
        } elseif ( $page >= $args['range'] && $page < ($count - $ceil) ) {
            $min = $page - $ceil;
            $max = $page + $ceil;
        }
    } else {
        $min = 1;
        $max = $count;
    }
    
    $echo = '';
    $previous = intval($page) - 1;
    $previous = esc_attr( get_pagenum_link($previous) );
    
    if ( !empty($min) && !empty($max) ) {
        for( $i = $min; $i <= $max; $i++ ) {
            if ($page == $i) {
                $echo .= '<a class="blog__num-page blog__num-page_cur" value="' . str_pad( (int)$i, 1, '0', STR_PAD_LEFT ) . '">' . str_pad( (int)$i, 1, '0', STR_PAD_LEFT ) . '</a>';
            } else {
                $echo .= sprintf( '<a href="%s" class="blog__num-page" value="' . $i . '">%2d</a>', esc_attr( get_pagenum_link($i) ), $i );
            }
        }
    }
    
    $next = intval($page) + 1;
    $next = esc_attr( get_pagenum_link($next) );
    if ($next && ($count != $page) )
        $echo .= '<a href="' . $next . '" title="' . __( 'next', 'text-domain') . '" class="blog__button blog__button_load-more">' . $args['next_string'] . '</a>';
    
    if(isset($args['myajax']))
    //if($myajax == 123)
    {
            /*if ( isset($echo) )
                return $echo;*/
                //$str = 'urapagination';
                return 'isset';
    }
    else
    {
            if ( isset($echo) )
        echo $args['before_output'] . $echo . $args['after_output'];
    }
}

function luxeo2_pagination( $args = array() ) {
    
        $defaults = array(
        'range'           => /*(int)@$GLOBALS['wp_query']->max_num_pages*/$args['number_of_pages'],
        'custom_query'    => FALSE,
        'previous_string' => __( 'Previous', 'text-domain' ),
        'next_string'     => __( 'ЗАГРУЗИТЬ БОЛЬШЕ СТАТЕЙ', 'text-domain' ),
        'before_output'   => '<div class="blog__pages-list" id="blog-pages-list">',
        'after_output'    => '</div>'
        );
    
    $args = wp_parse_args( 
        $args, 
        apply_filters( 'wp_bootstrap_pagination_defaults', $defaults )
    );
    
    $args['range'] = (int) $args['range'] - 1;
    if ( !$args['custom_query'] )
        $args['custom_query'] = @$GLOBALS['wp_query'];
    $count = /*(int) $args['custom_query']->max_num_pages*/$args['number_of_pages'];
    $page  = /*intval( get_query_var( 'paged' ) )*//*$args['paged']*/is_null($args['blog_page']) ? 1 : $args['blog_page'];
    $ceil  = ceil( $args['range'] / 2 );

    //return $args['number_of_pages'];
    
    if ( $count <= 1 )
        return FALSE;
    
    if ( !$page )
        $page = 1;
    
    if ( $count > $args['range'] ) {
        if ( $page <= $args['range'] ) {
            $min = 1;
            $max = $args['range'] + 1;
        } elseif ( $page >= ($count - $ceil) ) {
            $min = $count - $args['range'];
            $max = $count;
        } elseif ( $page >= $args['range'] && $page < ($count - $ceil) ) {
            $min = $page - $ceil;
            $max = $page + $ceil;
        }
    } else {
        $min = 1;
        $max = $count;
    }
    
    $echo = '';
    $previous = intval($page) - 1;
    $previous = esc_attr( get_pagenum_link($previous) );
    
    if ( !empty($min) && !empty($max) ) {
        for( $i = $min; $i <= $max; $i++ ) {
            if ($page == $i) {
                $echo .= '<a class="blog__num-page blog__num-page_cur" value="' . str_pad( (int)$i, 1, '0', STR_PAD_LEFT ) . '">' . str_pad( (int)$i, 1, '0', STR_PAD_LEFT ) . '</a>';
            } else {
                $echo .= sprintf( '<a href="%s" class="blog__num-page" value="' . $i . '">%2d</a>', 'https://www.google.com/'/*esc_attr( get_pagenum_link($i)/*get_home_url() . '/page/' . $i . '/'*/ /*)*/, $i );
            }
        }
    }
    
    $next = intval($page) + 1;
    $next = esc_attr( get_pagenum_link($next) );
    if ($next && ($count != $page) )
        $echo .= '<a href="' . $next . '" title="' . __( 'next', 'text-domain') . '" class="blog__button blog__button_load-more">' . $args['next_string'] . '</a>';
    
    if(isset($args['myajax']))
    //if($myajax == 123)
    {
            if ( isset($echo) )
                return $echo;
                //$str = 'urapagination';
                //return $_GET['paged'];
                //return (int)@$GLOBALS['wp_query']->max_num_pages;
    }
    else
    {
            if ( isset($echo) )
        echo $args['before_output'] . $echo . $args['after_output'];
        //return 'noset';
    }
}

add_action('wp_ajax_nopriv_get_posts_by_cat', 'get_posts_by_cat_callback');
add_action('wp_ajax_get_posts_by_cat', 'get_posts_by_cat_callback');
function get_posts_by_cat_callback()
{
    if(isset($_GET['cat'])){
        global $post;

        if($_GET['cat'] == 'seo' || $_GET['cat'] == 'smm' || $_GET['cat'] == 'ppc'){
            $args = array(
                        'numberposts' => -1,
                        'category_name'    => $_GET['cat'],
                        'post_type'   => 'post',
                        'posts_per_page' => -1,
                        //'paged'          => get_query_var( 'paged' ),
                        //'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                    );
            $wp_query = new WP_Query($args);
            $number_of_pages = ceil($wp_query->post_count / $_GET['articles_number']);
            //$number_of_pages = $wp_query->post_count / 9;
            //$number_of_pages = $wp_query->post_count;
            wp_reset_postdata();

            $args = array(
                        'numberposts' => -1,
                        'category_name'    => $_GET['cat'],
                        'post_type'   => 'post',
                        'posts_per_page' => $_GET['articles_number'],
                        'paged'          => isset($_GET['blog_page']) ? $_GET['blog_page'] : 1/*get_query_var( 'paged' )*/,
                        'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                    );
        }
        else{
            $args = array(
                        'numberposts' => -1,
                        'post_type'   => 'post',
                        'posts_per_page' => -1,
                        //'paged'          => get_query_var( 'paged' ),
                        //'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                    );
            $wp_query = new WP_Query($args);
            $number_of_pages = ceil($wp_query->post_count / $_GET['articles_number']);
            //$number_of_pages = $wp_query->post_count;
            wp_reset_postdata();

            $args = array(
                        'numberposts' => -1,
                        'post_type'   => 'post',
                        'posts_per_page' => $_GET['articles_number']/*9*/,
                        'paged'          => isset($_GET['blog_page']) ? $_GET['blog_page'] : 1/*get_query_var( 'paged' )*/,
                        'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                    );
        }

        //$posts = get_posts($args);
        $wp_query = new WP_Query($args);
        //$number_of_pages = ceil($wp_query->post_count / 9);
        if ( $wp_query->have_posts() ) :
        $result = array();

        //foreach ($posts as $post): setup_postdata($post);
        while ( $wp_query->have_posts() ) : $wp_query->the_post();
            $post_arr = array();
            $post_arr['img'] = get_the_post_thumbnail_url();

            $categories = get_the_category();
            $post_arr['category_name'] = $categories[0]->name;

            $post_arr['time'] = get_the_time('d.m.Y');
            $post_arr['views'] = do_shortcode('[views id="' . get_the_ID() . '"]');
            $post_arr['comments_number'] = get_comments_number();
            $post_arr['title'] = get_the_title();
            $post_arr['author_img'] = get_avatar_url( get_the_author_meta('user_email'));
            $post_arr['author'] = get_author_name();
            $post_arr['link'] = get_permalink();

            $result[] = $post_arr;
        //endforeach;
        endwhile;
        wp_reset_postdata();
        endif;

        $pagination = array();
        //$pagination['pagination'] = get_the_posts_pagination();
        $pagination['pagination'] = luxeo2_pagination(array('myajax' => 123, 'number_of_pages' => $number_of_pages, 'blog_page' => $_GET['blog_page']));/*test_pagination(array('ajax' => 123))*/;
        $result[] = $pagination;
        wp_reset_query();
        //wp_reset_postdata();

        echo json_encode($result);
    }else{
        echo json_encode(array('error' => 'incorrect value'));
    }

    wp_die();
}



/**
 * Хлебные крошки для WordPress (breadcrumbs)
 *
 * @param  string [$sep  = '']      Разделитель. По умолчанию ' » '
 * @param  array  [$l10n = array()] Для локализации. См. переменную $default_l10n.
 * @param  array  [$args = array()] Опции. См. переменную $def_args
 * @return string Выводит на экран HTML код
 *
 * version 3.3.2
 */
function kama_breadcrumbs( $sep = ' » ', $l10n = array(), $args = array() ){
    $kb = new Kama_Breadcrumbs;
    echo $kb->get_crumbs( $sep, $l10n, $args );
}

class Kama_Breadcrumbs {

    public $arg;

    // Локализация
    static $l10n = array(
        'home'       => 'Главная',
        'paged'      => 'Страница %d',
        '_404'       => 'Ошибка 404',
        'search'     => 'Результаты поиска по запросу - <b>%s</b>',
        'author'     => 'Архив автора: <b>%s</b>',
        'year'       => 'Архив за <b>%d</b> год',
        'month'      => 'Архив за: <b>%s</b>',
        'day'        => '',
        'attachment' => 'Медиа: %s',
        'tag'        => 'Записи по метке: <b>%s</b>',
        'tax_tag'    => '%1$s из "%2$s" по тегу: <b>%3$s</b>',
        // tax_tag выведет: 'тип_записи из "название_таксы" по тегу: имя_термина'.
        // Если нужны отдельные холдеры, например только имя термина, пишем так: 'записи по тегу: %3$s'
    );

    // Параметры по умолчанию
    static $args = array(
        'on_front_page'   => false,  // выводить крошки на главной странице
        'show_post_title' => true,  // показывать ли название записи в конце (последний элемент). Для записей, страниц, вложений
        'show_term_title' => true,  // показывать ли название элемента таксономии в конце (последний элемент). Для меток, рубрик и других такс
        'title_patt'      => /*'<span class="kb_title">%s</span>'*/'<p class="crumb__page">%s</p>', // шаблон для последнего заголовка. Если включено: show_post_title или show_term_title
        'last_sep'        => true,  // показывать последний разделитель, когда заголовок в конце не отображается
        'markup'          => 'schema.org', // 'markup' - микроразметка. Может быть: 'rdf.data-vocabulary.org', 'schema.org', '' - без микроразметки
                                           // или можно указать свой массив разметки:
                                           // array( 'wrappatt'=>'<div class="kama_breadcrumbs">%s</div>', 'linkpatt'=>'<a href="%s">%s</a>', 'sep_after'=>'', )
        'priority_tax'    => array('category'), // приоритетные таксономии, нужно когда запись в нескольких таксах
        'priority_terms'  => array(), // 'priority_terms' - приоритетные элементы таксономий, когда запись находится в нескольких элементах одной таксы одновременно.
                                      // Например: array( 'category'=>array(45,'term_name'), 'tax_name'=>array(1,2,'name') )
                                      // 'category' - такса для которой указываются приор. элементы: 45 - ID термина и 'term_name' - ярлык.
                                      // порядок 45 и 'term_name' имеет значение: чем раньше тем важнее. Все указанные термины важнее неуказанных...
        'nofollow' => false, // добавлять rel=nofollow к ссылкам?

        // служебные
        'sep'             => '',
        'linkpatt'        => '',
        'pg_end'          => '',
    );

    function get_crumbs( $sep, $l10n, $args ){
        global $post, $wp_query, $wp_post_types;

        self::$args['sep'] = $sep;

        // Фильтрует дефолты и сливает
        $loc = (object) array_merge( apply_filters('kama_breadcrumbs_default_loc', self::$l10n ), $l10n );
        $arg = (object) array_merge( apply_filters('kama_breadcrumbs_default_args', self::$args ), $args );

        $arg->sep = ''; // дополним

        // упростим
        $sep = & $arg->sep;
        $this->arg = & $arg;

        // микроразметка ---
        if(1){
            $mark = & $arg->markup;

            // Разметка по умолчанию
            if( ! $mark ) $mark = array(
                'wrappatt'  => '<div class="kama_breadcrumbs">%s</div>',
                'linkpatt'  => '<a href="%s">%s</a>',
                'sep_after' => '',
            );
            // rdf
            elseif( $mark === 'rdf.data-vocabulary.org' ) $mark = array(
                'wrappatt'   => '<div class="kama_breadcrumbs" prefix="v: http://rdf.data-vocabulary.org/#">%s</div>',
                'linkpatt'   => '<span typeof="v:Breadcrumb"><a href="%s" rel="v:url" property="v:title">%s</a>',
                'sep_after'  => '</span>', // закрываем span после разделителя!
            );
            // schema.org
            elseif( $mark === 'schema.org' ) $mark = array(
                'wrappatt'   => '<div class="container">%s</div>',
                'linkpatt'   => '<a href="%s" class="crumb__page">%s</a>',
                'sep_after'  => '',
                'title_patt'      => '<a href="#" class="crumb__page">%s</a>',
            );

            elseif( ! is_array($mark) )
                die( __CLASS__ .': "markup" parameter must be array...');

            $wrappatt  = $mark['wrappatt'];
            $arg->linkpatt  = $arg->nofollow ? str_replace('<a ','<a rel="nofollow"', $mark['linkpatt']) : $mark['linkpatt'];
            $arg->sep      .= $mark['sep_after']."\n";
        }

        $linkpatt = $arg->linkpatt; // упростим

        $q_obj = get_queried_object();

        // может это архив пустой таксы?
        $ptype = null;
        if( empty($post) ){
            if( isset($q_obj->taxonomy) )
                $ptype = & $wp_post_types[ get_taxonomy($q_obj->taxonomy)->object_type[0] ];
        }
        else $ptype = & $wp_post_types[ $post->post_type ];

        // paged
        $arg->pg_end = '';
        if( ($paged_num = get_query_var('paged')) || ($paged_num = get_query_var('page')) )
            $arg->pg_end = $sep . sprintf( $loc->paged, (int) $paged_num );

        $pg_end = $arg->pg_end; // упростим

        // ну, с богом...
        $out = '';

        if( is_front_page() ){
            return $arg->on_front_page ? sprintf( $wrappatt, ( $paged_num ? sprintf($linkpatt, get_home_url(), $loc->home) . $pg_end : $loc->home ) ) : '';
        }
        // страница записей, когда для главной установлена отдельная страница.
        elseif( is_home() ) {
           $out = $paged_num ? ( sprintf( $linkpatt, get_permalink($q_obj), esc_html($q_obj->post_title) ) . $pg_end ) : esc_html($q_obj->post_title);
        }
        elseif( is_404() ){
            $out = $loc->_404;
        }
        elseif( is_search() ){
            $out = sprintf( $loc->search, esc_html( $GLOBALS['s'] ) );
        }
        elseif( is_author() ){
            $tit = sprintf( $loc->author, esc_html($q_obj->display_name) );
            $out = ( $paged_num ? sprintf( $linkpatt, get_author_posts_url( $q_obj->ID, $q_obj->user_nicename ) . $pg_end, $tit ) : $tit );
        }
        elseif( is_year() || is_month() || is_day() ){
            $y_url  = get_year_link( $year = get_the_time('Y') );

            if( is_year() ){
                $tit = sprintf( $loc->year, $year );
                $out = ( $paged_num ? sprintf($linkpatt, $y_url, $tit) . $pg_end : $tit );
            }
            // month day
            else {
                $y_link = sprintf( $linkpatt, $y_url, $year);
                $m_url  = get_month_link( $year, get_the_time('m') );

                if( is_month() ){
                    $tit = sprintf( $loc->month, get_the_time('F') );
                    $out = $y_link . $sep . ( $paged_num ? sprintf( $linkpatt, $m_url, $tit ) . $pg_end : $tit );
                }
                elseif( is_day() ){
                    $m_link = sprintf( $linkpatt, $m_url, get_the_time('F'));
                    $out = $y_link . $sep . $m_link . $sep . get_the_time('l');
                }
            }
        }
        // Древовидные записи
        elseif( is_singular() && $ptype->hierarchical ){
            $out = $this->_add_title( $this->_page_crumbs($post), $post );
        }
        // Таксы, плоские записи и вложения
        else {
            $term = $q_obj; // таксономии

            // определяем термин для записей (включая вложения attachments)
            if( is_singular() ){
                // изменим $post, чтобы определить термин родителя вложения
                if( is_attachment() && $post->post_parent ){
                    $save_post = $post; // сохраним
                    $post = get_post($post->post_parent);
                }

                // учитывает если вложения прикрепляются к таксам древовидным - все бывает :)
                $taxonomies = get_object_taxonomies( $post->post_type );
                // оставим только древовидные и публичные, мало ли...
                $taxonomies = array_intersect( $taxonomies, get_taxonomies( array('hierarchical' => true, 'public' => true) ) );

                if( $taxonomies ){
                    // сортируем по приоритету
                    if( ! empty($arg->priority_tax) ){
                        usort( $taxonomies, function($a,$b)use($arg){
                            $a_index = array_search($a, $arg->priority_tax);
                            if( $a_index === false ) $a_index = 9999999;

                            $b_index = array_search($b, $arg->priority_tax);
                            if( $b_index === false ) $b_index = 9999999;

                            return ( $b_index === $a_index ) ? 0 : ( $b_index < $a_index ? 1 : -1 ); // меньше индекс - выше
                        } );
                    }

                    // пробуем получить термины, в порядке приоритета такс
                    foreach( $taxonomies as $taxname ){
                        if( $terms = get_the_terms( $post->ID, $taxname ) ){
                            // проверим приоритетные термины для таксы
                            $prior_terms = & $arg->priority_terms[ $taxname ];
                            if( $prior_terms && count($terms) > 2 ){
                                foreach( (array) $prior_terms as $term_id ){
                                    $filter_field = is_numeric($term_id) ? 'term_id' : 'slug';
                                    $_terms = wp_list_filter( $terms, array($filter_field=>$term_id) );

                                    if( $_terms ){
                                        $term = array_shift( $_terms );
                                        break;
                                    }
                                }
                            }
                            else
                                $term = array_shift( $terms );

                            break;
                        }
                    }
                }

                if( isset($save_post) ) $post = $save_post; // вернем обратно (для вложений)
            }

            // вывод

            // все виды записей с терминами или термины
            if( $term && isset($term->term_id) ){
                $term = apply_filters('kama_breadcrumbs_term', $term );

                // attachment
                if( is_attachment() ){
                    if( ! $post->post_parent )
                        $out = sprintf( $loc->attachment, esc_html($post->post_title) );
                    else {
                        if( ! $out = apply_filters('attachment_tax_crumbs', '', $term, $this ) ){
                            $_crumbs    = $this->_tax_crumbs( $term, 'self' );
                            $parent_tit = sprintf( $linkpatt, get_permalink($post->post_parent), get_the_title($post->post_parent) );
                            $_out = implode( $sep, array($_crumbs, $parent_tit) );
                            $out = $this->_add_title( $_out, $post );
                        }
                    }
                }
                // single
                elseif( is_single() ){
                    if( ! $out = apply_filters('post_tax_crumbs', '', $term, $this ) ){
                        $_crumbs = $this->_tax_crumbs( $term, 'self' );
                        $out = $this->_add_title( $_crumbs, $post );
                    }
                }
                // не древовидная такса (метки)
                elseif( ! is_taxonomy_hierarchical($term->taxonomy) ){
                    // метка
                    if( is_tag() )
                        $out = $this->_add_title('', $term, sprintf( $loc->tag, esc_html($term->name) ) );
                    // такса
                    elseif( is_tax() ){
                        $post_label = $ptype->labels->name;
                        $tax_label = $GLOBALS['wp_taxonomies'][ $term->taxonomy ]->labels->name;
                        $out = $this->_add_title('', $term, sprintf( $loc->tax_tag, $post_label, $tax_label, esc_html($term->name) ) );
                    }
                }
                // древовидная такса (рибрики)
                else {
                    if( ! $out = apply_filters('term_tax_crumbs', '', $term, $this ) ){
                        $_crumbs = $this->_tax_crumbs( $term, 'parent' );
                        $out = $this->_add_title( $_crumbs, $term, esc_html($term->name) );                     
                    }
                }
            }
            // влоежния от записи без терминов
            elseif( is_attachment() ){
                $parent = get_post($post->post_parent);
                $parent_link = sprintf( $linkpatt, get_permalink($parent), esc_html($parent->post_title) );
                $_out = $parent_link;

                // вложение от записи древовидного типа записи
                if( is_post_type_hierarchical($parent->post_type) ){
                    $parent_crumbs = $this->_page_crumbs($parent);
                    $_out = implode( $sep, array( $parent_crumbs, $parent_link ) );
                }

                $out = $this->_add_title( $_out, $post );
            }
            // записи без терминов
            elseif( is_singular() ){
                $out = $this->_add_title( '', $post );
            }
        }

        // замена ссылки на архивную страницу для типа записи
        $home_after = apply_filters('kama_breadcrumbs_home_after', '', $linkpatt, $sep, $ptype );

        if( '' === $home_after ){
            // Ссылка на архивную страницу типа записи для: отдельных страниц этого типа; архивов этого типа; таксономий связанных с этим типом.
            if( $ptype && $ptype->has_archive && ! in_array( $ptype->name, array('post','page','attachment') )
                && ( is_post_type_archive() || is_singular() || (is_tax() && in_array($term->taxonomy, $ptype->taxonomies)) )
            ){
                $pt_title = $ptype->labels->name;

                // первая страница архива типа записи
                if( is_post_type_archive() && ! $paged_num )
                    $home_after = sprintf( $this->arg->title_patt, $pt_title );
                // singular, paged post_type_archive, tax
                else{
                    $home_after = sprintf( $linkpatt, get_post_type_archive_link($ptype->name), $pt_title );

                    $home_after .= ( ($paged_num && ! is_tax()) ? $pg_end : $sep ); // пагинация
                }
            }
        }

        $before_out = sprintf( $linkpatt, home_url(), $loc->home ) . ( $home_after ? $sep.$home_after : ($out ? $sep : '') );

        $out = apply_filters('kama_breadcrumbs_pre_out', $out, $sep, $loc, $arg );

        $out = sprintf( $wrappatt, $before_out . $out );

        return apply_filters('kama_breadcrumbs', $out, $sep, $loc, $arg );
    }

    function _page_crumbs( $post ){
        $parent = $post->post_parent;

        $crumbs = array();
        while( $parent ){
            $page = get_post( $parent );
            $crumbs[] = sprintf( $this->arg->linkpatt, get_permalink($page), esc_html($page->post_title) );
            $parent = $page->post_parent;
        }

        return implode( $this->arg->sep, array_reverse($crumbs) );
    }

    function _tax_crumbs( $term, $start_from = 'self' ){
        $termlinks = array();
        $term_id = ($start_from === 'parent') ? $term->parent : $term->term_id;
        while( $term_id ){
            $term       = get_term( $term_id, $term->taxonomy );
            $termlinks[] = sprintf( $this->arg->linkpatt, get_term_link($term), esc_html($term->name) );
            $term_id    = $term->parent;
        }

        if( $termlinks )
            return implode( $this->arg->sep, array_reverse($termlinks) ) /*. $this->arg->sep*/;
        return '';
    }

    // добалвяет заголовок к переданному тексту, с учетом всех опций. Добавляет разделитель в начало, если надо.
    function _add_title( $add_to, $obj, $term_title = '' ){
        $arg = & $this->arg; // упростим...
        $title = $term_title ? $term_title : esc_html($obj->post_title); // $term_title чиститься отдельно, теги моугт быть...
        $show_title = $term_title ? $arg->show_term_title : $arg->show_post_title;

        // пагинация
        if( $arg->pg_end ){
            $link = $term_title ? get_term_link($obj) : get_permalink($obj);
            $add_to .= ($add_to ? $arg->sep : '') . sprintf( $arg->linkpatt, $link, $title ) . $arg->pg_end;
        }
        // дополняем - ставим sep
        elseif( $add_to ){
            if( $show_title )
                $add_to .= $arg->sep . sprintf( $arg->title_patt, $title );
            elseif( $arg->last_sep )
                $add_to .= $arg->sep;
        }
        // sep будет потом...
        elseif( $show_title )
            $add_to = sprintf( $arg->title_patt, $title );

        return $add_to;
    }

}

/*function example_customizer( $wp_customize ) {

  $wp_customize->add_panel( 'contacts_panel', array(
    'title'          => __('Контакты и др.'),
  ) );

  $wp_customize->add_section(
        'contacts_section',
        array(
            'title' => 'Контакты',
            'panel' => 'contacts_panel',
        )
  );

  $wp_customize->add_setting('phone_1');

  $wp_customize->add_setting('phone_2');

  $wp_customize->add_setting('phone_3');

  $wp_customize->add_setting('phone_4');

  $wp_customize->add_setting('address');

  $wp_customize->add_setting('email');

  $wp_customize->add_setting('facebook');

  $wp_customize->add_setting('instagram');

  $wp_customize->add_setting('google');

  $wp_customize->add_setting('youtube');

  $wp_customize->add_control(
    'phone_1',
    array(
        'label' => 'Номер 1',
        'section' => 'contacts_section',
        'type' => 'text',
    )
  );

    $wp_customize->add_control(
    'phone_2',
    array(
        'label' => 'Номер 2',
        'section' => 'contacts_section',
        'type' => 'text',
    )
  );

    $wp_customize->add_control(
    'phone_3',
    array(
        'label' => 'Номер 3',
        'section' => 'contacts_section',
        'type' => 'text',
    )
  );

      $wp_customize->add_control(
    'phone_4',
    array(
        'label' => 'Номер 4',
        'section' => 'contacts_section',
        'type' => 'text',
    )
  );

        $wp_customize->add_control(
    'address',
    array(
        'label' => 'Адрес',
        'section' => 'contacts_section',
        'type' => 'text',
    )
  );

    $wp_customize->add_control(
    'email',
    array(
        'label' => 'E-mail',
        'section' => 'contacts_section',
        'type' => 'text',
    )
  );

        $wp_customize->add_control(
    'email',
    array(
        'label' => 'E-mail',
        'section' => 'contacts_section',
        'type' => 'text',
    )
  );

     $wp_customize->add_control(
    'facebook',
    array(
        'label' => 'Facebook URL',
        'section' => 'contacts_section',
        'type' => 'text',
    )
  );

     $wp_customize->add_control(
    'instagram',
    array(
        'label' => 'Instagram URL',
        'section' => 'contacts_section',
        'type' => 'text',
    )
  );

    $wp_customize->add_control(
    'google',
    array(
        'label' => 'Google+ URL',
        'section' => 'contacts_section',
        'type' => 'text',
    )
  );

    $wp_customize->add_control(
    'youtube',
    array(
        'label' => 'YouTube URL',
        'section' => 'contacts_section',
        'type' => 'text',
    )
  );
}

add_action( 'customize_register', 'example_customizer' );*/

class Hr_Widget extends WP_Widget {

    /**
     * Sets up the widgets name etc
     */
    public function __construct() {
        parent::__construct( 'hr_widget', 'luxeo.com.ua_Горизонтальный разделитель', array('description' => 'Горизонтальный разделитель') );
    }

    /**
     * Outputs the content of the widget
     *
     * @param array $args
     * @param array $instance
     */
    public function widget( $args, $instance ) {
        // outputs the content of the widget
        echo '<hr class="blog__line">';
    }

    /**
     * Outputs the options form on admin
     *
     * @param array $instance The widget options
     */
    public function form( $instance ) {
        // outputs the options form on admin
    }

    /**
     * Processing widget options on save
     *
     * @param array $new_instance The new options
     * @param array $old_instance The previous options
     *
     * @return array
     */
    public function update( $new_instance, $old_instance ) {
        // processes widget options to be saved
    }
}

add_action( 'widgets_init', function(){
    register_widget( 'Hr_Widget' );
});

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//<?php
function my_register_menu_metabox() {
    $custom_param = array( 0 => 'This param will be passed to my_render_menu_metabox' );
    
    add_meta_box( 'my-menu-test-metabox', 'Заголовки пункта меню "Ещё..."', 'my_render_menu_metabox', 'nav-menus', 'side', 'default', $custom_param );
}
add_action( 'admin_head-nav-menus.php', 'my_register_menu_metabox' );
/**
 * Displays a menu metabox 
 *
 * @param string $object Not used.
 * @param array $args Parameters and arguments. If you passed custom params to add_meta_box(), 
 * they will be in $args['args']
 */
function my_render_menu_metabox( $object, $args ) {
    global $nav_menu_selected_id;
    // Create an array of objects that imitate Post objects
    $my_items = array(
        (object) array(
            'ID' => 1,
            'db_id' => 0,
            'menu_item_parent' => 0,
            'object_id' => 1,
            'post_parent' => 0,
            'type' => 'my-custom-type',
            'object' => 'more', //
            'type_label' => 'My Cool Plugin',
            'title' => 'О компании',
            'url' => home_url( '/custom-link-1/' ),
            'target' => '',
            'attr_title' => '',
            'description' => '',
            'classes' => array(),
            'xfn' => '',
        ),
        (object) array(
            'ID' => 2,
            'db_id' => 0,
            'menu_item_parent' => 0,
            'object_id' => 2,
            'post_parent' => 0,
            'type' => 'my-custom-type',
            'object' => 'more',
            'type_label' => 'My Cool Plugin',
            'title' => 'Продвижение в соцсетях',
            'url' => home_url( '/custom-link-2/' ),
            'target' => '',
            'attr_title' => '',
            'description' => '',
            'classes' => array(),
            'xfn' => '',
        ),
        (object) array(
            'ID' => 3,
            'db_id' => 0,
            'menu_item_parent' => 0,
            'object_id' => 3,
            'post_parent' => 0,
            'type' => 'my-custom-type',
            'object' => 'more',
            'type_label' => 'My Cool Plugin',
            'title' => 'Комплексное продвижение',
            'url' => home_url( '/custom-link-3/' ),
            'target' => '',
            'attr_title' => '',
            'description' => '',
            'classes' => array(),
            'xfn' => '',
        ),
        (object) array(
            'ID' => 4,
            'db_id' => 0,
            'menu_item_parent' => 0,
            'object_id' => 4,
            'post_parent' => 0,
            'type' => 'my-custom-type',
            'object' => 'more',
            'type_label' => 'My Cool Plugin',
            'title' => 'Аудит',
            'url' => home_url( '/custom-link-4/' ),
            'target' => '',
            'attr_title' => '',
            'description' => '',
            'classes' => array(),
            'xfn' => '',
        ),
                (object) array(
            'ID' => 5,
            'db_id' => 0,
            'menu_item_parent' => 0,
            'object_id' => 5,
            'post_parent' => 0,
            'type' => 'my-custom-type',
            'object' => 'more',
            'type_label' => 'My Cool Plugin',
            'title' => 'Прогнозная аналитика',
            'url' => home_url( '/custom-link-5/' ),
            'target' => '',
            'attr_title' => '',
            'description' => '',
            'classes' => array(),
            'xfn' => '',
        ),
                        (object) array(
            'ID' => 6,
            'db_id' => 0,
            'menu_item_parent' => 0,
            'object_id' => 6,
            'post_parent' => 0,
            'type' => 'my-custom-type',
            'object' => 'more',
            'type_label' => 'My Cool Plugin',
            'title' => 'Блог',
            'url' => home_url( '/custom-link-6/' ),
            'target' => '',
            'attr_title' => '',
            'description' => '',
            'classes' => array(),
            'xfn' => '',
        ),
    );
    $db_fields = false;
    // If your links will be hieararchical, adjust the $db_fields array bellow
    if ( false ) {
        $db_fields = array( 'parent' => 'parent', 'id' => 'post_parent' );
    }
    $walker = new Walker_Nav_Menu_Checklist( $db_fields );
    $removed_args = array(
        'action',
        'customlink-tab',
        'edit-menu-item',
        'menu-item',
        'page-tab',
        '_wpnonce',
    ); ?>
    <div id="my-plugin-div">
        <div id="tabs-panel-my-plugin-all" class="tabs-panel tabs-panel-active">
        <ul id="my-plugin-checklist-pop" class="categorychecklist form-no-clear" >
            <?php echo walk_nav_menu_tree( array_map( 'wp_setup_nav_menu_item', $my_items ), 0, (object) array( 'walker' => $walker ) ); ?>
        </ul>

        <p class="button-controls">
            <span class="list-controls">
                <a href="<?php
                    echo esc_url(add_query_arg(
                        array(
                            'my-plugin-all' => 'all',
                            'selectall' => 1,
                        ),
                        remove_query_arg( $removed_args )
                    ));
                ?>#my-menu-test-metabox" class="select-all"><?php _e( 'Select All' ); ?></a>
            </span>

            <span class="add-to-menu">
                <input type="submit"<?php wp_nav_menu_disabled_check( $nav_menu_selected_id ); ?> class="button-secondary submit-add-to-menu right" value="<?php esc_attr_e( 'Add to Menu' ); ?>" name="add-my-plugin-menu-item" id="submit-my-plugin-div" />
                <span class="spinner"></span>
            </span>
        </p>
    </div>
    <?php
}

/*
    ========================================
    Change My Custom Metabox Text Color
    ========================================
*/
add_action('admin_head', 'my_custom_fonts');

function my_custom_fonts(){
    echo '<style>
        .menu-item-more div div span .menu-item-title {
            color: green;
            font-weight: bold;
            font-style: italic;
        }

        .menu-item-more .menu-item-bar div .item-controls .item-type {
                visibility: hidden;
                position: relative;
        }

        .menu-item-more .menu-item-bar div .item-controls .item-type:after {
            visibility: visible;
            top: 0;
            left: 0;
            content: "Заголовок";
        }
    </style>';
}

/*
    ========================================
    Customizer
    ========================================
*/
add_action( 'customize_register', 'luxeo_customizer');
function luxeo_customizer(){
    global $wp_customize;

    $wp_customize->add_section('phone_numbers_section', array(
        'title' => 'Номера телефонов',
        'priority' => '21',
    ));

    $wp_customize->add_section('social_networks_section', array(
        'title' => 'Социальные сети',
        'description' => 'URL социальных сетей',
        'priority' => '22',
    ));

    $wp_customize->add_section('footer_section', array(
        'title' => 'Футер',
        'description' => 'Некоторая информация в футере',
        'priority' => '23',
    ));

    $wp_customize->add_setting('phone_number_1');
    $wp_customize->add_setting('phone_number_2');
    $wp_customize->add_setting('phone_number_3');
    $wp_customize->add_setting('phone_number_4');

    $wp_customize->add_setting('facebook');
    $wp_customize->add_setting('instagram');
    $wp_customize->add_setting('google');
    $wp_customize->add_setting('youtube');
    $wp_customize->add_setting('twitter');
    $wp_customize->add_setting('linkedin');

    $wp_customize->add_setting('about_company_1');
    $wp_customize->add_setting('about_company_2');

    $wp_customize->add_setting('address_1');
    $wp_customize->add_setting('address_2');

    $wp_customize->add_setting('email');

//Номера телефонов
    $wp_customize->add_control(
    'phone_number_1',
    array(
        'label' => 'Номер телефона 1',
        'section' => 'phone_numbers_section',
        'type' => 'text',
        )
    );

    $wp_customize->add_control(
    'phone_number_2',
    array(
        'label' => 'Номер телефона 2',
        'section' => 'phone_numbers_section',
        'type' => 'text',
        )
    );

    $wp_customize->add_control(
    'phone_number_3',
    array(
        'label' => 'Номер телефона 3',
        'section' => 'phone_numbers_section',
        'type' => 'text',
        )
    );

    $wp_customize->add_control(
    'phone_number_4',
    array(
        'label' => 'Номер телефона 4',
        'section' => 'phone_numbers_section',
        'type' => 'text',
        )
    );

//Социальные сети
    $wp_customize->add_control(
    'facebook',
    array(
        'label' => 'Facebook',
        'section' => 'social_networks_section',
        'type' => 'text',
        )
    );

    $wp_customize->add_control(
    'instagram',
    array(
        'label' => 'Instagram',
        'section' => 'social_networks_section',
        'type' => 'text',
        )
    );

    $wp_customize->add_control(
    'google',
    array(
        'label' => 'Google+',
        'section' => 'social_networks_section',
        'type' => 'text',
        )
    );

    $wp_customize->add_control(
    'youtube',
    array(
        'label' => 'Youtube',
        'section' => 'social_networks_section',
        'type' => 'text',
        )
    );

    $wp_customize->add_control(
    'twitter',
    array(
        'label' => 'Twitter',
        'section' => 'social_networks_section',
        'type' => 'text',
        )
    );

    $wp_customize->add_control(
    'linkedin',
    array(
        'label' => 'LinkedIn',
        'section' => 'social_networks_section',
        'type' => 'text',
        )
    );

//О компании, адрес, email
    $wp_customize->add_control(
    'about_company_1',
    array(
        'label' => 'О компании - Первый абзац',
        'section' => 'footer_section',
        'type' => 'text',
        )
    );

    $wp_customize->add_control(
    'about_company_2',
    array(
        'label' => 'О компании - Второй абзац',
        'section' => 'footer_section',
        'type' => 'text',
        )
    );

    $wp_customize->add_control(
    'address_1',
    array(
        'label' => 'Адрес - Строка 1',
        'section' => 'footer_section',
        'type' => 'text',
        )
    );

    $wp_customize->add_control(
    'address_2',
    array(
        'label' => 'Адрес - Строка 2',
        'section' => 'footer_section',
        'type' => 'text',
        )
    );

    $wp_customize->add_control(
    'email',
    array(
        'label' => 'Email',
        'section' => 'footer_section',
        'type' => 'text',
        )
    );
}