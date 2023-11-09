<?php if($max_num_pages > 1) { ?>
	<div class="qodef-blog-pag-loading">
		<div class="qodef-dessau-loader">
			  <svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
			    width="106.237px" height="104.477px" viewBox="0 0 106.237 104.477" enable-background="new 0 0 106.237 104.477">
			 	   <rect x="0.125" y="1.057" fill="#393939" stroke="#393939" stroke-width="0.25" stroke-miterlimit="10" width="1.317" height="103.295"/>
			 	   <rect x="0.125" y="102.988" fill="#393939" stroke="#393939" stroke-width="0.25" stroke-miterlimit="10" width="105.987" height="1.363"/>
			 	   <rect x="104.795" y="0.182" fill="#393939" stroke="#393939" stroke-width="0.25" stroke-miterlimit="10" width="1.317" height="104.17"/>
			 	   <rect x="0.125" y="0.125" fill="#393939" stroke="#393939" stroke-width="0.25" stroke-miterlimit="10" width="105.987" height="1.363"/>
			 	   <rect x="0.125" y="0.125" fill="#393939" stroke="#393939" stroke-width="0.25" stroke-miterlimit="10" width="105.987" height="1.363"/>
			 	   <rect x="65.867" y="30.111" fill="#393939" stroke="#393939" stroke-width="0.25" stroke-miterlimit="10" width="39.587" height="1.363"/>
			 	   <rect x="65.867" y="30.111" fill="#393939" stroke="#393939" stroke-width="0.25" stroke-miterlimit="10" width="39.587" height="1.363"/>
			 	   <rect x="65.867" y="30.111" fill="#393939" stroke="#393939" stroke-width="0.25" stroke-miterlimit="10" width="39.587" height="1.363"/>
			 	   <rect x="65.072" y="1.307" fill="#393939" stroke="#393939" stroke-width="0.25" stroke-miterlimit="10" width="1.317" height="103.045"/>
			  </svg>
		</div>
	</div>
	<div class="qodef-blog-pag-load-more">
		<?php
			$button_params = array(
				'link' => 'javascript: void(0)',
				'text' => esc_html__( 'Load More', 'dessau' )
			);
			
			echo dessau_select_return_button_html( $button_params );
		?>
	</div>
    <?php
        $unique_id = rand( 1000, 9999 );
        wp_nonce_field( 'qodef_blog_load_more_nonce_' . $unique_id, 'qodef_blog_load_more_nonce_' . $unique_id );
    ?>
<?php }