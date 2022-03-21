<?php

/**
 * A custom WordPress comment walker class to implement the Bootstrap 4 Media object in wordpress comment list.
 *
 * @package     WP Bootstrap 4 Comment Walker
 * @version     1.0.0
 * @author      Aymene Bourafai <bourafai.a@gmail.com> <www.aymenebourafai.com>
 * @license     http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link        https://github.com/bourafai/wp-bootstrap-4-comment-walker
 * @link        https://v4-alpha.getbootstrap.com/layout/media-object/
 */

class Bootstrap_Comment_Walker extends Walker_Comment
{
    /**
     * Output a comment in the HTML5 format.
     *
     * @param object $comment the comments list.
     * @param int $depth Depth of comments.
     * @param array $args An array of arguments.
     * @see wp_list_comments()
     *
     * @since 1.0.0
     *
     */
    protected function html5_comment($comment, $depth, $args)
    {
        $tag = ($args['style'] === 'div') ? 'div' : 'li';
        ?>

        <section class="category-section padding-top  padding-bottom mt--160 pos-rel"
                 id="div-comment-<?php comment_ID(); ?>">
            <div class="container">
                <div class="category-single-wrapper">
                    <div class="single-item">



                        <div class="card-block warning-color">
                            <?php if ('0' == $comment->comment_approved) : ?>
                                <p class="card-text comment-awaiting-moderation label label-info text-muted small"><?php _e('Your comment is awaiting moderation.'); ?></p>
                            <?php endif; ?>

                            <div class="comment-content card-text">
                                <?php comment_text(); ?>
                            </div><!-- .comment-content -->

                        </div>

                        <br>

                        <div class="hoverable" style="margin-top:10px;">
                            <div class="flex-center">
                                <?php if ($args['avatar_size'] != 0): ?>
                                    <a href="<?php echo get_comment_author_url(); ?>" class="media-object float-left">
                                        <?php echo get_avatar($comment, $args['avatar_size'], 'mm', '', array('class' => "comment_avatar rounded-circle")); ?>
                                    </a>
                                <?php endif; ?>
                                <h4 class="media-heading " style="margin-left:60px;"><?php echo get_comment_author_link() ?></h4>
                            </div>
                        </div>

                    </div>
                </div>
        </section>


        <?php
    }
} ?>
