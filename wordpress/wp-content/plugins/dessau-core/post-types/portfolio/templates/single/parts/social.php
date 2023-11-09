<?php if ( dessau_select_options()->getOptionValue( 'enable_social_share' ) == 'yes' && dessau_select_options()->getOptionValue( 'enable_social_share_on_portfolio-item' ) == 'yes' ) : ?>
	<div class="qodef-ps-info-item qodef-ps-social-share">
		<?php
		/**
		 * Available params type, icon_type and title
		 *
		 * Return social share html
		 */
		echo dessau_select_get_social_share_html( array( 'type'  => 'list' ) ); ?>
	</div>
<?php endif; ?>