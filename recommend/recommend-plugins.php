<?php
require_once('class-tgm-plugin-activation.php');
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
			'source'       => 'https://github.com/lzomedia/rss.wordpress.plugin/archive/refs/heads/master.zip', // The plugin source.
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
