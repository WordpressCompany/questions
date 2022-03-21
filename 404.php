<?php
get_header()
?>

<!--============= Banner Section Starts Here =============-->
<div class="hero-section bg_img style-two" data-background="<?php echo get_template_directory_uri(); ?>/assets/images/banner/banner-2.jpg">
    <div class="container">
        <div class="cate-header cl-white">
            <h1 class="cate-title text-center" title="<?php ECHO the_title();?>">
                404
            </h1>
            <p class="text-center">
                Page could not be found
            </p>
        </div>
    </div>
</div>
<!--============= Banner Section Ends Here =============-->


<!--============= Category Section Starts Here =============-->
<section class="category-section padding-bottom mt--160 pos-rel">
    <div class="container">
        <div class="category-single-wrapper">
            <div class="single-item">
                <p>
                    We are really sorry the page that you are searching could not be found.
                </p>
                <p>
                   There's not much left here for you ;-)
                </p>
                <div>
                    <a href="#" class="btn btn-group-lg btn-danger"> Get back </a> or visit our <a href="#" class="btn btn-group-lg btn-danger">home page</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--============= Category Section Ends Here =============-->
<?php
get_footer();
?>
