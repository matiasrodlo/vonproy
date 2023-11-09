<div class="qodef-portfolio-mc-holder qodef-portfolio-list-holder qodef-pl-gallery-overlay <?php echo esc_attr($holder_classes); ?>">
	<div class="qodef-mc-categories">
		<?php for( $n = 1; $n <= $columns_count; $n++ ) { ?>
			<h6 class="qodef-portfolio-mc-category">
				<?php if ( ! empty($links[$n]) ) { ?>
					<a itemprop="url" href="<?php echo esc_url($links[$n]); ?>">
				<?php } ?>
				<?php echo esc_html($categories[$n]); ?>
				<?php if ( ! empty($links[$n]) ) { ?>
					</a>
				<?php } ?>
			</h6>
		<?php } ?>
	</div>
	<?php for( $n = 1; $n <= $columns_count; $n++ ) { ?>
		<div class="qodef-pl-inner swiper-container clearfix">
			<div class="swiper-wrapper">
				<?php
				if($query_results[$n]->have_posts()):
					while ( $query_results[$n]->have_posts() ) : $query_results[$n]->the_post();
						echo dessau_core_get_cpt_shortcode_module_template_part('portfolio', 'portfolio-motion-category', 'portfolio-item-motion',$item_type, $params);
					endwhile;
				else:
					echo dessau_core_get_cpt_shortcode_module_template_part('portfolio', 'portfolio-motion-category','parts/posts-not-found');
				endif;

				wp_reset_postdata();
				?>
			</div>
		</div>
	<?php } ?>

	<div class="qodef-portfolio-mc-mobile-view">
		<div class="swiper-container  qodef-portfolio-mc-mobile-container">
			<div class="swiper-wrapper">
				<?php if($query_results[1]->have_posts()):
					while ( $query_results[1]->have_posts() ) : $query_results[1]->the_post();
						echo dessau_core_get_cpt_shortcode_module_template_part('portfolio', 'portfolio-motion-category', 'portfolio-item','motion-category-mobile', $params);
					endwhile;
				else:
					echo dessau_core_get_cpt_shortcode_module_template_part('portfolio', 'portfolio-motion-category','parts/posts-not-found');
				endif;

				wp_reset_postdata();
				?>
			</div>
		</div>
	</div>
</div>