<?php if(dessau_select_core_plugin_installed()) { ?>
    <div class="qodef-blog-like">
        <?php if( function_exists('dessau_select_get_like') ) dessau_select_get_like(); ?>
    </div>
<?php } ?>