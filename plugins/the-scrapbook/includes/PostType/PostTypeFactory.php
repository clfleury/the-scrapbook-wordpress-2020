<?php

namespace TheScrapbook\PostType;

class PostTypeFactory {

  /*array f0r storing post type builds*/
  public $post_types = [];

  /*List of post types to be registered*/
  public $post_type_mapping = [
    'GLOSSARY_POST_TYPE' => 'GlossaryPostType'
  ];

  public function get_supported_post_type(){
    return array_keys( $this->post_type_mapping );
  }

  public function register(){
    $this->build_all();
  }

  public function build_all(){
   foreach ($this->get_supported_post_type() as $post_type){
    $this->build_if($post_type);
   }
  }

  public function build_if( $post_type ){
    if( ! $this->exists( $post_type ) ){
      $this->post_types[ $post_type ] = $this->build( $post_type );
      $instance = $this->post_types[ $post_type ];
      $instance->register();
    }
    return $this->post_types[ $post_type ];

  }

  public function exists( $post_type ) {
    return ! empty( $this->post_types[ $post_type ] );
  }

  public function build( $post_type ) {
    if( !empty($this->post_type_mapping[ $post_type ]) ){
      $class = $this->post_type_mapping[ $post_type ];
      if ( strpos( $class, 'PostType' ) !== 0 ){
        $class = 'TheScrapbook\PostType\\' . $class;
      }

      $instance = new $class;

      return $instance;
    }
  }
}
