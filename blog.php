<?php get_header();?>

<!--============= Banner Section Starts Here =============-->
<section class="banner-2 bg_img" data-background="<?php echo get_template_directory_uri(); ?>/assets/images/banner/banner-2.jpg">
    <div class="container">
        <div class="banner-content-2">
            <h1 class="title cl-white">
                <?php twentytwenty_site_logo(); ?>
            </h1>
            <p class=" cl-white">
                <?php twentytwenty_site_description(); ?>
            </p>
            <?php echo get_search_form();?>
        </div>
    </div>
</section>
<!--============= Banner Section Ends Here =============-->


<!--============= How Section Two Starts Here =============-->
<div class="how-search-section padding-bottom mt--93">
    <div class="container">
        <div class="row mx-lg-0 mb-lg-0 mb--30 justify-content-center">
            <div class="col-sm-10 col-md-6 col-lg-4 p-lg-0">
                <div class="how-item-2">
                    <div class="thumb">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/how/how01.png" alt="how">
                    </div>
                    <div class="content">
                        <h4 class="title"><a href="#0">Submit a question</a></h4>
                        <p>Submit a new question to our website</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-10 col-md-6 col-lg-4 p-lg-0">
                <div class="how-item-2 shadow-style">
                    <div class="thumb">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/how/how02.png" alt="how">
                    </div>
                    <div class="content">
                        <h4 class="title"><a href="#0">Questions</a></h4>
                        <p>Find answers to your question </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-10 col-md-6 col-lg-4 p-lg-0">
                <div class="how-item-2">
                    <div class="thumb">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/how/how03.png" alt="how">
                    </div>
                    <div class="content">
                        <h4 class="title"><a href="#0">Community</a></h4>
                        <p>Login or Signup to access your previous questions</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============= How Section Two Ends Here =============-->


<!--============= Billing Section Starts Here =============-->
<section class="billing-section padding-bottom">
    <div class="container">
        <div class="section-header">
            <h2 class="title">Latest Questions</h2>
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

                                    'order' => 'DESC',
                                    'paged'          => $paged,
                                    'posts_per_page' => 10,
                                );
                                $loop = new WP_Query($args);
                                while ($loop->have_posts()) :
                                $loop->the_post();
            ?>




            <div class="col-12">


                <div class="cate-single-item">
                    <h3 class="title">
                        <a href="<?php the_permalink();?>">
                            <?php the_title();?>
                        </a>
                    </h3>
                    <p>
                        <?php the_excerpt();?>
                    </p>
                    <div class="cate-author">
                        <div class="thumb">
                            <a href="#0"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/cate/01.png" alt="cate"></a>
                        </div>
                        <div class="content">
                            <h5 class="subtitle"><a href="#0">Ross Fox</a></h5>
                            <span>October 22,2020</span>
                        </div>
                    </div>
                </div>

            </div>
            <?php endwhile;?>

            <?php echo get_pagination($loop);?>

        </div>
    </div>
</section>
<!--============= Billing Section Ends Here =============-->

<?php get_footer();?>
