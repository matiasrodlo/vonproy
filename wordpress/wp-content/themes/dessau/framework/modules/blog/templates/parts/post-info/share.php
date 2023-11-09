<?php
$share_type = isset($share_type) ? $share_type : 'list';
?>
<?php if ( dessau_select_core_plugin_installed() && dessau_select_options()->getOptionValue('enable_social_share') === 'yes' && dessau_select_options()->getOptionValue('enable_social_share_on_post') === 'yes' ) { ?>
    <div class="qodef-blog-share">
		<?php echo dessau_select_get_social_share_html(array('type' => $share_type)); ?>
    </div>
<?php } ?>