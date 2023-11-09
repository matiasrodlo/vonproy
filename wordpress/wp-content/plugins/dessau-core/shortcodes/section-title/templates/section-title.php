<div class="qodef-section-title-holder <?php echo esc_attr($holder_classes); ?>" <?php echo dessau_select_get_inline_style($holder_styles); ?>>
	<div class="qodef-st-inner">
        <?php if($type == 'corners') { ?>
            <span class="qodef-corner-line line-1"></span>
            <span class="qodef-corner-line line-2"></span>
            <span class="qodef-corner-line line-3"></span>
            <span class="qodef-corner-line line-4"></span>
        <?php } ?>
		<?php if(!empty($title)) { ?>
			<<?php echo esc_attr($title_tag); ?> class="qodef-st-title" <?php echo dessau_select_get_inline_style($title_styles); ?>>
				<?php echo wp_kses($title, array('br' => true, 'span' => array('class' => true))); ?>
			</<?php echo esc_attr($title_tag); ?>>
		<?php } ?>
		<?php if(!empty($text)) { ?>
			<<?php echo esc_attr($text_tag); ?> class="qodef-st-text" <?php echo dessau_select_get_inline_style($text_styles); ?>>
				<?php echo wp_kses($text, array('br' => true, 'p' => true)); ?>
			</<?php echo esc_attr($text_tag); ?>>
		<?php } ?>
	</div>
</div>