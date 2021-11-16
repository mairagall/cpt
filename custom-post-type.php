<?php

// Create CPT Taxonomy
add_action( 'init', 'mg_custom_taxonomy' );
function mg_custom_taxonomy() {

    register_taxonomy( 'categoria-SLUG', 'CPT NAME',
        array(
            'labels' => array(
                'name'          => _x( 'Categorías', 'taxonomy general name'),
                'add_new_item'  => __( 'Agregar nueva categoría'),
                'new_item_name' => __( 'Nueva categoría'),
            ),
            'exclude_from_search' => true,
            'has_archive'         => true,
            'hierarchical'        => true,
            'rewrite'             => array( 'slug' => 'categoria-SLUG', 'with_front' => false ),
            'show_ui'             => true,
            'show_tagcloud'       => false,
            'show_in_rest'        => true,
        )
    );

}

// Create custom post type
add_action( 'init', 'mg_custom_post_type' );
function mg_custom_post_type() {

    register_post_type( 'CPT NAME',
        array(
            'labels' => array(
                'name'          => __( 'CPT NAME PLURAL'),
                'singular_name' => __( 'CPT NAME SING'),
            ),
            'has_archive'  => true,
            'hierarchical' => true,
			      'menu_position'      => 5,
            'menu_icon'    => 'dashicons-screenoptions',
            'public'       => true,
            'rewrite'      => array( 'slug' => 'SLUG', 'with_front' => false ),
            'supports'     => array( 'title', 'editor', 'author', 'thumbnail', 'custom-fields', 'genesis-cpt-archives-settings' ),
            'taxonomies'   => array( 'categoria-SLUG' ),
            'show_in_rest' => true,

        )
    );
    
}
