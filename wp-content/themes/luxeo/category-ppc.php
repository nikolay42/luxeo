<?php
    $args = array(
    'posts_per_page' => 9,
    'post_type'      => 'post',
    'paged'          => get_query_var( 'paged' ),
    'category_name'  => 'ppc',
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