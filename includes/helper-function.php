<?php 
function ppfw_popular_products_views_count($productID) {
	$count_key = 'views';
	$count = get_post_meta($productID, $count_key, true);
	if($count==''){
		delete_post_meta($productID, $count_key);
		add_post_meta($productID, $count_key, '1');
	}else{
		$count++;
		update_post_meta($productID, $count_key, $count);
	}
}

/*
 * track product views
 */
function ppfw_popular_products_views ($product_id) {
	if ( is_single() ){
		if ( empty ( $product_id) ) {
			global $product;
			$product_id = $product->ID;
			ppfw_popular_products_views_count($product_id);
		}
	}
}
add_action( 'wp_head', 'ppfw_popular_products_views');