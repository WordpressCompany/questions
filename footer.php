<!--============= Have Questions Section Starts Here =============-->
<div class="have-questions-section mb--70--145">
    <div class="container">
        <div class="have-question-wrapper">
            <div class="row">
                <div class="col-lg-8">
                    <div class="have-question-content">
                        <h2 class="title">Still Have Questions?</h2>
                        <br>
                        <p>Our dedicated development team is here for you!</p>
                        <p>
                            We can help you find answers to your question for as low as 5$.
                        </p>
                        <a href="<?php echo get_home_url( null, '/support' );?>" class="custom-button">Contact Us</a>
                    </div>
                </div>
                <div class="right-thumb d-none d-lg-block">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/faq/have-questions.png" alt="faq">
                </div>
            </div>
        </div>
    </div>
</div>
<!--============= Have Questions Section Ends Here =============-->

<!--============= Footer Section Starts Here =============-->
<footer class="footer-section pt-70-145">
    <div class="dot-slider bg_img" data-background="<?php echo get_template_directory_uri(); ?>/assets/css/img/footer-dots.png"></div>
    <div class="container">
        <div class="footer-top cl-white padding-bottom padding-top">
            <div class="row mb--50 justify-content-between">
                <div class="col-sm-8 col-lg-3">
                    <?php if ( is_active_sidebar( 'footer_left' ) ) : ?>
                        <div id="primary-sidebar" class="footer-widget widget-about" role="complementary">
                            <?php dynamic_sidebar( 'footer_left' ); ?>
                            <a target="_blank" href="<?php echo get_home_url( null, '/wp-sitemap.xml' );?>">Sitemap</a> |
                            <a target="_blank" href="https://lzomedia.com/privacy/">Privacy</a>
                        </div><!-- #primary-sidebar -->
                    <?php endif; ?>
                </div>
                <div class="col-sm-8 col-md-4 col-lg-3">
                    <div class="footer-widget widget-link">
                        <h5 class="title">Partners</h5>
                        <ul>
                            <li>
                                <a target="_blank" href="https://angularquestions.com">Angular Questions</a>
                            </li>
                            <li>
                                <a target="_blank" href="https://askandroidquestions.com">Ask Android Questions</a>
                            </li>
                            <li>
                                <a target="_blank" href="https://askphpquestions.com">Ask PHP Questions</a>
                            </li>
                            <li>
                                <a  target="_blank" href="https://dockerquestions.com">Docker Questions</a>
                            </li>
                            <li>
                                <a target="_blank" href="https://iosquestions.com">Ios Questions</a>
                            </li>
                            <li>
                                <a target="_blank" href="https://laravelquestions.com">Laravel Questions</a>
                            </li>
							  <li>
                                <a target="_blank" href="https://jobdisrupt.com">Job Disrupt</a>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="col-sm-8 col-lg-3">
                    <div class="footer-widget widget-newsletter">
                        <h5 class="title">Partners</h5>
                        <ul>
                            <li>
                                <a target="_blank" href="https://reactquestions.com">React Questions</a>
                            </li>
                            <li>
                                <a target="_blank" href="https://symfonyquestions.com">Symfony Questions</a>
                            </li>
                            <li>
                                <a target="_blank" href="https://windowsquestions.com">Windows Questions</a>
                            </li>
                            <li>
                                <a target="_blank" href="https://slacker.ro">Programming News</a>
                            </li>
                            <li>
                                <a target="_blank" href="https://nippycodes.com">Code Snippets</a>
                            </li>
                            <li>
                                <a target="_blank" href="https://freestuffzy.com">Free Stuff UK</a>
                            </li>
                            <li>
                                <a target="_blank" href="https://play.google.com/store/apps/details?id=app.bmwtutorials.com">Bmw Tutorials App</a>
                            </li>
                            <li>
                                <a target="_blank" href="https://play.google.com/store/apps/details?id=app.freestufzy.com">Free Stuff App</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom cl-white">
            <p class="cl-white">Copyright © 2016 - <?php echo date('Y');?> - Designed by  <a href="https://lzomedia.com">The Web Development Company</a></p>
        </div>
    </div>
</footer>
<!--============= Footer Section Ends Here =============-->
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/merged.min.js"></script>

<?php
if ( is_single() && 'post' == get_post_type() ) {
echo '<script src="//lzomarketing.com/focus/2.js" type="text/javascript" charset="utf-8" async="async"></script>';
}else{
    echo '<script src="//lzomarketing.com/focus/1.js" type="text/javascript" charset="utf-8" async="async"></script>';
}
?>


<style>
    .js .tmce-active .wp-editor-area {
        color:#333;
    }
    .wp-editor-tools{
        display: none;
    }
    div#user-submitted-posts{
        max-width: 100% !important;
    }
    div#user-submitted-posts fieldset input.usp-input{
        width: 100%;
    }

    span, a.page-numbers{
        padding:5px;
        color:#5900ff;
    }
    .single-item img{
        width: 100%;
    }
</style>
</body>

</html>
