<li class="qodef-uss-item <?php echo esc_attr($holder_classes); ?>" <?php echo dessau_select_get_inline_attrs($holder_data); ?>>
    <div class="qodef-uss-image-holder" <?php echo dessau_select_get_inline_attrs($image_data); ?> <?php dessau_select_inline_style($holder_styles); ?>></div>
    <div class="qodef-uss-item-outer">
        <div class="qodef-uss-item-inner" <?php dessau_select_inline_style($item_inner_styles); ?>>
            <?php echo do_shortcode($content); ?>
        </div>
	</div>
	<?php if(!empty($link)) { ?>
		<a itemprop="url" class="qodef-uss-item-link" href="<?php echo esc_url($link); ?>" target="<?php echo esc_attr($link_target); ?>"></a>
	<?php } ?>
</li>