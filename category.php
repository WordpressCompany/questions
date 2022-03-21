<?php
/**
 * The template for displaying Tag pages
 *
 * Used to display archive-type pages for posts in a tag.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header();


?>

<?php

$current_category = get_queried_object();
$category = single_cat_title('', false);
$categoryID = get_cat_ID(single_cat_title('', false));

?>
<?php if (have_posts()) : ?>

    <!--============= Banner Section Starts Here =============-->
    <section class="banner-2 bg_img"
             data-background="<?php echo get_template_directory_uri(); ?>/assets/images/banner/banner-2.jpg">
        <div class="container">
            <div class="banner-content-2">
                <h1 class="title cl-white">
                    <?php
                    /* translators: %s: Tag title. */
                    printf(__('All questions tagged: %s', 'twentytwelve'), '<span>' . single_tag_title('', false) . '</span>');
                    ?>
                </h1>
                <p class=" cl-white">
                    <?php if (tag_description()) : // Show an optional tag description.  ?>
                <div class="archive-meta"><?php echo tag_description(); ?></div>
                <?php endif; ?>
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
            <h2 class="title">Questions tagged <?php single_tag_title();?></h2>
            <p>Explore the latest questions and answers asked by our top developers.</p>
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
                'post_type' => 'post',
                'order' => 'DESC',
                'paged'          => $paged,
                'posts_per_page' => 10,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'category',
                        'field' => 'term_id',
                        'terms' => $current_category->term_id
                    )
                )
            );
            $loop = new WP_Query($args);
            while ($loop->have_posts()) :
                $loop->the_post();
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


    <?php

    endwhile;

    ?>


            <?php echo get_pagination($loop);?>
<?php endif; ?>
        </div>
    </div>
</section>


<?php get_footer(); ?>
