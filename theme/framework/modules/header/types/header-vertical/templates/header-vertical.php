<?php do_action('dessau_select_before_page_header'); ?>

<aside class="qodef-vertical-menu-area <?php echo esc_html($holder_class); ?>">
	<div class="qodef-vertical-menu-area-inner">
		<div class="qodef-vertical-area-background"></div>
		<?php if(!$hide_logo) {
			dessau_select_get_logo();
		} ?>
		<?php dessau_select_get_header_vertical_main_menu(); ?>
		<div class="qodef-vertical-area-widget-holder">
			<?php dessau_select_get_header_vertical_widget_areas(); ?>
		</div>
	</div>
</aside>

<?php do_action('dessau_select_after_page_header'); ?>