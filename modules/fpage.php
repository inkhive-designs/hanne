<?php if (get_theme_mod('hanne_fpages_enable') && is_front_page() ) : ?>
<div class="featured-pages-section">
    <div class="col-md-12 col-sm-12 feature-page-wrapper">
        <div class="col-md-6 col-sm-12">
            <?php $pages_ids = array(0);
                $content='';
            if ( get_theme_mod('hanne_fpages_page1')) { $pages_ids[] = get_theme_mod('hanne_fpages_page1'); }
                $args = array(
                    'post_type' => 'page',
                    'posts_per_page' => 4,
                    'post__in' => $pages_ids,
                    'orderby' => 'post__in',
                );
                $loop = new WP_Query( $args );
                while ( $loop->have_posts() ) :

                $loop->the_post(); ?>
                    <!-- -->
                    <div class="featured-page feature-page-outer1">
                            <div class="featured-image">
                                <a class="feature-link title-font" href="<?php the_permalink(); ?>"><?php echo the_post_thumbnail('cover'); ?></a>
                            </div>

                            <div class="textual-info">
                                <div class="feature-title title-font"><?php the_title(); ?></div>
                                <div class="feature-content">
                                    <?php $my_postid = get_theme_mod('hanne_hero1_selectpage');
                                    $content_post = get_post($my_postid);
                                    $content = $content_post->post_content;
                                    $content = apply_filters('the_content', $content);
                                    echo substr($content, 0, 850)."...";  ?>
                                </div>
                                <?php if(get_theme_mod('hanne_fpages_page1_url')):?>
                                    <a class="feature-link title-font" href="<?php echo get_theme_mod('hanne_fpages_page1_url')  ?>"><?php _e('Learn More','hanne'); ?></a>
                                    <?php else:?>
                                    <a class="feature-link title-font" href="<?php the_permalink(); ?>"><?php _e('Learn More','hanne'); ?></a>
                                <?php endif;?>
                            </div>
                    </div>
                <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        </div>
        <!-- page 2-->
        <div class="col-md-6 col-sm-12">
            <?php $pages_ids = array(0);

            if ( get_theme_mod('hanne_fpages_page2')) { $pages_ids[] = get_theme_mod('hanne_fpages_page2'); }
            $args = array(
                'post_type' => 'page',
                'posts_per_page' => 4,
                'post__in' => $pages_ids,
                'orderby' => 'post__in',
            );
            $loop = new WP_Query( $args );
            while ( $loop->have_posts() ) :

                $loop->the_post(); ?>
                <!-- -->
            <div class="featured-page feature-page-outer2">
                <div class="featured-image">
                    <a class="feature-link title-font" href="<?php the_permalink(); ?>"><?php echo the_post_thumbnail('cover'); ?></a>
                </div>

                <div class="textual-info">
                    <div class="feature-title title-font"><?php the_title(); ?></div>
                    <div class="feature-content">
                        <?php $my_postid = get_theme_mod('hanne_hero1_selectpage');
                        $content_post = get_post($my_postid);
                        $content = $content_post->post_content;
                        $content = apply_filters('the_content', $content);
                        echo substr($content, 0, 850)."...";  ?>
                    </div>
                    <?php if(get_theme_mod('hanne_fpages_page2_url')):?>
                        <a class="feature-link title-font" href="<?php echo get_theme_mod('hanne_fpages_page2_url')  ?>"><?php _e('Learn More','hanne'); ?></a>
                    <?php else:?>
                        <a class="feature-link title-font" href="<?php the_permalink(); ?>"><?php _e('Learn More','hanne'); ?></a>
                    <?php endif;?>
                </div>
            </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        </div>
    </div>

</div>
<?php endif; ?>