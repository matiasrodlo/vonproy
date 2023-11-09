<?php echo dessau_core_get_cpt_shortcode_module_template_part('portfolio', 'portfolio-list', 'parts/image', $item_style, $params); ?>

<div class="qodef-pli-btn-holder">
    <a itemprop="url" class="qodef-btn-plus" href="<?php echo esc_url( $this_object->getItemLink() ); ?>" target="<?php echo esc_attr( $this_object->getItemLinkTarget() ); ?>">        
    	<span class="qodef-btn-line-1"></span>
        <span class="qodef-btn-line-2"></span>
    </a>
</div>