<div class="qodef-image-with-text-holder <?php echo esc_attr($holder_classes); ?>">
    <div class="qodef-iwt-image">
        <?php if ($image_behavior === 'lightbox') { ?>
            <a itemprop="image" href="<?php echo esc_url($image['url']); ?>" data-rel="prettyPhoto[iwt_pretty_photo]" title="<?php echo esc_attr($image['alt']); ?>">
        <?php } else if ($image_behavior === 'custom-link' && !empty($custom_link)) { ?>
	            <a itemprop="url" href="<?php echo esc_url($custom_link); ?>" target="<?php echo esc_attr($custom_link_target); ?>">
        <?php } ?>
            <?php if(is_array($image_size) && count($image_size)) : ?>
                <?php echo dessau_select_generate_thumbnail($image['image_id'], null, $image_size[0], $image_size[1]); ?>
            <?php else: ?>
                <?php echo wp_get_attachment_image($image['image_id'], $image_size); ?>
            <?php endif; ?>
        <?php if ($image_behavior === 'lightbox' || $image_behavior === 'custom-link') { ?>
            </a>
        <?php } ?>
    </div>
    <div class="qodef-iwt-text-holder">
        <?php if(!empty($title)) {
            if(!empty($link)) { ?>
            <a href="<?php echo esc_url($link); ?>">
        <?php } ?>
            <<?php echo esc_attr($title_tag); ?> class="qodef-iwt-title" <?php echo dessau_select_get_inline_style($title_styles); ?>><?php echo esc_html($title); ?></<?php echo esc_attr($title_tag); ?>>
	    <?php if(!empty($link)) { ?>
            </a>
        <?php } }
            if(!empty($text)) { ?>
            <p class="qodef-iwt-text" <?php echo dessau_select_get_inline_style($text_styles); ?>><?php echo esc_html($text); ?></p>
        <?php } ?>
    </div>
</div>