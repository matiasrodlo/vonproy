<article class="qodef-pl-item <?php echo implode( ' ', get_post_class() ); ?>">

    <?php echo dessau_core_get_cpt_shortcode_module_template_part('portfolio', 'portfolio-motion-category', 'parts/image','', $params); ?>

    <div class="qodef-pli-text-holder">
        <div class="qodef-pli-text-wrapper">
            <div class="qodef-pli-text">
                <?php echo dessau_core_get_cpt_shortcode_module_template_part('portfolio', 'portfolio-motion-category', 'parts/title','', $params); ?>
            </div>
        </div>
    </div>

    <?php
    $media = dessau_core_get_portfolio_single_media();
    $featured = '';
    $unique_id = rand();

    if(has_post_thumbnail()) {
        $featured = get_the_post_thumbnail_url(get_the_ID(),'full');
    }

    if(is_array($media) && count($media)) { ?>
    <?php if(!empty($featured)) { ?>
        <a itemprop="url" class="qodef-pli-link" data-rel="prettyPhoto[rel-gallery-item-<?php echo get_the_ID() . '-' . esc_attr($unique_id); ?>]" href="<?php echo esc_url($featured); ?>" title="<?php echo get_the_title(get_the_ID()); ?>"></a>

  <?php  } ?>

    <?php foreach ($media as $key => $single_media) {
    $link_class = '';

    //if not image media type
    if ($single_media['type'] !== 'image'){
        continue;
    }

    if (is_array($single_media['image_src'])){
        $image_src = $single_media['image_src'][0];
    } else {
        $image_src = $single_media['image_src'];
    }

    if(empty($featured) && $key == 0) {
        $link_class = "qodef-pli-link";
    } ?>

    <a itemprop="url" <?php dessau_select_class_attribute($link_class);?> data-rel="prettyPhoto[rel-gallery-item-<?php echo get_the_ID() . '-' . esc_attr($unique_id); ?>]" href="<?php echo esc_url($image_src); ?>" title="<?php echo get_the_title(get_the_ID()); ?>"></a>
</article>
<?php }
}