<?php
add_filter( 'use_block_editor_for_post', '__return_false' );
/**
 * Displays the site logo, either text or image.
 *
 * @param array   $args Arguments for displaying the site logo either as an image or text.
 * @param bool    $echo Echo or return the HTML.
 * @return string Compiled HTML based on our arguments.
 */
function twentytwenty_site_logo( $args = array(), $echo = true ) {
    $logo       = get_custom_logo();
    $site_title = get_bloginfo( 'name' );
    $contents   = '';
    $classname  = '';

    $defaults = array(
        'logo'        => '%1$s<span class="screen-reader-text">%2$s</span>',
        'logo_class'  => 'site-logo',
        'title'       => '<a style="color:white" href="%1$s">%2$s</a>',
        'title_class' => 'site-title',
        'home_wrap'   => '%2$s',
        'single_wrap' => '<div class="%1$s faux-heading">%2$s</div>',
        'condition'   => ( is_front_page() || is_home() ) && ! is_page(),
    );

    $args = wp_parse_args( $args, $defaults );

    /**
     * Filters the arguments for `twentytwenty_site_logo()`.
     *
     * @param array  $args     Parsed arguments.
     * @param array  $defaults Function's default arguments.
     */
    $args = apply_filters( 'twentytwenty_site_logo_args', $args, $defaults );

    if ( has_custom_logo() ) {
        $contents  = sprintf( $args['logo'], $logo, esc_html( $site_title ) );
        $classname = $args['logo_class'];
    } else {
        $contents  = sprintf( $args['title'], esc_url( get_home_url( null, '/' ) ), esc_html( $site_title ) );
        $classname = $args['title_class'];
    }

    $wrap = $args['condition'] ? 'home_wrap' : 'single_wrap';

    $html = sprintf( $args[ $wrap ], $classname, $contents );

    /**
     * Filters the arguments for `twentytwenty_site_logo()`.
     *
     * @param string $html      Compiled HTML based on our arguments.
     * @param array  $args      Parsed arguments.
     * @param string $classname Class name based on current view, home or single.
     * @param string $contents  HTML for site title or logo.
     */
    $html = apply_filters( 'twentytwenty_site_logo', $html, $args, $classname, $contents );

    if ( ! $echo ) {
        return $html;
    }

    echo $html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

}
/**
 * Displays the site description.
 *
 * @param bool $echo Echo or return the html.
 * @return string The HTML to display.
 */
function twentytwenty_site_description( $echo = true ) {
    $description = get_bloginfo( 'description' );

    if ( ! $description ) {
        return;
    }

    $wrapper = '%s';

    $html = sprintf( $wrapper, esc_html( $description ) );

    /**
     * Filters the HTML for the site description.
     *
     * @since Twenty Twenty 1.0
     *
     * @param string $html         The HTML to display.
     * @param string $description  Site description via `bloginfo()`.
     * @param string $wrapper      The format used in case you want to reuse it in a `sprintf()`.
     */
    $html = apply_filters( 'twentytwenty_site_description', $html, $description, $wrapper );

    if ( ! $echo ) {
        return $html;
    }

    echo $html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}


function knowledgecenter_the_posts_pagination() {
    $args = array(
        'show_all'           => true,
        'end_size'           => 1,
        'mid_size'           => 1,
        'prev_next'          => true,
        'prev_text'          => esc_attr__( 'Previous', 'knowledgecenter' ),
        'next_text'          => esc_attr__( 'Next', 'knowledgecenter' ),
        'add_args'           => false,
        'add_fragment'       => '',
        'screen_reader_text' => esc_attr__( 'Posts navigation', 'knowledgecenter' ),
    );
    echo '<div class="block mt-6">';
    the_posts_pagination( $args );
    echo '</div>';
}

function get_pagination($the_query)
{
    global $paged;
    $total_pages = $the_query->max_num_pages;
    if ($total_pages > 1) {
        ob_start();

        $args = array(
            'base' => get_pagenum_link(1) . '%_%',
            'format' => 'page/%#%',
            'current' => $paged,
            'total' => $total_pages,
            'show_all'           => false,
            'end_size'           => 1,
            'mid_size'           => 2,
            'prev_next'          => true,
            'prev_text'          => __('« Previous'),
            'next_text'          => __('Next »'),
            'type'               => 'plain',
            'add_args'           => false,
            'add_fragment'       => '',
            'before_page_number' => '',
            'after_page_number'  => ''
        );

        echo paginate_links($args);
        return ob_get_clean();
    }
    return null;
}

if ( ! function_exists( 'twenty_twenty_one_entry_meta_footer' ) ) {
    /**
     * Prints HTML with meta information for the categories, tags and comments.
     * Footer entry meta is displayed differently in archives and single posts.
     *
     * @since Twenty Twenty-One 1.0
     *
     * @return void
     */
    function twenty_twenty_one_entry_meta_footer() {

        // Early exit if not a post.
        if ( 'post' !== get_post_type() ) {
            return;
        }

        // Hide meta information on pages.
        if ( ! is_single() ) {

            if ( is_sticky() ) {
                echo '<p>' . esc_html_x( 'Featured post', 'Label for sticky posts', 'twentytwentyone' ) . '</p>';
            }

            $post_format = get_post_format();
            if ( 'aside' === $post_format || 'status' === $post_format ) {
                echo '<p><a href="' . esc_url( get_permalink() ) . '">' . twenty_twenty_one_continue_reading_text() . '</a></p>'; // phpcs:ignore WordPress.Security.EscapeOutput
            }

            // Posted on.
            twenty_twenty_one_posted_on();

            // Edit post link.
            edit_post_link(
                sprintf(
                /* translators: %s: Name of current post. Only visible to screen readers. */
                    esc_html__( 'Edit %s', 'twentytwentyone' ),
                    '<span class="screen-reader-text">' . get_the_title() . '</span>'
                ),
                '<span class="edit-link">',
                '</span><br>'
            );

            if ( has_category() || has_tag() ) {

                echo '<div class="post-taxonomies">';

                /* translators: Used between list items, there is a space after the comma. */
                $categories_list = get_the_category_list( __( ', ', 'twentytwentyone' ) );
                if ( $categories_list ) {
                    printf(
                    /* translators: %s: List of categories. */
                        '<span class="cat-links">' . esc_html__( 'Categorized as %s', 'twentytwentyone' ) . ' </span>',
                        $categories_list // phpcs:ignore WordPress.Security.EscapeOutput
                    );
                }

                /* translators: Used between list items, there is a space after the comma. */
                $tags_list = get_the_tag_list( '', __( ', ', 'twentytwentyone' ) );
                if ( $tags_list ) {
                    printf(
                    /* translators: %s: List of tags. */
                        '<span class="tags-links">' . esc_html__( 'Tagged %s', 'twentytwentyone' ) . '</span>',
                        $tags_list // phpcs:ignore WordPress.Security.EscapeOutput
                    );
                }
                echo '</div>';
            }
        } else {

            echo '<div class="posted-by">';
            // Posted on.
            twenty_twenty_one_posted_on();
            // Posted by.
            twenty_twenty_one_posted_by();
            // Edit post link.
            edit_post_link(
                sprintf(
                /* translators: %s: Name of current post. Only visible to screen readers. */
                    esc_html__( 'Edit %s', 'twentytwentyone' ),
                    '<span class="screen-reader-text">' . get_the_title() . '</span>'
                ),
                '<span class="edit-link">',
                '</span>'
            );
            echo '</div>';

            if ( has_category() || has_tag() ) {

                echo '<div class="post-taxonomies">';

                /* translators: Used between list items, there is a space after the comma. */
                $categories_list = get_the_category_list( __( ', ', 'twentytwentyone' ) );
                if ( $categories_list ) {
                    printf(
                    /* translators: %s: List of categories. */
                        '<span class="cat-links">' . esc_html__( 'Categorized as %s', 'twentytwentyone' ) . ' </span>',
                        $categories_list // phpcs:ignore WordPress.Security.EscapeOutput
                    );
                }

                /* translators: Used between list items, there is a space after the comma. */
                $tags_list = get_the_tag_list( '', __( ', ', 'twentytwentyone' ) );
                if ( $tags_list ) {
                    printf(
                    /* translators: %s: List of tags. */
                        '<span class="tags-links">' . esc_html__( 'Tagged %s', 'twentytwentyone' ) . '</span>',
                        $tags_list // phpcs:ignore WordPress.Security.EscapeOutput
                    );
                }
                echo '</div>';
            }
        }
    }
}
if ( ! function_exists( 'twenty_twenty_one_posted_on' ) ) {
    /**
     * Prints HTML with meta information for the current post-date/time.
     *
     * @since Twenty Twenty-One 1.0
     *
     * @return void
     */
    function twenty_twenty_one_posted_on() {
        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

        $time_string = sprintf(
            $time_string,
            esc_attr( get_the_date( DATE_W3C ) ),
            esc_html( get_the_date() )
        );
        echo '<span class="posted-on">';
        printf(
        /* translators: %s: Publish date. */
            esc_html__( 'Published %s', 'twentytwentyone' ),
            $time_string // phpcs:ignore WordPress.Security.EscapeOutput
        );
        echo '</span>';
    }
}

add_theme_support('title-tag');


if ( ! function_exists( 'twenty_twenty_one_posted_by' ) ) {
    /**
     * Prints HTML with meta information about theme author.
     *
     * @since Twenty Twenty-One 1.0
     *
     * @return void
     */
    function twenty_twenty_one_posted_by() {
        if ( ! get_the_author_meta( 'description' ) && post_type_supports( get_post_type(), 'author' ) ) {
            echo '<span class="byline">';
            printf(
            /* translators: %s: Author name. */
                esc_html__( 'By %s', 'twentytwentyone' ),
                '<a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" rel="author">' . esc_html( get_the_author() ) . '</a>'
            );
            echo '</span>';
        }
    }
}

function wpb_change_search_url() {
    if (  is_search() && ! empty( $_GET['s'] ) ) {
        wp_redirect( home_url( "/search/" ) . urlencode( get_query_var( 's' ) ) );
        exit();
    }
}
add_action( 'template_redirect', 'wpb_change_search_url' );



/**
 * Register our sidebars and widgetized areas.
 *
 */
function arphabet_widgets_init() {

    register_sidebar( array(
        'name'          => 'Footer Left',
        'id'            => 'footer_left',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="rounded">',
        'after_title'   => '</h2>',
    ) );

}
add_action( 'widgets_init', 'arphabet_widgets_init' );


function custom_theme_setup() {
    add_theme_support( 'html5', array( 'comment-list' ) );
}
add_action( 'after_setup_theme', 'custom_theme_setup' );


//// The theme update logic
require 'update/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
    'https://github.com/lzomedia/questions/',
    __FILE__,
    'questions'
);

//Set the branch that contains the stable release.
$myUpdateChecker->setBranch('master');
//Optional: If you're using a private repository, specify the access token like this:
$myUpdateChecker->getVcsApi()->enableReleaseAssets();



//recommend plugins
require_once get_template_directory() . '/recommend/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'questions_register_required_plugins' );
function questions_register_required_plugins() {
    /*
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(

        array(
            'name'        => 'AMP Wordpress',
            'slug'        => 'amp',
        ),
        array(
            'name'        => 'Flexible SSL for CloudFlare',
            'slug'        => 'cloudflare-flexible-ssl',
        ),
        array(
            'name'        => 'Jet Pack',
            'slug'        => 'jetpack',
        ),
        array(
            'name'        => 'LiteSpeed Cache',
            'slug'        => 'litespeed-cache',
        ),
        array(
            'name'        => 'Schema & Structured Data for WP & AMP',
            'slug'        => 'schema-and-structured-data-for-wp',
        ),
        array(
            'name'        => 'Schema & Structured Data for WP & AMP',
            'slug'        => 'schema-and-structured-data-for-wp',
        ),
        array(
            'name'        => 'Site Kit by Google',
            'slug'        => 'google-site-kit',
        ),
        array(
            'name'        => 'User Submitted Posts',
            'slug'        => 'user-submitted-posts',
        ),

        array(
            'name'         => 'RSS WordPress Plugin', // The plugin name.
            'slug'         => 'rss.wordpress.plugin', // The plugin slug (typically the folder name).
            'source'       => 'https://s3.amazonaws.com/tgm/tgm-new-media-plugin.zip', // The plugin source.
            'required'     => true,
            'external_url' => 'https://github.com/lzomedia/rss.wordpress.plugin', // If set, overrides default API URL and points to an external URL.
        ),

    );

    /*
     * Array of configuration settings. Amend each line as needed.
     *
     * Only uncomment the strings in the config array if you want to customize the strings.
     */
    $config = array(
        'id'           => 'questions',                 // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      // Default absolute path to bundled plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'parent_slug'  => 'themes.php',            // Parent menu slug.
        'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => 'Our theme requires yo install the following plugins',                      // Message to output right before the plugins table.
    );

    tgmpa( $plugins, $config );
}



