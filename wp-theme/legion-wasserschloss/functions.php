<?php

function navbar(){
    wp_enqueue_script( 'navbar-js', get_template_directory_uri() . '/scripts/navbar.js');
    wp_enqueue_style( 'navbar-css', get_template_directory_uri() . '/navbar.css' );
}

function styles(){
    wp_enqueue_style( 'normalize', get_template_directory_uri() . '/normalize.css' );
    wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css' );
}

add_action('wp_enqueue_scripts', 'styles');
add_action('wp_enqueue_scripts', 'navbar');