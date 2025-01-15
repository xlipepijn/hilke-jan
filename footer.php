<?php
/**
 * Third party plugins that hijack the theme will call wp_footer() to get the footer template.
 * We use this to end our output buffer (started in header.php) and render into the view/page-plugin.twig template.
 *
 * If you're not using a plugin that requries this behavior (ones that do include Events Calendar Pro and
 * WooCommerce) you can delete this file and header.php
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.1
 */

$templates = array( 'footer.twig' );
$context['emailaddress'] = carbon_get_theme_option( 'email_address' );
$context['linkedinlink'] = carbon_get_theme_option( 'linkedin_link' );
Timber::render( $templates, $context );
