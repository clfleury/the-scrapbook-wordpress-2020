<?php

namespace TheScrapbook\PostType;

abstract class AbstractPostType {

  abstract public function get_name();

  abstract public function get_singular_label();

  abstract public function get_plural_label();

  public function register(){
    $this->register_post_type();
  }

  public function get_options(){
    return array(
      'labels' => $this->get_labels(),
      'public' => true,
      'has_archive' => true,
      'show_ui' => true,
      'show_in_menu' => true,
      'show_in_nav_menu' => false,
      'show_in_rest' => true,
      'supports' => array('title', 'editor', 'custom-fields', 'excerpt', 'thumbnail')
    );
  }

  public function get_labels(){
    $plural_label = $this->get_plural_label();
    $singular_label = $this->get_singular_label();

    $labels = array(
			'name'                     => $plural_label,
			// Already translated via get_plural_label().
			'singular_name'            => $singular_label,
			// Already translated via get_singular_label().
			'add_new_item'             => sprintf( __( 'Add New %s', 'nesn' ), $singular_label ),
			'edit_item'                => sprintf( __( 'Edit %s', 'nesn' ), $singular_label ),
			'new_item'                 => sprintf( __( 'New %s', 'nesn' ), $singular_label ),
			'view_item'                => sprintf( __( 'View %s', 'nesn' ), $singular_label ),
			'view_items'               => sprintf( __( 'View %s', 'nesn' ), $plural_label ),
			'search_items'             => sprintf( __( 'Search %s', 'nesn' ), $plural_label ),
			'not_found'                => sprintf( __( 'No %s found.', 'nesn' ), strtolower( $plural_label ) ),
			'not_found_in_trash'       => sprintf( __( 'No %s found in Trash.', 'nesn' ), strtolower( $plural_label ) ),
			'parent_item_colon'        => sprintf( __( 'Parent %s:', 'nesn' ), $plural_label ),
			'all_items'                => sprintf( __( 'All %s', 'nesn' ), $plural_label ),
			'archives'                 => sprintf( __( '%s Archives', 'nesn' ), $singular_label ),
			'attributes'               => sprintf( __( '%s Attributes', 'nesn' ), $singular_label ),
			'insert_into_item'         => sprintf( __( 'Insert into %s', 'nesn' ), strtolower( $singular_label ) ),
			'uploaded_to_this_item'    => sprintf( __( 'Uploaded to this %s', 'nesn' ), strtolower( $singular_label ) ),
			'filter_items_list'        => sprintf( __( 'Filter %s list', 'nesn' ), strtolower( $plural_label ) ),
			'items_list_navigation'    => sprintf( __( '%s list navigation', 'nesn' ), $plural_label ),
			'items_list'               => sprintf( __( '%s list', 'nesn' ), $plural_label ),
			'item_published'           => sprintf( __( '%s published.', 'nesn' ), $singular_label ),
			'item_published_privately' => sprintf( __( '%s published privately.', 'nesn' ), $singular_label ),
			'item_reverted_to_draft'   => sprintf( __( '%s reverted to draft.', 'nesn' ), $singular_label ),
			'item_scheduled'           => sprintf( __( '%s scheduled.', 'nesn' ), $singular_label ),
			'item_updated'             => sprintf( __( '%s updated.', 'nesn' ), $singular_label ),
			'menu_name'                => $plural_label,
			'name_admin_bar'           => $singular_label,
		);

    return $labels;
  }

  public function register_post_type(){
    register_post_type(
      $this->get_name(),
      $this->get_options()
    );
  }


}
