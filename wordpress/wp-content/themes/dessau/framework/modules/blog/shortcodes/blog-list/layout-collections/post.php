<li class="qodef-bl-item qodef-item-space">
	<div class="qodef-bli-inner">
		<?php if ( $post_info_image == 'yes' ) {
			dessau_select_get_module_template_part( 'templates/parts/media', 'blog', '', $params );
		} ?>
        <div class="qodef-bli-content">
	        <?php dessau_select_get_module_template_part( 'templates/parts/title', 'blog', '', $params ); ?>
            <?php if ($post_info_section == 'yes') { ?>
                <div class="qodef-bli-info">
	                <?php
                        if ( $post_info_author == 'yes' ) {
                            dessau_select_get_module_template_part( 'templates/parts/post-info/author', 'blog', '', $params );
                        }
		                if ( $post_info_category == 'yes' ) {
			                dessau_select_get_module_template_part( 'templates/parts/post-info/category', 'blog', '', $params );
		                }
                        if ( $post_info_date == 'yes' ) {
                            dessau_select_get_module_template_part( 'templates/parts/post-info/date', 'blog', '', $params );
                        }
		                if ( $post_info_comments == 'yes' ) {
			                dessau_select_get_module_template_part( 'templates/parts/post-info/comments', 'blog', '', $params );
		                }
		                if ( $post_info_like == 'yes' ) {
			                dessau_select_get_module_template_part( 'templates/parts/post-info/like', 'blog', '', $params );
		                }
		                if ( $post_info_share == 'yes' ) {
			                dessau_select_get_module_template_part( 'templates/parts/post-info/share', 'blog', '', $params );
		                }
	                ?>
                </div>
            <?php } ?>
	
	        <div class="qodef-bli-excerpt">
		        <?php dessau_select_get_module_template_part( 'templates/parts/excerpt', 'blog', '', $params ); ?>
		        <?php dessau_select_get_module_template_part( 'templates/parts/post-info/read-more', 'blog', '', $params ); ?>
	        </div>
        </div>
	</div>
</li>