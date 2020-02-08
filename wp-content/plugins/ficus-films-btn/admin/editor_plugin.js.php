<?php

/**
 * ShortcodeSelector TinyMCE External Plugin.
 *
 * Gets CPT 'films' post id and post title from database.
 * Outputs pop-up with films titles for choosing and shortcode inserting.
 */

require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-load.php' );
global $wpdb;
// get all post ID and post title for CPT 'films' from database
$rows = $wpdb->get_results(
    "SELECT ID, post_title
            FROM ficus_posts
            WHERE post_type =  'films'
            AND post_status =  'publish'"
);
// compose string from javascript objects {key: 'value'}
$films_list = '';
foreach ($rows as $row){
    $films_list .= "{text: '" . $row->post_title . "', value: '" . $row->ID . "' },";
}
// create film names list array for pop-up in TinyMCE
$films_list = "[" . $films_list . "]";

?>

(function() {
    tinymce.PluginManager.add( 'ShortcodeSelector', function(editor, url) { // see Shortcodes_Editor_Selector class
        editor.addButton( 'ShortcodeSelector', { // 'Films' button id = new external plugin id 'ShortcodeSelector'
            text: 'Films', // button name in TinyMCE
            tooltip: 'Choose Film', // tooltip on 'Films' button hover
            icon: false,
            onclick: function() {
                editor.windowManager.open({
                    title: 'Choose Film', // pop-up window title
                    body: [{
                        type   : 'listbox', // type and name must be the same
                        name   : 'listbox',
                        minWidth: 400, // pop-up window min width
                        values : <?php echo $films_list; ?>,
                    }],
                    onsubmit: function( e ) {
                        editor.insertContent(
                            '[films id="' + e.data.listbox + '"]'); // make shortcode for selected film
                    }

                });
            }
        })
    });
})();
