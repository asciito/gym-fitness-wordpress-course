<?php

if ( ! function_exists("gymfitness_menus") ) {
    function gymfitness_menus() {
        register_nav_menus( [
            'menu-principal' => __( 'Menu Principal', 'gymfitness' ),
        ] );
    }
}

add_action('init', 'gymfitness_menus');

if ( ! function_exists("gymfitness_scripts_styles") ) {
    function gymfitness_scripts_styles() {
        /** Normalize CSS */
        wp_enqueue_style(
            'normalize',
            get_template_directory_uri() . '/css/normalize.css',
            [],
            '8.0.1'
        );

        wp_enqueue_style(
            'lightbox',
            get_template_directory_uri() . '/css/lightbox.min.css',
            [],
            '2.11.4'
        );

        /** Internal styles */
        wp_enqueue_style(
            'style',
            get_stylesheet_uri(),
            ['normalize'],
            '1.0.0'
        );

        /** Swiper */
        wp_enqueue_style(
            'swiper',
            'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css',
            [],
            '11.0.5'
        );

        /** Archivos JS */
        wp_enqueue_script(
            'lightbox',
            get_template_directory_uri() . '/js/lightbox.min.js',
            ['jquery'],
            '2.11.4',
            true,
        );

        wp_enqueue_script(
            'swiper',
            'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js',
            [],
            '11.0.5',
            true,
        );

        wp_enqueue_script(
            'anime',
            'https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js',
            [],
            '2.0.2',
            true,
        );

        wp_enqueue_script(
            'scripts',
            get_template_directory_uri() . '/js/scripts.js',
            ['jquery'],
            '1.0.0',
            true,
        );
    }
}

add_action('wp_enqueue_scripts', 'gymfitness_scripts_styles');

if ( ! function_exists('gymfitness_setup') ) {
    function gymfitness_setup() {
        add_theme_support('post-thumbnails');

        add_theme_support('title-tag');
    }
}

add_action('after_setup_theme', 'gymfitness_setup');

if ( ! function_exists(  'gymfitness_widgets') ) {
    function gymfitness_widgets() {
        register_sidebar([
            'name'          => 'Sidebar 1',
            'id'            => 'sidebar_1',
            'before_widget' => '<div class="widget">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="text-center text-primary">',
            'after_title'   => '</h3>',
        ]);
    }
}

add_action( 'widgets_init', 'gymfitness_widgets' );

require_once get_template_directory() . '/includes/widgets.php';

/** Shortcuts **/
function gymfitness_ubicacion_shortcut(){
    the_field('ubicacion');
}
add_shortcode('gymfitness_ubicacion', 'gymfitness_ubicacion_shortcut');