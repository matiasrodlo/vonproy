<?php the_post_thumbnail('full'); ?>
<div class="qodef-info-box-data-hidden">
	<h2><?php echo esc_attr( get_the_title() ); ?></h2>
	<?php echo dessau_core_get_cpt_shortcode_module_template_part('portfolio', 'portfolio-list', 'parts/excerpt', $item_style, $params); ?>
	<a href="<?php echo esc_url( get_the_permalink() ); ?>"></a>
</div>