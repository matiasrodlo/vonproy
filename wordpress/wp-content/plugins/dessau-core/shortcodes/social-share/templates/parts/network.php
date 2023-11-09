<li class="qodef-<?php echo esc_html($name) ?>-share">
	<a itemprop="url" class="qodef-share-link" href="#" onclick="<?php echo esc_attr($link); ?>">
		<?php if ($custom_icon !== '') { ?>
			<img itemprop="image" src="<?php echo esc_url($custom_icon); ?>" alt="<?php esc_attr_e($name); ?>" />
		<?php } else { ?>
			<span class="qodef-social-network-icon <?php echo esc_attr($icon); ?>"></span>
		<?php } ?>
	</a>
</li>