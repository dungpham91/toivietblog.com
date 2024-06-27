<?php

/*********************************************************************
 * Function insert button Recommended, Tips, Warning, Note to editor
 *********************************************************************/
add_action('init', 'db_custom_shortcode_button_init_callback');
function db_custom_shortcode_button_init_callback() {
    if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') && get_user_option('rich_editing') == 'true') {
        return;
    }
    add_filter("mce_external_plugins", "db_custom_register_tinymce_plugin_callback");
    add_filter('mce_buttons', 'db_custom_add_tinymce_button_callback');
}

function db_custom_register_tinymce_plugin_callback($plugin_array) {
    // get_template_directory_uri().'/assets/custom_editor.js';
    // plugins_url().'/custom-tinymce-buttons/assets/custom_editor.js';
    $plugin_array['custom_mce_editor_js'] = get_stylesheet_directory_uri().'/js/tinymce-editor/custom_editor.js';
    return $plugin_array;
}

function db_custom_add_tinymce_button_callback($buttons) {
    $buttons[] = "button_note";
    $buttons[] = "button_warning";
    $buttons[] = "button_recommended";
    $buttons[] = "button_tips";
    return $buttons;
}
