<?php
/**
 * Plugin Name: How Secure Is My Password?
 * Plugin URI: http://github.com/howsecureisymypassword/wordpress
 * Description: Adds the How Secure Is My Password strength meter to your user profile pages
 * Version: 0.1
 * Author: Mark Wales
 * Author URI: http://smallhadroncollider.com
 * License: MIT
 */

function hsimp_scripts() {
    wp_enqueue_script('hsimp.jquery.min.js', plugins_url('hsimp.jquery.min.js', __FILE__), array('jquery'), '0.1', true);
    wp_enqueue_script('hsimp.wordpress.js', plugins_url('hsimp.wordpress.js', __FILE__), array('hsimp.jquery.min.js', 'jquery'), '0.1', true);
    wp_enqueue_style('hsimp.min.css', plugins_url('hsimp.min.css', __FILE__));
}

add_action('admin_init', 'hsimp_scripts');
