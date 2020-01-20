<?php
add_action( 'pre_get_posts', 'add_header_origin' );
function add_header_origin() {
	if (is_feed()){
		header( 'Access-Control-Allow-Origin: *' );
	}
}            
// Ajouter la prise en charge des images mises en avant
add_theme_support( 'post-thumbnails' );
// Définir la taille des images mises en avant
set_post_thumbnail_size( 2000, 400, true );

// Définir d'autres tailles d'images
add_image_size( 'products', 800, 600, false );
add_image_size( 'square', 256, 256, false );

// Ajouter automatiquement le titre du site dans l'en-tête du site
add_theme_support( 'title-tag' );

//On déclarer les emplacements de menus
register_nav_menus( array(
    'main' => 'Menu Principal',
    'footer' => 'Bas de page',
) );

register_sidebar( array(
    'id' => 'blog-sidebar',
    'name' => 'Blog',
    'before_widget'  => '<div class="site__sidebar__widget %2$s">',
    'after_widget'  => '</div>',
    'before_title' => '<p class="site__sidebar__widget__title">',
    'after_title' => '</p>',
) );

function add_additional_class_on_li($classes, $item, $args) {
    if(isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

function add_menu_link_class( $atts, $item, $args ) {
    if (property_exists($args, 'link_class')) {
        $atts['class'] = $args->link_class;
    }
    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_menu_link_class', 1, 3 );

function mytheme_register_assets() {

    // Déclarer jQuery
    wp_deregister_script( 'jquery' ); // On annule l'inscription du jQuery de WP
    wp_enqueue_script( // On déclare une version plus moderne
        'jquery',
        'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js',
        false,
        '3.3.1',
        true
    );

    // Déclarer le JS
    wp_enqueue_script(
        'mytheme',
        get_template_directory_uri() . '/asset/js/bootstrap.js',
        array( 'jquery' ),
        '1.0',
        true
    );

    wp_enqueue_script(
        'portfolio',
        get_template_directory_uri() . '/asset/js/main.js',
        array( 'jquery' ),
        '1.0',
        true
    );

    // Déclarer style.css à la racine du thème
    wp_enqueue_style(
        'mytheme',
        get_stylesheet_uri(),
        array(),
        '1.0'
    );

    // Déclarer un autre fichier CSS
    wp_enqueue_style(
        'bootstrap',
        get_template_directory_uri() . '/asset/css/bootstrap.css',
        array(),
        '1.0'
    );
// Déclarer un autre fichier CSS
    wp_enqueue_style(
        'font-awesome',
        'https://use.fontawesome.com/releases/v5.12.0/css/all.css',
        array(),
        '1.0'
    );
}
add_action( 'wp_enqueue_scripts', 'mytheme_register_assets' );

function mytheme_register_post_types() {

    // CPT Recettes
    $labels = array(
        'name' => 'Recettes',
        'all_items' => 'Toutes les recette',  // affiché dans le sous menu
        'singular_name' => 'Recette',
        'add_new_item' => 'Ajouter une recette',
        'edit_item' => 'Modifier la recette',
        'menu_name' => 'Recettes'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_in_rest' => true,
        'has_archive' => true,
        'supports' => array( 'title', 'editor','thumbnail','comments' ),
        'menu_position' => 5,
        'menu_icon' => 'dashicons-admin-customizer',
    );

    register_post_type( 'recettes', $args );

    // Déclaration de la Taxonomie
    $labels = array(
        'name' => 'Type de recette',
        'new_item_name' => 'Nom de la nouvelle recette',
        'parent_item' => 'Type de recette parent',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_in_rest' => true,
        'hierarchical' => true,
    );

    register_taxonomy( 'type-recette', 'recettes', $args );
}
add_action( 'init', 'mytheme_register_post_types' ); // Le hook init lance la fonction