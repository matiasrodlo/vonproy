<?php if($filter == 'yes') {
	$filter_categories    = $this_object->getFilterCategories($params);
	$filter_holder_styles = $this_object->getFilterHolderStyles($params);
	$filter_styles        = $this_object->getFilterStyles($params);
	?>
	<div class="qodef-pl-filter-holder" <?php dessau_select_inline_style($filter_holder_styles); ?>>
		<div class="qodef-plf-inner">
			<?php
			if(is_array($filter_categories) && count($filter_categories)){ ?>
                <div class="qodef-pl-filter-parent">
                    <ul <?php dessau_select_inline_style($filter_styles); ?>>
                        <li class="qodef-pl-filter parent-filter" data-filter="" data-group-id="-1">
                            <span><?php esc_html_e('Show all', 'dessau-core')?></span>
                        </li>
                        <?php foreach($filter_categories as $cat) {
	                        $child_params = array_merge($params,array('category' => $cat->slug));
	                        $child_categories = $this_object->getFilterCategories($child_params);
                            $children = array();

                            foreach($child_categories as $podCat) {
                                $children[] = '.portfolio-category-' . $podCat->slug;
                            }
                            $all_array = implode(', ', $children);

                            $filter_cat = '.portfolio-category-'.esc_attr($cat->slug);

                            if ($all_array !== '') {
                                $filter_cat .= ', '.$all_array;
                            }

                            if ($cat->parent == 0 ) {?>
                                <li class="qodef-pl-filter parent-filter" data-filter="<?php echo esc_attr($filter_cat); ?>" data-group-id="<?php echo esc_attr($cat->term_id); ?>">
                                    <span><?php echo esc_html($cat->name); ?></span>
                                </li>
                            <?php } ?>
                        <?php } ?>
                    </ul>
                </div>
                <div class="qodef-pl-filter-child">
	                <?php foreach($filter_categories as $cat) {

                        $child_params = array_merge($params,array('category' => $cat->slug));

                        $child_categories = $this_object->getFilterCategories($child_params);

                        if(is_array($child_categories) && count($child_categories)){ ?>
                            <ul class="qodef-pl-filter-child-categories" data-parent-id="<?php echo esc_attr($cat->term_id); ?>">
	                        <?php
                                $children = array();
                                foreach($child_categories as $podCat) {
                                    $children[] = '.portfolio-category-' . $podCat->slug;
                                }
                                $all_array = implode(', ', $children); ?>
                                    <li class="qodef-pl-filter" data-filter=".portfolio-category-<?php echo esc_attr($cat->slug); ?>,<?php print esc_attr($all_array); ?>">
                                        <span><?php esc_html_e('All', 'dessau-core')?></span>
                                    </li>

	                            <?php foreach($child_categories as $cat) { ?>
                                    <li class="qodef-pl-filter" data-filter=".portfolio-category-<?php echo esc_attr($cat->slug); ?>">
                                        <span><?php echo esc_html($cat->name); ?></span>
                                    </li>
	                            <?php } ?>
                            </ul>
                        <?php }?>
                        <?php } ?>
                </div>
			<?php } ?>
		</div>
	</div>
<?php } ?>
