<?php
/*
Template Name: WooCommerce
*/
?>
<?php
$qodef_sidebar_layout = dessau_select_sidebar_layout();

get_header();
dessau_select_get_title();
get_template_part( 'slider' );
do_action('dessau_select_before_main_content');

//Woocommerce content
if ( ! is_singular( 'product' ) ) { ?>
	<div class="qodef-container">
		<div class="qodef-container-inner clearfix">
			<div class="qodef-grid-row">
				<div <?php echo dessau_select_get_content_sidebar_class(); ?>>
					<?php dessau_select_woocommerce_content(); ?>
				</div>
				<?php if ( $qodef_sidebar_layout !== 'no-sidebar' ) { ?>
					<div <?php echo dessau_select_get_sidebar_holder_class(); ?>>
						<?php get_sidebar(); ?>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
<?php } else { ?>
	<div class="qodef-container">
		<div class="qodef-container-inner clearfix">
			<?php dessau_select_woocommerce_content(); ?>
		</div>
	</div>
<?php } ?>
<?php get_footer(); ?>