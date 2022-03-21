<?php get_header(); ?>
<!--============= Banner Section Ends Here =============-->
<section class="banner-2 bg_img"
         data-background="<?php echo get_template_directory_uri(); ?>/assets/images/banner/banner-2.jpg">
    <div class="container">
        <div class="banner-content-2">
            <h1 class="title cl-white">Latest Questions  <?php
                printf(
                    esc_html__( 'By %s', 'twentytwentyone' ),
                    get_the_author()
                );
                ?></h1>
            <p class="cl-white">Explore the latest questions and answers asked by  <?php
                printf(
                    esc_html__( 'By %s', 'twentytwentyone' ),
                    get_the_author()
                );
                ?>.</p>
        </div>
    </div>
</section>
<!--============= Banner Section Ends Here =============-->


<!--============= Billing Section Starts Here =============-->
<section class="billing-section padding-bottom padding-top">
    <div class="container">

        <div class="row justify-content-center mb-30-none">

            <?php while ( have_posts() ) : the_post(); ?>
                <div class="col-12">
                    <div class="cate-single-item">
                        <h3 class="title" title="<?php the_title(); ?>">
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
                                <h5 class="subtitle" title="<?php the_title(); ?>">
                                    <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) );?>">
                                        <?php
                                        printf(
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

        </div>
    </div>
</section>
<!--============= Billing Section Ends Here =============-->
<?php get_footer(); ?>
