<?php

/* Styles and Scripts */
function navbar(){
    wp_enqueue_script( 'navbar-js', get_template_directory_uri() . '/scripts/navbar.js', array(), false, array('strategy'  => 'defer', ));
    wp_enqueue_style( 'navbar-css', get_template_directory_uri() . '/navbar.css' );
}

function styles(){
    wp_enqueue_style( 'normalize', get_template_directory_uri() . '/normalize.css' );
    wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'teams', get_template_directory_uri() . '/team.css' );
    wp_enqueue_style( 'player', get_template_directory_uri() . '/player.css' );
    wp_enqueue_style( 'news', get_template_directory_uri() . '/news.css');
    wp_enqueue_style( 'forms-cf7', get_template_directory_uri() . '/forms_cf7.css' );
}

add_action('wp_enqueue_scripts', 'styles');
add_action('wp_enqueue_scripts', 'navbar');

/* Menu */
require_once('navwalker.php');

function register_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Hauptmenü' )
     )
   );
 }

 add_action( 'init', 'register_menus' );

 /* Theme */
 add_theme_support( 'post-thumbnails' );