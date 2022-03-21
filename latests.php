<?php /* Template Name: Latest Questions Template */ ?>
<?php get_header(); ?>
<?php

$current_category = get_queried_object();

$category = single_cat_title('', false);

$categoryID = get_cat_ID(single_cat_title());

?>

<!--============= Banner Section Starts Here =============-->
<section class="banner-2 bg_img"
         data-background="<?php echo get_template_directory_uri(); ?>/assets/images/banner/banner-2.jpg">
    <div class="container">
        <div class="banner-content-2">
            <h1 class="title cl-white">
                <?php twentytwenty_site_logo(); ?>
            </h1>
            <p class=" cl-white">
                <?php twentytwenty_site_description(); ?>
            </p>
            <?php echo get_search_form(); ?>
        </div>
    </div>
</section>
<!--============= Banner Section Ends Here =============-->


<!--============= Billing Section Starts Here =============-->
<section class="billing-section padding-top padding-bottom">
    <div class="container">
        <div class="section-header">
            <h2 class="title">Latest Asked Questions</h2>
            <p>Explore the latest questions and answers asked top developers.</p>
        </div>
        <div class="row justify-content-center mb-30-none">
            <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

            $args = array(
                'post_type'=>'post',
                'posts_per_page' => 5,
                'paged' => $paged,
            );

            $loop = new WP_Query( $args );
            if ( $loop->have_posts() ) {
            while ( $loop->have_posts() ) : $loop->the_post();
                ?>

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
                                    <?php echo get_avatar(get_the_author_meta('ID'), '85'); ?>
                                </a>
                            </div>
                            <div class="content">
                                <h5 class="subtitle">
                                    <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
                                        <?php
                                        printf(
                                        /* translators: %s: Author name. */
                                            esc_html__('By %s', 'twentytwentyone'),
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

            <?php endwhile;
                $total_pages = $loop->max_num_pages;

                if ($total_pages > 1){

                    $current_page = max(1, get_query_var('paged'));

                    echo paginate_links(array(
                        'base' => get_pagenum_link(1) . '%_%',
                        'format' => '/page/%#%',
                        'current' => $current_page,
                        'total' => $total_pages,
                        'prev_text'    => __('< Previous'),
                        'next_text'    => __('Next >'),
                    ));
                }
            }
            wp_reset_postdata();
            ?>
        </div>
    </div>
</section>
<!--============= Billing Section Ends Here =============-->
<?php get_footer(); ?>
