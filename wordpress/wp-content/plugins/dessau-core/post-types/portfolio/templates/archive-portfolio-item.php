<?php
get_header();
dessau_select_get_title();
do_action( 'dessau_select_before_main_content' ); ?>
<div class="qodef-container qodef-default-page-template">
	<?php do_action( 'dessau_select_after_container_open' ); ?>
	<div class="qodef-container-inner clearfix">
		<?php
			$dessau_taxonomy_id   = get_queried_object_id();
			$dessau_taxonomy_type = is_tax( 'portfolio-tag' ) ? 'portfolio-tag' : 'portfolio-category';
			$dessau_taxonomy      = ! empty( $dessau_taxonomy_id ) ? get_term_by( 'id', $dessau_taxonomy_id, $dessau_taxonomy_type ) : '';
			$dessau_taxonomy_slug = ! empty( $dessau_taxonomy ) ? $dessau_taxonomy->slug : '';
			$dessau_taxonomy_name = ! empty( $dessau_taxonomy ) ? $dessau_taxonomy->taxonomy : '';
			
			dessau_core_get_archive_portfolio_list( $dessau_taxonomy_slug, $dessau_taxonomy_name );
		?>
	</div>
	<?php do_action( 'dessau_select_before_container_close' ); ?>
</div>
<?php get_footer(); ?>
