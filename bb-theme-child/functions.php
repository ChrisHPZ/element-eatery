<?php
// Defines
define( 'FL_CHILD_THEME_DIR', get_stylesheet_directory() );
define( 'FL_CHILD_THEME_URL', get_stylesheet_directory_uri() );

// Classes
require_once 'classes/class-fl-child-theme.php';

// Actions
add_action( 'wp_enqueue_scripts', 'FLChildTheme::enqueue_scripts', 1000 );

function bb_child_theme_assets() {
  wp_enqueue_style( 'minified-styles', get_stylesheet_directory_uri() . '/dist/style.css', '', '1.0' );
  wp_enqueue_script( 'minified-scripts', get_stylesheet_directory_uri() . '/dist/scripts.js', array( 'jquery' ), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'bb_child_theme_assets' );
function create_specials_post_type() {
  
  register_post_type( 'specials',
  // CPT Options
      array(
          'labels' => array(
              'name' => __( 'Specials' ),
              'singular_name' => __( 'Special' )
          ),
          'public' => true,
          'has_archive' => true,
          'rewrite' => array('slug' => 'special'),
          'show_in_rest' => true,
          'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields' )

      )
  );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_specials_post_type' );

function create_purveyors_post_type() {
  
  register_post_type( 'purveyors',
  // CPT Options
      array(
          'labels' => array(
              'name' => __( 'Purveyors' ),
              'singular_name' => __( 'Purveyor' )
          ),
          'public' => true,
          'has_archive' => true,
          'rewrite' => array('slug' => 'purveyor'),
          'show_in_rest' => true,
          'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields' )

      )
  );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_purveyors_post_type' );