<?php get_header(); ?>



<!--============= Banner Section Starts Here =============-->
<div class="hero-section bg_img style-two" data-background="<?php echo get_template_directory_uri(); ?>/assets/images/banner/banner-2.jpg">
    <div class="container">
        <div class="cate-header cl-white">
            <h1 class="cate-title" title="<?php ECHO the_title();?>">
                <?php the_title();?>
            </h1>
            <div class="cate-meta">
                <div class="left">
                    <span>
                        <?php twenty_twenty_one_posted_on();?>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============= Banner Section Ends Here =============-->

<!--============= Category Section Starts Here =============-->
<section class="category-section padding-bottom mt--160 pos-rel">
    <div class="container">
        <div class="category-single-wrapper">
            <div class="single-item">
                <?php the_content();?>
            </div>
        </div>
    </div>
</section>
<!--============= Category Section Ends Here =============-->

<section class="category-section padding-bottom mt--160 pos-rel default-max-width">
    <div class="container">
        <div class="category-single-wrapper">
            <div class="single-item">
                <?php twenty_twenty_one_entry_meta_footer(); ?>
            </div>
        </div>
    </div>

</section><!-- .entry-footer -->
<?php get_footer(); ?>
