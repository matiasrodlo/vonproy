<article class="qodef-pl-item swiper-slide <?php echo implode( ' ', get_post_class() ); ?>">

	<?php echo dessau_core_get_cpt_shortcode_module_template_part('portfolio', 'portfolio-motion-category', 'parts/image','', $params); ?>

	<div class="qodef-pli-text-holder">
		<div class="qodef-pli-text-wrapper">
			<div class="qodef-pli-text">
				<?php echo dessau_core_get_cpt_shortcode_module_template_part('portfolio', 'portfolio-motion-category', 'parts/title','', $params); ?>
			</div>
		</div>
	</div>

	<a itemprop="url" class="qodef-pli-link qodef-block-drag-link" href="<?php echo esc_url($this_object->getItemLink()); ?>" target="<?php echo esc_attr($this_object->getItemLinkTarget()); ?>"></a>
</article>