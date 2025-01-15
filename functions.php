<?php
/**
 * Timber starter-theme
 * https://github.com/timber/starter-theme
 */

// Carbon Fields depedencies
use Carbon_Fields\Container;
use Carbon_Fields\Field;

// Load Composer dependencies.
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/inc/StarterSite.php';
require_once __DIR__ . '/inc/CarbonFields.php';
require_once __DIR__ . '/inc/RemovePosts.php';
require_once __DIR__ . '/inc/timber-integration-carbon-fields/lib/CarbonFieldsIntegration.php';


Timber\Timber::init();

// Sets the directories (inside your theme) to find .twig files.
Timber::$dirname = [ 'templates', 'views' ];

new StarterSite();

add_filter('timber/integrations', function (array $integrations): array {
    $integrations[] = new Timber\Integrations\CarbonFields\CarbonFieldsIntegration();
    return $integrations;
});

add_action( 'after_setup_theme', 'crb_load' );
function crb_load() {
    require_once( 'vendor/autoload.php' );
    \Carbon_Fields\Carbon_Fields::boot();
}

// Remove wysiwyg from page post type
add_action('init', 'init_remove_support',100);
function init_remove_support(){
    $post_type = 'page';
    remove_post_type_support( $post_type, 'editor');
}