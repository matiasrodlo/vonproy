<article class="qodef-item-space <?php echo esc_attr($item_classes) ?>">
	<div class="qodef-mg-content">
		<?php if (has_post_thumbnail()) { ?>
			<div class="qodef-mg-image">
				<?php the_post_thumbnail(); ?>
			</div>
		<?php } ?>
		<div class="qodef-mg-item-outer">
			<div class="qodef-mg-item-inner">
				<div class="qodef-mg-item-content">
					<?php if(!empty($item_image)) { ?>
						<img itemprop="image" class="qodef-mg-item-icon" src="<?php echo esc_url($item_image['url'])?>" alt="<?php echo esc_attr($item_image['alt']); ?>" />
					<?php } ?>
					<?php if (!empty($item_title)) { ?>
						<<?php echo esc_attr($item_title_tag); ?> itemprop="name" class="qodef-mg-item-title entry-title"><?php echo esc_html($item_title); ?></<?php echo esc_attr($item_title_tag); ?>>
					<?php } ?>
                    <?php if(!empty($item_text) ) { ?>
                        <div class="qodef-mg-item-inner-text">
                    <?php } ?>
                        <?php if (!empty($item_text)) { ?>
                            <p class="qodef-mg-item-text"><?php echo esc_html($item_text); ?></p>
                        <?php } ?>
                        <?php if(!empty($item_link)) : ?>
                            <a itemprop="url" href="<?php echo esc_url($item_link); ?>" class="qodef-btn qodef-btn-dessau qodef-mg-item-button" target="<?php echo esc_attr($item_link_target); ?>">
                                <div class="qodef-btn-plus">
                                    <span class="qodef-btn-line-1"></span>
                                    <span class="qodef-btn-line-2"></span>
                                </div>
                            </a>
                        <?php endif; ?>
                    <?php if(!empty($item_button_label)) { ?>
                        </div>
                    <?php } ?>
				</div>
			</div>
		</div>
	</div>
</article>
