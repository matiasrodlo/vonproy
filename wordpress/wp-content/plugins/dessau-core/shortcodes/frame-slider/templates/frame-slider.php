<?php $i = 0; ?>
<div class="qodef-frame-slider-holder">
	<div class="qodef-fs-device"></div>
	<div class="qodef-fs-inner">
		<div class="qodef-fs-slides qodef-owl-slider" <?php echo dessau_select_get_inline_attrs($slider_data); ?>>
			<?php foreach ($images as $image) { ?>
				<div class="qodef-fs-slide">
					<?php if(!empty($links)){ ?>
						<a class="qodef-ig-link" href="<?php echo esc_url($links[$i++]) ?>" title="<?php echo esc_attr($image['alt']); ?>" target="<?php echo esc_attr($target); ?>">
					<?php } ?>
						<?php echo wp_get_attachment_image($image['image_id'], 'full'); ?>
					<?php if(!empty($links)){ ?>
						</a>
					<?php } ?>
				</div>
			<?php } ?>
		</div>
	</div>
</div>
