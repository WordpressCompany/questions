<?php /* Template Name: Support Template */ ?>
<?php get_header(); ?>

<!--============= Banner Section Starts Here =============-->
<div class="hero-section bg_img style-two" data-background="<?php echo get_template_directory_uri(); ?>/assets/images/banner/banner-2.jpg">
    <div class="container">
        <div class="cate-header cl-white">
            <h1 class="cate-title" title="<?php ECHO the_title();?>">
               Get Paid Support
            </h1>
            <div class="cate-meta">
                <div class="left">
                    Get paid support from our dedicated team of developers.
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
             <p>
                 <?php the_content();?>
             </p>
            </div>
            <div class="single-item">
                <div id="smart-button-container">
                    <div style="text-align: center;">
                        <div id="paypal-button-container"></div>
                    </div>
                </div>
                <script src="https://www.paypal.com/sdk/js?client-id=AWUm3XerAfz52ZWyR_VNd_njDbSkuLKRoeKONLpE2e4mhLeY-67lh33oiYO04zW6e_mFB1mDF7sL5N5n&enable-funding=venmo&currency=USD" data-sdk-integration-source="button-factory"></script>
                <script>
                    function initPayPalButton() {
                        paypal.Buttons({
                            style: {
                                shape: 'rect',
                                color: 'gold',
                                layout: 'vertical',
                                label: 'paypal',

                            },

                            createOrder: function(data, actions) {
                                return actions.order.create({
                                    purchase_units: [{"description":"Development Support","amount":{"currency_code":"USD","value":5}}]
                                });
                            },

                            onApprove: function(data, actions) {
                                return actions.order.capture().then(function(details) {
                                    alert('Transaction completed by ' + details.payer.name.given_name + '!');
                                });
                            },

                            onError: function(err) {
                                console.log(err);
                            }
                        }).render('#paypal-button-container');
                    }
                    initPayPalButton();
                </script>
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
