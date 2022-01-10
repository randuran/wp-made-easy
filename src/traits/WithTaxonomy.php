<?php

namespace WPME\Traits;

trait WithTaxonomy
{
    /**
     * @var array
     */
    protected $taxonomies = [];

    public function bootWithTaxonomy()
    {
        if (count($this->taxonomies)) {
            add_action('init', [$this, 'registerTaxonomies'], 0);
        }
    }

    // Register Custom Taxonomy
    private function registerTaxonomies()
    {

        foreach ($this->taxonomies as $taxonomy) {
            $labels = array(
                'name'                       => _x('Taxonomies', 'Taxonomy General Name', $taxonomy['text_domain']),
                'singular_name'              => _x('Taxonomy', 'Taxonomy Singular Name', $taxonomy['text_domain']),
                'menu_name'                  => __('Taxonomy', $taxonomy['text_domain']),
                'all_items'                  => __('All Items', $taxonomy['text_domain']),
                'parent_item'                => __('Parent Item', $taxonomy['text_domain']),
                'parent_item_colon'          => __('Parent Item:', $taxonomy['text_domain']),
                'new_item_name'              => __('New Item Name', $taxonomy['text_domain']),
                'add_new_item'               => __('Add New Item', $taxonomy['text_domain']),
                'edit_item'                  => __('Edit Item', $taxonomy['text_domain']),
                'update_item'                => __('Update Item', $taxonomy['text_domain']),
                'view_item'                  => __('View Item', $taxonomy['text_domain']),
                'separate_items_with_commas' => __('Separate items with commas', $taxonomy['text_domain']),
                'add_or_remove_items'        => __('Add or remove items', $taxonomy['text_domain']),
                'choose_from_most_used'      => __('Choose from the most used', $taxonomy['text_domain']),
                'popular_items'              => __('Popular Items', $taxonomy['text_domain']),
                'search_items'               => __('Search Items', $taxonomy['text_domain']),
                'not_found'                  => __('Not Found', $taxonomy['text_domain']),
                'no_terms'                   => __('No items', $taxonomy['text_domain']),
                'items_list'                 => __('Items list', $taxonomy['text_domain']),
                'items_list_navigation'      => __('Items list navigation', $taxonomy['text_domain']),
            );
            $args = array(
                'labels'                     => $labels,
                'hierarchical'               => false,
                'public'                     => true,
                'show_ui'                    => true,
                'show_admin_column'          => true,
                'show_in_nav_menus'          => true,
                'show_tagcloud'              => true,
            );
            register_taxonomy('taxonomy', array('post'), $args);
        }
    }
}