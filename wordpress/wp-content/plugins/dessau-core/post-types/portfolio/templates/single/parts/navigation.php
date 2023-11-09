<?php if(dessau_select_options()->getOptionValue('portfolio_single_hide_pagination') !== 'yes') : ?>
    <?php
    $back_to_link = get_post_meta(get_the_ID(), 'portfolio_single_back_to_link', true);
    $nav_same_category = dessau_select_options()->getOptionValue('portfolio_single_nav_same_category') == 'yes';
    $imgPrev = get_the_post_thumbnail(get_previous_post());
    $imgNext = get_the_post_thumbnail(get_next_post());
    ?>
    <div class="qodef-ps-navigation">
        <?php if(get_previous_post() !== '') : ?>
            <div class="qodef-ps-prev">
                <?php if($nav_same_category) {
	                previous_post_link('%link','<span class="qodef-ps-nav-mark icon-arrows-left"></span><span class="qodef-ps-nav-title">%title</span>', true, '', 'portfolio-category');
                } else {
	                previous_post_link('%link','<span class="qodef-ps-nav-mark icon-arrows-left"></span><span class="qodef-ps-nav-title">%title</span>');
                } ?>
            </div>
        <?php endif; ?>

        <?php if($back_to_link !== '') : ?>
            <div class="qodef-ps-back-btn">
                <a itemprop="url" href="<?php echo esc_url(get_permalink($back_to_link)); ?>">
                    <span class="qodef-ps-back-btn-icon">
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                             width="35.517px" height="35.517px" viewBox="0 0 35.517 35.517" enable-background="new 0 0 35.517 35.517">
                        <rect width="1.438" height="35.517"/>
                        <rect y="34.042" width="35.517" height="1.475"/>
                        <rect x="34" width="1.517" height="35.517"/>
                        <rect width="35.517" height="1.406"/>
                        <rect x="21.125" y="9.063" width="13.234" height="1.5"/>
                        <rect x="21.125" y="1.083" width="1.422" height="33.875"/>
                        </svg>
                    </span>
                </a>
            </div>
        <?php endif; ?>

        <?php if(get_next_post() !== '') : ?>
            <div class="qodef-ps-next">
                <?php if($nav_same_category) {
                    next_post_link('%link', '<span class="qodef-ps-nav-title">%title</span><span class="qodef-ps-nav-mark icon-arrows-right"></span>', true, '', 'portfolio-category');
                } else {
                    next_post_link('%link', '<span class="qodef-ps-nav-title">%title</span><span class="qodef-ps-nav-mark icon-arrows-right"></span>');
                } ?>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>