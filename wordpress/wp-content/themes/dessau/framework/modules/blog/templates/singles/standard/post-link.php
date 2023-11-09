<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="qodef-post-content">
        <div class="qodef-post-text">
            <div class="qodef-post-mark">
                <span class="icon_link_alt qodef-link-mark"></span>
            </div>
            <div class="qodef-post-text-inner">
                <div class="qodef-post-text-main">
		            <?php dessau_select_get_module_template_part('templates/parts/post-type/link', 'blog', '', $part_params); ?>
                </div>
                <div class="qodef-post-info-top">
	                <?php dessau_select_get_module_template_part('templates/parts/post-info/author', 'blog', '', $part_params); ?>
	                <?php dessau_select_get_module_template_part('templates/parts/post-info/category', 'blog', '', $part_params); ?>
	                <?php dessau_select_get_module_template_part('templates/parts/post-info/date', 'blog', '', $part_params); ?>
	                <?php if(dessau_select_options()->getOptionValue('show_tags_area_blog') === 'yes') {
		                dessau_select_get_module_template_part('templates/parts/post-info/tags', 'blog', '', $part_params);
	                } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="qodef-post-additional-content">
        <?php the_content(); ?>
    </div>
    <div class="qodef-post-info-bottom clearfix">
        <div class="qodef-post-info-bottom-left">
			<?php dessau_select_get_module_template_part('templates/parts/post-info/share', 'blog', '', $part_params); ?>
        </div>
        <div class="qodef-post-info-bottom-right">
			<?php dessau_select_get_module_template_part('templates/parts/post-info/tags', 'blog', '', $part_params); ?>
        </div>
    </div>
</article>