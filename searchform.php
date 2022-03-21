<?php
/**
 * The searchform.php template.
 *
 * Used any time that get_search_form() is called.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

/*
 * Generate a unique ID for each form and a string containing an aria-label
 * if one was passed to get_search_form() in the args array.
 */
?>

<form class="search-form round" method="get" class="search-form" action="<?php echo home_url();?>">
    <input type="text" name="s"  autocomplete="off" placeholder="Start typing your search…">
    <button type="submit"><i class="flaticon-search"></i> <span class="d-none d-sm-inline-block">Search</span></button>
</form>

