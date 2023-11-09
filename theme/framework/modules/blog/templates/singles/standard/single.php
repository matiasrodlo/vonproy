<?php

dessau_select_get_single_post_format_html( $blog_single_type );

do_action( 'dessau_select_after_article_content' );

dessau_select_get_module_template_part( 'templates/parts/single/single-navigation', 'blog' );

dessau_select_get_module_template_part( 'templates/parts/single/author-info', 'blog' );

dessau_select_get_module_template_part( 'templates/parts/single/related-posts', 'blog', '', $single_info_params );

dessau_select_get_module_template_part( 'templates/parts/single/comments', 'blog' );