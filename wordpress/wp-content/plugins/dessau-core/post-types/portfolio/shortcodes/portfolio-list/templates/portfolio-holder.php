<div class="qodef-portfolio-list-holder qodef-grid-list <?php echo esc_attr($holder_classes); ?>" <?php echo wp_kses($holder_data, array('data')); ?>>
	<?php echo dessau_core_get_cpt_shortcode_module_template_part('portfolio', 'portfolio-list', 'parts/filter', '', $params); ?>
	<div class="qodef-pl-inner qodef-outer-space <?php echo esc_attr($holder_inner_classes); ?> clearfix">
        <?php if ($item_style == 'full-screen') : ?>
            <div class="swiper-container"><div class="swiper-wrapper">
        <?php endif; ?>
        <?php
		if (!empty($list_standard_title)){
			echo dessau_core_get_cpt_shortcode_module_template_part('portfolio', 'portfolio-list', 'portfolio-title-item', '', $params);
		} ?>
		<?php
			if($query_results->have_posts()):
				while ( $query_results->have_posts() ) : $query_results->the_post();
					echo dessau_core_get_cpt_shortcode_module_template_part('portfolio', 'portfolio-list', 'portfolio-item', $item_type, $params);
				endwhile;
			else:
				echo dessau_core_get_cpt_shortcode_module_template_part('portfolio', 'portfolio-list', 'parts/posts-not-found');
			endif;
		
			wp_reset_postdata();
		?>
		<?php if ($item_style == 'full-screen') : ?>
                </div></div>
            <?php if ($enable_pagination == 'yes') { ?>
                <div class="swiper-pagination"></div>
            <?php } ?>
        <div id="qodef-ptf-info-block">
            <div class="qodef-pli-text-holder">
                <div class="qodef-pli-text-wrapper">
                    <div class="qodef-pli-text">
                        <a class="qodef-pli-up-arrow" href="#"><i class="lnr lnr-chevron-left "></i></a>
                        <div class="qodef-pli-text-inner">
                            <h2 itemprop="name" class="qodef-pli-title entry-title"></h2>
                            <div class="qodef-pli-cat"></div>
                            <div class="qodef-pli-info-holder">
                                <div class="qodef-pli-category-info qodef-pli-info">
                                    <h5 class="qodef-pli-info-title"><?php esc_html_e( 'Category:', 'dessau' ); ?></h5>
                                    <p><a itemprop="url" href="#"></a></p>
                                </div>
                                <div class="qodef-pli-date-info qodef-pli-info">
                                    <h5 class="qodef-pli-info-title"><?php esc_html_e( 'Date:', 'dessau' ); ?></h5>
                                    <p></p>
                                </div>
                                <div class="qodef-pli-tag-info qodef-pli-info">
                                    <h5 class="qodef-pli-info-title"><?php esc_html_e( 'Tag:', 'dessau' ); ?></h5>
                                    <p><a itemprop="url" href="#"></a></p>
                                </div>
                                <p itemprop="description" class="qodef-pli-excerpt"></p>
                                <div class="qodef-pli-share-info qodef-pli-info">
                                    <div class="qodef-social-share-holder qodef-list">
                                        <ul>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
</div>
	
	<?php echo dessau_core_get_cpt_shortcode_module_template_part('portfolio', 'portfolio-list', 'pagination/'.$pagination_type, '', $params, $additional_params); ?>
</div>