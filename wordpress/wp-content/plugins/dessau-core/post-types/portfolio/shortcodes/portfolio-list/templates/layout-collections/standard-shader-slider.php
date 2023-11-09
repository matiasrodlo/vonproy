<?php
$content_styles = $this_object->getStandardContentStyles($params);

echo dessau_core_get_cpt_shortcode_module_template_part('portfolio', 'portfolio-list', 'parts/image', $item_style, $params); ?>

<div class="qodef-pli-text-holder" <?php dessau_select_inline_style($content_styles); ?>>
	<div class="qodef-pli-text-wrapper">
		<div class="qodef-pli-text">
			<a itemprop="url" href="<?php echo esc_url( $this_object->getItemLink() ); ?>" target="<?php echo esc_attr( $this_object->getItemLinkTarget() ); ?>">        
				<?php echo dessau_core_get_cpt_shortcode_module_template_part('portfolio', 'portfolio-list', 'parts/title', $item_style, $params); ?>
			</a>

				<?php echo dessau_core_get_cpt_shortcode_module_template_part('portfolio', 'portfolio-list', 'parts/category', $item_style, $params); ?>

				<?php echo dessau_core_get_cpt_shortcode_module_template_part('portfolio', 'portfolio-list', 'parts/images-count', $item_style, $params); ?>

				<?php echo dessau_core_get_cpt_shortcode_module_template_part('portfolio', 'portfolio-list', 'parts/excerpt', $item_style, $params); ?>
			
			<div class="qodef-pli-btn-holder qodef-btn">
				<a itemprop="url" class="qodef-btn-plus" href="<?php echo esc_url( $this_object->getItemLink() ); ?>" target="<?php echo esc_attr( $this_object->getItemLinkTarget() ); ?>">        
					<span class="qodef-btn-line-1"></span>
				    <span class="qodef-btn-line-2"></span>
				</a>
			</div>
		</div>
	</div>
</div>