<?php
/**
 * Highlight shortcode template
 */
?>

<span class="qodef-highlight" <?php dessau_select_inline_style($highlight_style);?>>
	<?php echo esc_html($content);?>
</span>