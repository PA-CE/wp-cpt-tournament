<?php

class playerCPT {

    function __construct() {

        add_action('init', array($this, 'pace_register_cpt_player'));

    }

    function pace_register_cpt_player() {

        $playerLabel = array(
            'name'               => __('Players'),
            'menu_name'          => __('Players'),
            'all_items'          => __('All Players'),
            'singular_name'      => __('All Players'),
            'add_new_item'       => __('Add New Player'),
            'edit_item'          => __('Edit Player'),
            'new_item'           => __('New Player'),
            'view_item'          => __('View Player'),
            'search_items'       => __('Search Players'),
            'not_found'          => __('No Players found'),
            'not_found_in_trash' => __('No Players found in trash')
        );

        $playerArgs = array(
            'labels'              => $playerLabel,
            'description'         => 'Tournament Players',
            'public'              => true,
            'has_archive'         => true,
            'exclude_from_search' => true,
            'show_ui'             => true,
            'menu_position'       => 10,
            'menu_icon'           => 'dashicons-id',
            'supports'            => array('title')
        );

        register_post_type( 'player', $playerArgs );

    }
}