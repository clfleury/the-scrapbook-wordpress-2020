<?php

namespace TheScrapbook\PostType;

class GlossaryPostType extends AbstractPostType {

  public function get_name(){
    return 'GLOSSARY_POST_TYPE';
  }

  public function get_singular_label(){
    return esc_html__('Glossary Entry', 'thescrapbook');
  }

  public function get_plural_label(){
    return esc_html__('Glossary Entries', 'thescrapbook');
  }

  public function get_editor_supports() {
		return [
			'title',
			'author',
			'editor',
			'excerpt',
			'thumbnail',
			'revisions',
		];
	}

}
