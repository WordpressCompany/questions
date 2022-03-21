
<div class="container padding-bottom">
  <div class="col-lg-12">
      <h2 class="text-center">
          Answers
      </h2>
  </div>
</div>

<?php
/**
 * @package WordPress
 * @subpackage Theme_Compat
 * @deprecated 3.0.0
 *
 * This file is here for backward compatibility with old themes and will be removed in a future version
 */


// Do not delete these lines.
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && 'comments.php' === basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die( 'Please do not load this page directly. Thanks!' );
}

if ( post_password_required() ) { ?>
    <p class="nocomments"><?php _e( 'This post is password protected. Enter the password to view comments.' ); ?></p>
    <?php
    return;
}
?>
<!--============= Category Section Starts Here =============-->
<?php if ( have_comments() ) : ?>


    <?php
    require_once('classes/commentsClass.php');

    wp_list_comments( array(
        'style'         => 'div',
        'max_depth'     => 4,
        'short_ping'    => true,
        'avatar_size'   => '50',
        'walker'        => new Bootstrap_Comment_Walker(),
    ) );
    ?>

<?php endif; ?>
<!-- You can start editing here. -->
<section class="category-section padding-top  padding-bottom mt--160 pos-rel">
    <div class="container">
        <div class="category-single-wrapper">
            <div class="single-item">
                <?php comment_form(); ?>
            </div>
        </div>
    </div>
</section>


