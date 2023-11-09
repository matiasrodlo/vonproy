<form role="search" method="get" class="searchform" id="searchform-<?php echo esc_attr(rand(0, 1000)); ?>" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="screen-reader-text"><?php esc_html_e( 'Search for:', 'dessau' ); ?></label>
	<div class="input-holder clearfix">
		<input type="search" class="search-field" placeholder="<?php esc_attr_e( 'Search...', 'dessau' ); ?>" value="" name="s" title="<?php esc_attr_e( 'Search for:', 'dessau' ); ?>"/>
		<button type="submit" class="qodef-search-submit"><?php echo dessau_select_icon_collections()->renderIcon( 'lnr-magnifier', 'linear_icons' ); ?></button>
	</div>
</form>