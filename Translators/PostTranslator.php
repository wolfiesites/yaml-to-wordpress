<?php
namespace Wolfiesites\Translators;

use Wolfiesites\Formatters\Text;

class PostTranslator {
	public static function translate($yaml_content) {
	    if (isset($yaml_content) && is_array($yaml_content)) {
	        foreach ($yaml_content as $post_type) {

	        	// more: https://developer.wordpress.org/reference/functions/register_post_type/
	        	
	        	$label 					= Text::make_spaces($post_type['name']);
	        	$plural 				= isset($post_type['plural']) ? $post_type['plural'] : Text::make_plural($label);
	        	$plural_fl 				= isset($post_type['plural']) ? Text::capitalize_first_letter($post_type['plural']) : Text::capitalize_first_letter(Text::make_plural($label));
	        	$singular 				= isset($post_type['singular']) ? $post_type['singular'] : $label;
	        	$singular_fl 			= isset($post_type['singular']) ? Text::capitalize_first_letter($post_type['singular']) : Text::capitalize_first_letter($label);
				$taxonomies 			= isset($post_type['taxonomies']) ? $post_type['taxonomies'] : array();
				$hierarchical 			= isset($post_type['hierarchical']) ? $post_type['hierarchical'] : false;
				$archive 				= isset($post_type['has_archive']) ? $post_type['has_archive'] : true;
				$show_in_menu 			= isset($post_type['show_in_menu']) ? $post_type['show_in_menu'] : true;
				$show_in_rest 			= isset($post_type['show_in_rest']) ? $post_type['show_in_rest'] : true;
				$menu_position 			= isset($post_type['menu_position']) ? $post_type['menu_position'] : true;
	            $supports 				= isset($post_type['supports']) ? $post_type['supports'] : array('title','editor','thumbnail','excerpt');
	            $rewrite 				= isset($post_type['rewrite']) ? $post_type['rewrite'] : array();
	            $public 				= isset($post_type['public']) ? $post_type['public'] : true;
	            $exclude_from_search 	= isset($post_type['exclude_from_search']) ? $post_type['exclude_from_search'] : $public;
	            $menu_icon 				= isset($post_type['menu_icon']) ? $post_type['menu_icon'] : 'dashicons-admin-post';
	            $blocks					= isset($post_type['blocks']) ? $post_type['blocks'] : array();
	            $blocks_lock			= isset($post_type['blocks_lock']) ? $post_type['blocks_lock'] : false;
	            
				$labels = array(
					'name'                  => _x( $plural_fl, 'Post type general name', 'yaml_to_wordpress' ),
					'singular_name'         => _x( $singular_fl, 'Post type singular name', 'yaml_to_wordpress' ),
					'menu_name'             => _x( $plural_fl, 'Admin Menu text', 'yaml_to_wordpress' ),
					'name_admin_bar'        => _x( $singular_fl, 'Add New on Toolbar', 'yaml_to_wordpress' ),
					'add_new'               => __( 'Add New '.$singular_fl, 'yaml_to_wordpress' ),
					'add_new_item'          => __( 'Add New '.$singular_fl, 'yaml_to_wordpress' ),
					'new_item'              => __( 'New '.$singular_fl, 'yaml_to_wordpress' ),
					'edit_item'             => __( 'Edit '.$singular_fl, 'yaml_to_wordpress' ),
					'view_item'             => __( 'View '.$singular_fl, 'yaml_to_wordpress' ),
					'all_items'             => __( 'All '.$plural, 'yaml_to_wordpress' ),
					'search_items'          => __( 'Search '.$plural, 'yaml_to_wordpress' ),
					'parent_item_colon'     => __( 'Parent '. $plural.':', 'yaml_to_wordpress' ),
					'not_found'             => __( 'No '.$plural.' found.', 'yaml_to_wordpress' ),
					'not_found_in_trash'    => __( 'No '.$plural.' found in Trash.', 'yaml_to_wordpress' ),
					'featured_image'        => _x( $singular_fl.' Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'yaml_to_wordpress' ),
					'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'yaml_to_wordpress' ),
					'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'yaml_to_wordpress' ),
					'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'yaml_to_wordpress' ),
					'archives'              => _x( $singular_fl.' archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'yaml_to_wordpress' ),
					'insert_into_item'      => _x( 'Insert into '.$singular_fl, 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'yaml_to_wordpress' ),
					'uploaded_to_this_item' => _x( 'Uploaded to this '.$singular_fl, 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'yaml_to_wordpress' ),
					'filter_items_list'     => _x( 'Filter '.$plural.' list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'yaml_to_wordpress' ),
					'items_list_navigation' => _x( $plural_fl.' list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'yaml_to_wordpress' ),
					'items_list'            => _x( $plural_fl.' list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'yaml_to_wordpress' ),
				);

	            // more: https://developer.wordpress.org/reference/functions/register_post_type/
	            $args = array(
	                'label'  => __($label),
	                'labels' => $labels,
	                'taxonomies' 			 => $taxonomies, 				// array of taxonomies names
	                'delete_with_user' 		 => false,		 				// boolean
	                'has_archive'			 => $archive, 					// boolean
	                'show_in_menu' 			 => $show_in_menu,		 		// can be url with params
	                'show_in_rest' 			 => $show_in_rest,				// it turn on off gutenberg
	                'menu_position' 		 => $menu_position,	
	                'menu_icon' 			 => $menu_icon,				 	// or the url to image file or base64 encode
	                'hierarchical' 			 => $hierarchical,
	                'exclude_from_search' 	 => $exclude_from_search,
	                'public' 				 => $public,
	                'supports'				 => $supports,
	                'rewrite'				 => $rewrite,
	                'template'				 => $blocks, 
	                'template_lock'          => $blocks_lock,
	            );

	            register_post_type($post_type['name'], $args);

	        }
	    }
	}

	public static function register_taxonomy($taxonomy_definition) {
		if(isset($taxonomy_definition) && !is_array($taxonomy_definition)) {
			return false;
		}
	    foreach ($taxonomy_definition as $tax) {
	        if (!isset($tax['name'])) {
	            continue;
	        }

	        $tax_name = $tax['name'];
	        $is_plural = Text::is_plural($tax_name);

	        $tax_name_plural = isset($tax['plural']) ? $tax['plural'] : ($is_plural ? $tax_name : Text::make_plural($tax_name));
	        $tax_name_singular = isset($tax['singular']) ? $tax['singular'] : ($is_plural ? Text::make_singular($tax_name) : $tax_name);
	        $tax_name_plural_fl = Text::capitalize_first_letter($tax_name_plural);
	        $tax_name_singular_fl = Text::capitalize_first_letter($tax_name_singular);

	        $public = isset($tax['public']) ? $tax['public'] : true;
	        $position_in_menu = isset($tax['position_in_menu']) ? $tax['position_in_menu'] : 1;
	        $show_in_menu = isset($tax['show_in_menu']) ? $tax['show_in_menu'] : $public;
	        $description = isset($tax['description']) ? $tax['description'] : 'some desc';
	        $hierarchical = isset($tax['hierarchical']) ? $tax['hierarchical'] : true;
	        $show_admin_column = isset($tax['show_admin_column']) ? $tax['show_admin_column'] : $public;
	        $show_ui = isset($tax['show_ui']) ? $tax['show_ui'] : $public;
	        $show_in_rest = isset($tax['show_in_rest']) ? $tax['show_in_rest'] : $public;
	        $show_in_nav_menus = isset($tax['show_in_nav_menus']) ? $tax['show_in_nav_menus'] : $public;
	        $show_tagcloud = isset($tax['show_tagcloud']) ? $tax['show_tagcloud'] : $public;

	        $category_suffix_singular = (isset($tax['hierarchical']) && $tax['hierarchical']) ? 'Category' : 'Tag' ;
	        $category_suffix_plural = Text::make_plural($category_suffix_singular);

	        $tax_name_with_suffix = $tax_name_singular_fl .' '. $category_suffix_plural;

		    $labels = array(
		        'name'                       => _x( $tax_name_with_suffix, 'Taxonomy General Name', 'yaml_to_wordpress' ),
		        'singular_name'              => _x( $tax_name_singular_fl.' '.$category_suffix_singular, 'Taxonomy Singular Name', 'yaml_to_wordpress' ),
		        'menu_name'                  => __( $tax_name_plural_fl .' '.$category_suffix_plural, 'yaml_to_wordpress' ),
		        'all_items'                  => __( 'All '.$tax_name_plural_fl, 'yaml_to_wordpress' ),
		        'parent_item'                => __( 'Parent '.$tax_name_singular_fl.' '.$category_suffix_singular, 'yaml_to_wordpress' ),
		        'parent_item_colon'          => __( 'Parent '.$tax_name_singular_fl.' '.$category_suffix_singular.':', 'yaml_to_wordpress' ),
		        'new_item_name'              => __( 'New '.$tax_name_singular_fl.' Name', 'yaml_to_wordpress' ),
		        'add_new_item'               => __( 'Add New '.$tax_name_singular_fl.' '.$category_suffix_singular, 'yaml_to_wordpress' ),
		        'edit_item'                  => __( 'Edit '.$tax_name_singular_fl, 'yaml_to_wordpress' ),
		        'update_item'                => __( 'Update '.$tax_name_singular_fl, 'yaml_to_wordpress' ),
		        'view_item'                  => __( 'View '.$tax_name_singular_fl, 'yaml_to_wordpress' ),
		        'separate_items_with_commas' => __( 'Separate '.$tax_name_plural.' with commas', 'yaml_to_wordpress' ),
		        'add_or_remove_items'        => __( 'Add or remove '.$tax_name_plural, 'yaml_to_wordpress' ),
		        'choose_from_most_used'      => __( 'Choose from the most used', 'yaml_to_wordpress' ),
		        'popular_items'              => __( 'Popular '.$tax_name_plural_fl, 'yaml_to_wordpress' ),
		        'search_items'               => __( 'Search '.$tax_name_plural_fl, 'yaml_to_wordpress' ),
		        'not_found'                  => __( 'Not Found', 'yaml_to_wordpress' ),
		        'no_terms'                   => __( 'No '.$tax_name_plural, 'yaml_to_wordpress' ),
		        'items_list'                 => __( $tax_name_plural_fl.' list', 'yaml_to_wordpress' ),
		        'items_list_navigation'      => __( $tax_name_plural_fl.' list navigation', 'yaml_to_wordpress' ),
		    );


	        $args = array_merge(
	            [
	                'labels'                     => $labels,
	                'description'                => $description,
	                'public'                     => $public,
	                'hierarchical'               => $hierarchical,
	                'show_admin_column'          => $show_admin_column,
	                'show_ui'                    => $show_ui,
	                'show_in_rest'               => $show_in_rest,
	                'show_in_nav_menus'          => $show_in_nav_menus,
	                'show_in_menu'               => $show_in_menu,
	                'show_tagcloud'              => $show_tagcloud,
	                'default_term'               => isset($tax['default_term']) ? $tax['default_term'] : [
	                    'name'        => 'all',
	                    'slug'        => 'all',
	                    'description' => 'default term',
	                ],
	                'rewrite'                    => isset($tax['rewrite']) ? $tax['rewrite'] : [
	                    'slug' => $is_plural ? $tax_name : Text::make_plural($tax_name),
	                ],
	            ],
	            $tax['args'] ?? []
	        );

	        register_taxonomy($tax_name, isset($tax['post_name']) ? array($tax['post_name']) : array(), $args);

	        // register here subpage menu
	        if (is_string($args['show_in_menu'])) {
	        	if (!function_exists('yaml_to_wordpress_register_custom_post_type')) {
		        	function yaml_to_wordpress_register_custom_post_type($tax_name, $show_in_menu, $tax_name_with_suffix, $position_in_menu) {
		        		$taxonomy = get_taxonomy($tax_name);
						if (!$taxonomy) {
						    return false;
						 }
						 $associated_post_types = $taxonomy->object_type;
						 $main_post_type = (!empty($associated_post_types)) ? $associated_post_types[0] : '';

					    add_submenu_page(
					        $show_in_menu,
					        $tax_name_with_suffix,
					        $tax_name_with_suffix,
					        'manage_options',
					        'edit-tags.php?taxonomy='.$tax_name.'&post_type='.$main_post_type,
					        '',
					        $position_in_menu,
					    );
					}
	        	}
	        	add_action('admin_menu', function() use ($tax_name, $show_in_menu, $tax_name_with_suffix, $position_in_menu){
	        		yaml_to_wordpress_register_custom_post_type($tax_name, $show_in_menu, $tax_name_with_suffix, $position_in_menu);
	        	}, 99);
				
	        };
	    } // end of tax foreach
	}
}
