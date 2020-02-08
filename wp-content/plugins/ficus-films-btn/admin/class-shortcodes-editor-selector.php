<?php

/**
 * Class Shortcodes_Editor_Selector.
 *
 * Creates a button to the wordpress TinyMCE editor to add shortcodes easily.
 */

if( ! class_exists('Shortcodes_Editor_Selector' ) ):

class Shortcodes_Editor_Selector {

    /**
     * The unique identifier of the new TinyMCE button.
     *
     * Its name in editor aria is 'Films'
     */
    public $buttonName = 'ShortcodeSelector';

    /**
     * Adds new 'external_plugins' and new toolbar1 'ShortcodeSelector button
     * to TinyMCE WordPress initialization.
     */
    public function addSelector(){
        // if the current user has permissions
        if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
            return;
        // add only in Rich Editor mode
        if ( get_user_option('rich_editing') == 'true') {
            add_filter('mce_external_plugins', array($this, 'registerTmcePlugin'));
            add_filter('mce_buttons', array($this, 'registerButton')); // add our button in the first toolbar
        }
    }

    /**
     * Adds new button 'Films' in the hole TinyMCE buttons array.
     *
     * @param $buttons
     * @return mixed
     */
    public function registerButton($buttons){
        array_push($buttons, $this->buttonName);
        return $buttons;
    }

    /**
     * Adds new external 'ShortcodeSelector' plugin to TinyMCE Editor.
     *
     * @param $plugin_array
     * @return mixed
     */
    public function registerTmcePlugin($plugin_array){
        $plugin_array[$this->buttonName] = plugins_url() . '/ficus-films-btn/admin/editor_plugin.js.php';
        if ( get_user_option('rich_editing') == 'true')
        return $plugin_array;
    }
}

endif;

if( ! isset( $shortcodesES ) ) {
    $shortcodesES = new Shortcodes_Editor_Selector();
    add_action( 'admin_head', array($shortcodesES, 'addSelector') );
}