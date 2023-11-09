<?php

if($display_button === 'yes') {
	$product = dessau_select_return_woocommerce_global_variable();
	
	print '<div class="qodef-pli-custom-atc-btn"><a class="button add_to_cart_button ajax_add_to_cart" href='.esc_url( $product->add_to_cart_url() ).' data-product_id='.esc_attr( $product->get_id() ).'>'. dessau_select_icon_collections()->renderIcon( "icon-basket", "simple_line_icons" ) .'</a></div>';
} ?>