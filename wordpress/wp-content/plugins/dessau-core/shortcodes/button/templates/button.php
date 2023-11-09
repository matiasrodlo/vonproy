<button type="submit" <?php dessau_select_inline_style($button_styles); ?> <?php dessau_select_class_attribute($button_classes); ?> <?php echo dessau_select_get_inline_attrs($button_data); ?> <?php echo dessau_select_get_inline_attrs($button_custom_attrs); ?>>
    <?php if($type != 'dessau') {?>
        <span class="qodef-btn-text"><?php echo esc_html($text); ?></span>
        <?php echo dessau_select_icon_collections()->renderIcon($icon, $icon_pack); ?>
    <?php } else { ?>
        <div class="qodef-btn-plus">
            <span class="qodef-btn-line-1"></span>
            <span class="qodef-btn-line-1"></span>
        </div>
    <?php } ?>
</button>