<?php if ( ! empty( $image ) ) { ?>
	<div class="qodef-pcli-image">
		<?php echo wp_get_attachment_image( $image, $image_size ); ?>
	</div>
<?php } ?>