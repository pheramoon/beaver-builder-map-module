<?php
/**
 * Plugin Name: Custom Restaurant Location
 * Plugin URI: http://beaver.local
 * Description: Custom modules for the Beaver Builder Plugin.
 * Version: 1.3
 * Author: Mehdi Mousavi
 * Author URI: https://www.linkedin.com/in/mr-mazhari/
 */
define( 'MY_MODULES_DIR', plugin_dir_path( __FILE__ ) );
define( 'MY_MODULES_URL', plugins_url( '/', __FILE__ ) );

function my_load_module_examples() {
  if ( class_exists( 'FLBuilder' ) ) {
      // Include your custom modules here.
      require_once 'my-restaurant-module/my-restaurant-module.php';
  }
}
add_action( 'init', 'my_load_module_examples' );
?>