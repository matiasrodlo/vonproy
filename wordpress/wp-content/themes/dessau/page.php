<?php
$qodef_sidebar_layout = dessau_select_sidebar_layout();

get_header();
dessau_select_get_title();
get_template_part( 'slider' );
do_action('dessau_select_before_main_content');
?>

<div class="qodef-container qodef-default-page-template">
	<?php do_action( 'dessau_select_after_container_open' ); ?>
	
	<div class="qodef-container-inner clearfix">
        <?php do_action( 'dessau_select_after_container_inner_open' ); ?>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<div class="qodef-grid-row">
				<div <?php echo dessau_select_get_content_sidebar_class(); ?>>
					<?php
						the_content();
						do_action( 'dessau_select_page_after_content' );
					?>
				</div>
				<?php if ( $qodef_sidebar_layout !== 'no-sidebar' ) { ?>
					<div <?php echo dessau_select_get_sidebar_holder_class(); ?>>
						<?php get_sidebar(); ?>
					</div>
				<?php } ?>
			</div>
		<?php endwhile; endif; ?>
        <?php do_action( 'dessau_select_before_container_inner_close' ); ?>
	</div>
	
	<?php do_action( 'dessau_select_before_container_close' ); ?>
</div>

<?php get_footer(); ?>