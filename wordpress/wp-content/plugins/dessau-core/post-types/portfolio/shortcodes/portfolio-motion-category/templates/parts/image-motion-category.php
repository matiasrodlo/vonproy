<?php
$thumb_size = $this_object->getImageSize($params);
?>

<?php if ( has_post_thumbnail() ) {
	$image_src = get_the_post_thumbnail_url( get_the_ID() );

} else {
	$image_src = '<img itemprop="image" class="qodef-pl-original-image" width="800" height="600" src="' .  DESSAU_CORE_CPT_URL_PATH . '/portfolio/assets/img/portfolio_featured_image.jpg" alt="' . esc_html_e('Portfolio Featured Image', 'qodef-core') . '" />';
} ?>

<div class="qodef-pli-image" style="background-image: url(<?php echo esc_url($image_src); ?>)"></div>