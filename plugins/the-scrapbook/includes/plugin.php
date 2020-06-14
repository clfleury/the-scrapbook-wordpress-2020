<?php

namespace TheScrapbook;

//require_once __DIR__ . '/PostTypeFactory.php';

use TheScrapbook\PostType;

 class Plugin {

   /*Singleton instance of plugin*/
   public static $instance = null;

   public $plugin_support = [];

   /*Initialize instance of plugin*/
   public static function get_instance(){
    if( is_null( self::$instance ) ){
      self::$instance = new Plugin();
    }

    return self::$instance;

   }

   public function enable(){
    add_action( 'init', [ $this, 'init' ], 11 );
   }

   public function init(){
     $this->plugin_support = [
       'post_type_factory' => new PostType\PostTypeFactory()
    ];

    $this->register_objects( $this->plugin_support );
   }

   public function register_objects( $objects ) {
		foreach ( $objects as $object ) {
      $object->register();
		}

	}
 }
