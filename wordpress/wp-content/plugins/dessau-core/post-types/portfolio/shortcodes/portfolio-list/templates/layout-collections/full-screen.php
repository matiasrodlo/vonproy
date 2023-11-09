<?php
$image_src   = get_the_post_thumbnail_url( get_the_ID() );
$image_style = ! empty( $image_src ) ? 'background-image:url(' . esc_url( $image_src ) . ')' : '';
$categories  = wp_get_post_terms(get_the_ID(), 'portfolio-category');
$tags        = wp_get_post_terms(get_the_ID(), 'portfolio-tag');
$share_on    = dessau_select_options()->getOptionValue('enable_social_share') == 'yes' && dessau_select_options()->getOptionValue('enable_social_share_on_portfolio-item') == 'yes';
?>
<div class="qodef-pli-image" <?php dessau_select_inline_style($image_style); ?>></div>
<div class="qodef-pli-text-holder">
	<div class="qodef-pli-text-wrapper">
		<div class="qodef-pli-text">
			<div class="qodef-pli-text-inner">
				<a class="qodef-pli-up-arrow" href="#"><i class="fa fa fa-chevron-up"></i></a>
				<h2 itemprop="name" class="qodef-pli-title entry-title"><a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php echo esc_attr( get_the_title() ); ?></a></h2>
				
				<div class="qodef-pli-category">
					<?php foreach ( $categories as $cat ) { ?>
                        <a itemprop="url" href="<?php echo esc_url( get_term_link( $cat->term_id ) ); ?>"><?php echo esc_html( $cat->name ); ?></a>
					<?php } ?>
                </div>
				
				<div class="qodef-pli-info-holder">
					<?php echo dessau_core_get_cpt_shortcode_module_template_part('portfolio', 'portfolio-list', 'parts/excerpt', $item_style, $params); ?>

                    <?php if ( ! empty( $categories ) ) { ?>
						<div class="qodef-pli-category-info qodef-pli-info">
							<h5 class="qodef-pli-info-title"><?php esc_html_e( 'Category:', 'dessau' ); ?></h5>
							<p>
								<?php foreach ( $categories as $cat ) { ?>
									<a itemprop="url" href="<?php echo esc_url( get_term_link( $cat->term_id ) ); ?>"><?php echo esc_html( $cat->name ); ?></a>
								<?php } ?>
							</p>
						</div>
					<?php } ?>
					
					<div class="qodef-pli-date-info qodef-pli-info">
						<h5 class="qodef-pli-info-title"><?php esc_html_e( 'Date:', 'dessau' ); ?></h5>
						<p><?php the_time( get_option( 'date_format' ) ); ?></p>
					</div>
					
					<?php if ( ! empty( $tags ) ) { ?>
						<div class="qodef-pli-tag-info qodef-pli-info">
							<h5 class="qodef-pli-info-title"><?php esc_html_e( 'Tag:', 'dessau' ); ?></h5>
							<p>
								<?php foreach ( $tags as $tag ) { ?>
									<a itemprop="url" href="<?php echo esc_url( get_term_link( $tag->term_id ) ); ?>"><?php echo esc_html( $tag->name ); ?></a>
								<?php } ?>
							</p>
						</div>
					<?php } ?>
					
					<?php if ( $share_on ) { ?>
						<div class="qodef-pli-share-info qodef-pli-info">
							<h4 class="qodef-pli-share-title"><?php esc_html_e( 'Share', 'dessau' ); ?></h4>
							<?php echo dessau_select_get_social_share_html() ?>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>