<?php
$blog_single_navigation = dessau_select_options()->getOptionValue('blog_single_navigation') === 'no' ? false : true;
$blog_navigation_through_same_category = dessau_select_options()->getOptionValue('blog_navigation_through_same_category') === 'no' ? false : true;
?>
<?php if($blog_single_navigation){ ?>
    <div class="qodef-blog-single-navigation">
        <div class="qodef-blog-single-navigation-inner clearfix">
			<?php
			/* Single navigation section - SETTING PARAMS */
			$same_cat_flag = false;
			if($blog_navigation_through_same_category){
				$same_cat_flag = true;
			}
			$prevPost = get_previous_post($same_cat_flag);
			$nextPost = get_next_post($same_cat_flag);

			if(isset($prevPost) && $prevPost !== '' && $prevPost !== null){

				$post_navigation['prev']['post'] = $prevPost;

				$post_navigation['prev']['classes'] = array(
					'qodef-blog-single-nav-prev'
				);

				$image = get_the_post_thumbnail($prevPost->ID);
				$post_navigation['prev']['image'] = '';

				$post_navigation['prev']['title'] = '<p class="qodef-blog-single-nav-title">'.get_the_title($prevPost->ID).'</p>';
				$post_navigation['prev']['mark'] = '<span class="qodef-blog-single-nav-mark icon-arrows-left"></span>';

			}

			if(isset($nextPost) && $nextPost !== '' && $nextPost !== null){

				$post_navigation['next']['post'] = $nextPost;

				$post_navigation['next']['classes'] = array(
					'qodef-blog-single-nav-next'
				);

				$image = get_the_post_thumbnail($nextPost->ID);
				$post_navigation['next']['image'] = '';

				$post_navigation['next']['title'] = '<p class="qodef-blog-single-nav-title">'.get_the_title($nextPost->ID).'</p>';
				$post_navigation['next']['mark'] = '<span class="qodef-blog-single-nav-mark icon-arrows-right"></span>';

			}


			/* Single navigation section - RENDERING */
			foreach (array('prev', 'next') as $nav_type) {

				if(isset($post_navigation[$nav_type])){ ?>

                    <div class="<?php echo implode(' ', $post_navigation[$nav_type]['classes']) ?>">
                        <a itemprop="url" href="<?php echo get_permalink($post_navigation[$nav_type]['post']->ID); ?>">
							<?php
							echo wp_kses_post($post_navigation[$nav_type]['title']);
							echo wp_kses_post($post_navigation[$nav_type]['mark']);
							?>
                        </a>
                    </div>

				<?php }

			}

			?>
        </div>
    </div>
<?php } ?>