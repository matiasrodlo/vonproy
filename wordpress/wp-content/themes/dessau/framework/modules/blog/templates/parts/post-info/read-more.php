<?php if ( ! dessau_select_post_has_read_more() && ! post_password_required() ) { ?>
	<div class="qodef-post-read-more-button">
		<?php
			$button_params = array(
				'type'         => 'simple',
				'link'         => get_the_permalink(),
				'text'         => esc_html__( 'Read More', 'dessau' ),
				'custom_class' => 'qodef-blog-list-button qodef-btn-icon',
                'icon_pack'    => 'linear_icons',
                'linear_icon'  => 'lnr-arrow-right',
                'icon'         => 'lnr-arrow-right'
			);
			
			echo dessau_select_return_button_html( $button_params );
		?>
	</div>
<?php } ?>