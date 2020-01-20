<?php

//Ajouter la prise en charge des images mises en avant
add_theme_support( 'post-thumbnails');

//Ajouter automatiquement le titre du site dans l'en-tête du site
add_theme_support('title-tag');

//On déclarer les emplacements de menus
register_nav_menus( array(
    'main' => 'Menu Principal',
    'footer' => 'Bas de page',
) );

register_sidebar( array(
    'id' => 'blog-sidebar',
    'name' => 'Blog',
) );

//Definir la taille des images mises en avant
set_post_thumbnail_size(2000, 400, true);

//Définir d'autres tailles d'images
add_image_size( 'products, 800, 600, false' );
add_image_size( 'square', 256, 256, false );

//On crée  la fonction qui ajoutera automatiqsuement le fichier "style.css" dans le <head>
function mytheme_add_style(){
    wp_enqueue_style('mytheme-style', get_stylesheet_uri() );
}

add_action( 'wp_enqueue_scripts', 'mytheme_add_style' );

function mytheme_register_assets() {

    //Déclarer  jQuery
    wp_deregister_script( 'jquery' ); //On annule l'inscription du jQuery de WP
    wp_enqueue_script(
        'jquery',
        'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js',
        false,
        '3.3.1',
        true
    );

    //Déclarer le JS
    wp_enqueue_script(
        'mytheme',
        get_template_directory_uri() . '/assets/js/bootstrap.min.js',
        array( 'jquery'),
        '1.0',
        true
    );

    //Déclarer style.css à la racine du théme
    wp_enqueue_style(
        'mytheme',
        get_stylesheet_uri(),
        array(),
        '1.0'
    );

    //Déclarer un autre fichier CSS
    wp_enqueue_style(
        'capitaine',
        get_template_directory_uri() . '/asset/css/bootstrap.min.css',
        array(),
        '1.0'
    );
}
add_action( 'wp_enqueue_scripts', 'mytheme_register_assets');

function mytheme_register_post_types(){
    //La déclaration de nos custom post types et taxonomies ira ici

    //CPT Recettes
    $labels = array(
        'name' => 'Recettes',
        'all_items' => 'Toutes les recette', //affiché dans le sous menu
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
        'supports' => array ('title', 'editor', 'thumbnail', 'comments'),
        'menu_position' => 5,
        'menu_icon' => 'dashicons-admin-customizer',
    );
    register_post_type( 'recettes', $args);

    // Déclaration de la Taxonomie
    $labels = array(
        'name' => 'Type de recettes',
        'new_item_name' => 'Nom du nouveau Recette',
    	'parent_item' => 'Type de recette parent',
    );
    
    $args = array( 
        'labels' => $labels,
        'public' => true, 
        'show_in_rest' => true,
        'hierarchical' => true, 
    );

    register_taxonomy('type-recettes', 'recettes', $args);
}
add_action( 'init', 'mytheme_register_post_types'); // le hook init lance la fonction

