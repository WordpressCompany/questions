<?php

global $wp_query;
$original_query = $wp_query;

get_header();


?>

<!--============= Banner Section Starts Here =============-->
<section class="banner-2 bg_img"
         data-background="<?php echo get_template_directory_uri(); ?>/assets/images/banner/banner-2.jpg">
    <div class="container">
        <div class="banner-content-2">
            <h1 class="title cl-white">
               All search results including the <?php echo get_query_var('s');?>
            </h1>
            <p class=" cl-white">
             All the questions including the search term <?php echo get_query_var('s');?>
            </p>
            <?php echo get_search_form(); ?>
        </div>
    </div>
</section>



<!--============= Billing Section Starts Here =============-->
<section class="billing-section padding-top padding-bottom">
    <div class="container">
        <div class="section-header">
            <h2 class="title">Latest Questions Containing
                <i>
                    <?php echo get_query_var('s');?>
                </i>
            </h2>
            <p>Explore the latest questions containing <b> <?php echo get_query_var('s');?></b> and answers given by our top developers.</p>
        </div>
        <div class="row justify-content-center mb-30-none">
            <?php
            if (get_query_var('paged')) {
                $paged = get_query_var('paged');
            } elseif (get_query_var('page')) {
                $paged = get_query_var('page');
            } else {
                $paged = 1;
            }
            $args = array(

                'order' => 'DESC',
                'paged' => $paged,
                'posts_per_page' => 10,
            );
            $loop = new WP_Query($args);
            while ($loop->have_posts()) :$loop->the_post(); ?>
                <div class="col-12">


                    <div class="cate-single-item">
                        <h3 class="title">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </h3>

                        <p>
                            <?php the_excerpt(); ?>
                        </p>
                        <div class="cate-author">
                            <div class="thumb">
                                <a href="#0">
                                    <?php echo get_avatar( get_the_author_meta( 'ID' ), '85' ); ?>
                                </a>
                            </div>
                            <div class="content">
                                <h5 class="subtitle">
                                    <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) );?>">
                                        <?php
                                        printf(
                                        /* translators: %s: Author name. */
                                            esc_html__( 'By %s', 'twentytwentyone' ),
                                            get_the_author()
                                        );
                                        ?>
                                    </a>
                                </h5>
                                <span>
                                      <?php twenty_twenty_one_entry_meta_footer(); ?>
                                </span>
                            </div>
                        </div>
                    </div>

                </div>
            <?php endwhile; ?>
            <?php echo get_pagination($original_query);?>
        </div>
    </div>
</section>
<!--============= Billing Section Ends Here =============-->
<?php get_footer(); ?>
