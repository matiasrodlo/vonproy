<div class="qodef-fsis-item">
	<div class="qodef-fsis-image" <?php dessau_select_inline_style( $image_styles ); ?>>
		<div class="qodef-fsis-image-wrapper">
			<div class="qodef-fsis-image-inner">
				<?php if ( ! empty( $image_top ) ) { ?>
					<div class="qodef-fsis-content-image qodef-fsis-image-top">
						<?php echo wp_get_attachment_image( $image_top, 'full' ); ?>
					</div>
				<?php } ?>
				<?php if ( ! empty( $image_left ) ) { ?>
					<div class="qodef-fsis-content-image qodef-fsis-image-left">
						<?php echo wp_get_attachment_image( $image_left, 'full' ); ?>
					</div>
				<?php } ?>
				<?php if ( ! empty( $image_right ) ) { ?>
					<div class="qodef-fsis-content-image qodef-fsis-image-right">
						<?php echo wp_get_attachment_image( $image_right, 'full' ); ?>
					</div>
				<?php } ?>
				<?php if ( ! empty( $title ) ) { ?>
					<<?php echo esc_attr( $title_tag ); ?> class="qodef-fsis-title" <?php echo dessau_select_get_inline_style( $title_styles ); ?>><?php echo wp_kses( $title, array( 'br' => true ) ); ?></<?php echo esc_attr( $title_tag ); ?>>
				<?php } ?>
				<?php if ( ! empty( $subtitle ) ) { ?>
					<<?php echo esc_attr( $subtitle_tag ); ?> class="qodef-fsis-subtitle" <?php echo dessau_select_get_inline_style( $subtitle_styles ); ?>><?php echo wp_kses( $subtitle, array( 'br' => true ) ); ?></<?php echo esc_attr( $subtitle_tag ); ?>>
				<?php } ?>
			</div>
		</div>
	</div>
	<div class="qodef-fsis-frame qodef-fsis-frame-top"></div>
	<div class="qodef-fsis-frame qodef-fsis-frame-right"></div>
	<div class="qodef-fsis-frame qodef-fsis-frame-bottom"></div>
	<div class="qodef-fsis-frame qodef-fsis-frame-left"></div>
</div>