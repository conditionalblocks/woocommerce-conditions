?>

/**
 * My newly created function to determine if blocks should show.
 *
 * @return boolean true/false to show the block or not.
 */
function custom_has_product_category_id_in_cart( $category_id ) {

	$has_category = false;

	// Loop through cart items.
	foreach ( WC()->cart->get_cart() as $cart_item ) {
		// Check for product categories.

		if ( has_term( $category_id, 'product_cat', $cart_item['product_id'] ) ) {
			$has_category = true;
			break;
		}
	}

	return $has_category;
}


/**
 * Add custom functions to be used with PHP Logic conditions.
 *
 * @param array $allowed_functions
 * @return array $allowed_functions
 */
function custom_add_allowed_function_conditional_blocks( $allowed_functions ) {

	array_push( $allowed_functions, 'custom_has_product_category_id_in_cart' );

	return $allowed_functions;
}
add_filter( 'conditional_blocks_filter_php_logic_functions', 'custom_add_allowed_function_conditional_blocks', 10, 1 );
