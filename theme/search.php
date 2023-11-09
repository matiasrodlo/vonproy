<?php
$qodef_search_holder_params = dessau_select_get_holder_params_search();
?>
<?php get_header(); ?>
<?php dessau_select_get_title(); ?>
<?php do_action('dessau_select_before_main_content'); ?>
	<div class="<?php echo esc_attr( $qodef_search_holder_params['holder'] ); ?>">
		<?php do_action( 'dessau_select_after_container_open' ); ?>
		<div class="<?php echo esc_attr( $qodef_search_holder_params['inner'] ); ?>">
			<?php dessau_select_get_search_page(); ?>
		</div>
		<?php do_action( 'dessau_select_before_container_close' ); ?>
	</div>
<?php get_footer(); ?>