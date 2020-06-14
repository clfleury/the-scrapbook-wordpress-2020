<?php

/**
 * Plugin Name: The Scrapbook Plugin
 */

 if( !defined(  'ABSPATH' ) ) {
   die;
 }

 if(file_exists(dirname(__FILE__).'/vendor/autoload.php')){
   require_once dirname(__FILE__).'/vendor/autoload.php';
 } //else {
   //require_once dirname(__FILE__) . '/includes/Plugin.php';
 //}

use TheScrapbook\Plugin;

/*Load main plugin class that instantiates all plugin classes*/
 function load_plugin() {

  $plugin = TheScrapbook\Plugin::get_instance();
  $plugin->enable();
 }

 load_plugin();
