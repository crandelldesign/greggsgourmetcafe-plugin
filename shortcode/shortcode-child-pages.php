<?php
/**
 * Member shortcode
 *
 * Only login users can read the text  shortcode.
 * E.g. [member]This content is hiddent from users who are not logged in[/member].
 *
 * @package	 ABS
 * @since    1.0.0
 */

if ( ! function_exists( 'child_pages_shortcode' ) ) {
	// Add the action.
	add_action( 'plugins_loaded', function() {
		// Add the shortcode.
		add_shortcode( 'child-pages', 'child_pages_shortcode' );
	});

	/**
	 * Shortcode Function
	 *
	 * @param  Attributes $atts		Error message.
	 * @param  Content 	  $content 	Content.
	 * @return string
	 * @since  1.0.0
	 */
	function child_pages_shortcode( $atts, $content ) {
		// Error Default.
		$error_default = __( 'You need to be a member to read this content!', 'ABS' );

		// Default values for shortcode
		$defaults = [
			'location' => 'primary_navigation',
		];

		// Save $atts.
		$_atts = shortcode_atts( array(
			'location'  => $defaults['location'],
		), $atts );

		global $post;
		$args = array(
		'posts_per_page' => -1,
		'post_parent'    => $post->ID,
		'order'          => 'ASC',
		'orderby'        => 'menu_order'
		);

		$parent = new \WP_Query( $args );

		$pages = '';

		$section_id = empty( $post->ancestors ) ? $post->ID : end( $post->ancestors );
		$locations = get_nav_menu_locations();
		$menu = wp_get_nav_menu_object( $locations[ $_atts['location'] ] ); // 'primary' is our nav menu's name
		$menu_items = wp_get_nav_menu_items( $menu->term_id, array( 'post_parent' => $section_id ) );
		if( !empty( $menu_items ) ) {
		$pages .= '<div class="list-group">';
		foreach( $menu_items as $menu_item ) {
			$pages .=  '<a class="list-group-item list-group-item-action" href="' . $menu_item->url . '">' . $menu_item->title . '</a>';
		}
		$pages .=  '</div>';
		}
	
		return $pages;
	}
} // End if().
