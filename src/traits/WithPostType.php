<?php

namespace Randyduran\Traits;

trait WithPostType
{
    public $postTypes = [];

    final public function bootWithPostType()
    {
        if (count($this->postTypes)) {
            add_action('init', [$this, 'registerPostTypes'], 0);
        }
    }

    /**
     * Register Custom Post types
     *
     * @return void
     */
    function registerPostTypes(): void
    {

        foreach ($this->postTypes as $postType) {
            $labels = [
                'name'                  => _x($postType['name'], 'Post Type General Name', $postType['text_domain']),
                'singular_name'         => _x($postType['singular_name'], 'Post Type Singular Name', $postType['text_domain']),
                'menu_name'             => __($postType['name'], $postType['text_domain']),
                'name_admin_bar'        => __($postType['singular_name'], $postType['text_domain']),
                'archives'              => __('Item Archives', $postType['text_domain']),
                'attributes'            => __('Item Attributes', $postType['text_domain']),
                'parent_item_colon'     => __('Parent Item:', $postType['text_domain']),
                'all_items'             => __('All Items', $postType['text_domain']),
                'add_new_item'          => __('Add New Item', $postType['text_domain']),
                'add_new'               => __('Add New', $postType['text_domain']),
                'new_item'              => __('New Item', $postType['text_domain']),
                'edit_item'             => __('Edit Item', $postType['text_domain']),
                'update_item'           => __('Update Item', $postType['text_domain']),
                'view_item'             => __('View Item', $postType['text_domain']),
                'view_items'            => __('View Items', $postType['text_domain']),
                'search_items'          => __('Search Item', $postType['text_domain']),
                'not_found'             => __('Not found', $postType['text_domain']),
                'not_found_in_trash'    => __('Not found in Trash', $postType['text_domain']),
                'featured_image'        => __('Featured Image', $postType['text_domain']),
                'set_featured_image'    => __('Set featured image', $postType['text_domain']),
                'remove_featured_image' => __('Remove featured image', $postType['text_domain']),
                'use_featured_image'    => __('Use as featured image', $postType['text_domain']),
                'insert_into_item'      => __('Insert into item', $postType['text_domain']),
                'uploaded_to_this_item' => __('Uploaded to this item', $postType['text_domain']),
                'items_list'            => __('Items list', $postType['text_domain']),
                'items_list_navigation' => __('Items list navigation', $postType['text_domain']),
                'filter_items_list'     => __('Filter items list', $postType['text_domain']),
            ];

            $args = array(
                'labels'                => $labels,
                'menu_icon'             => isset($postType['supports']) ? $postType['supports'] : 'dashicons-cart',
                'description'           => __($postType['description'], $postType['text_domain']),
                'supports'              => $postType['supports'],
                'taxonomies'            => $postType['taxonomies'],
                'hierarchical'          => isset($postType['hierarchical']) ? $postType['hierarchical'] : false,
                'public'                => isset($postType['public']) ? $postType['public'] : true,
                'show_ui'               => isset($postType['show_ui']) ?  $postType['show_ui'] : true,
                'show_in_rest'          => isset($postType['show_in_rest']) ?  $postType['show_in_rest'] : true,
                'show_in_menu'          => isset($postType['show_in_menu']) ? $postType['show_in_menu'] : true,
                'menu_position'         => isset($postType['position']) ? $postType['position'] : 5,
                'show_in_admin_bar'     => isset($postType['show_in_admin_bar']) ? $postType['show_in_admin_bar'] : true,
                'show_in_nav_menus'     => isset($postType['show_in_nav_menus']) ? $postType['show_in_nav_menus'] : true,
                'can_export'            => isset($postType['can_export']) ? $postType['can_export'] : false,
                'has_archive'           => isset($postType['has_archive']) ? $postType['has_archive'] : true,
                'exclude_from_search'   => isset($postType['exclude_from_search']) ? $postType['exclude_from_search'] : false,
                'publicly_queryable'    => isset($postType['publicly_queryable']) ? $postType['publicly_queryable'] : true,
                'capability_type'       => isset($postType['capability_type']) ? $postType['capability_type'] : 'post',
            );

            register_post_type($postType['slug'], $args);
        }
    }
}