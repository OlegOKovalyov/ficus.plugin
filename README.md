# Ficus Films Button plugin

Contributors: Oleg Kovalyov. **Ficus Films Button** is open source software.

Donate link: http://ficus.plugin/

Tags: *tinymce*, *external plugin*, *menu button*, *custom post types*, *custom taxonomies*

Requires at least: 4.4

Tested up to: 5.3.2

Stable tag: 5.3

License: GPLv2 or later

License URI: http://www.gnu.org/licenses/gpl-2.0.html


**Ficus Films Button** plugin enhances the ability of the standart built-in TinyMCE WordPress editor.

## Description

The plugin **Ficus Films Button** with class name *Ficus_Films_Btn* creates:

- `films` custom post type (CPT);

- `annum` and `genre` taxonomies for CPT `films`;

- *TinyMCE external plugin*, that controls new button `Films`;

After button `Films` is clicked the modal window *Choose Film* pops up. And now it is possible
to select the film by its title in the dropdown menu.

When the submit button `OK` is pushed the shortcode kind of `[films id=37]` appears in the *TinyMCE* aria.

On the front-end edited this way post/page you will see the CPT `films` post with such credentials:
- thumbnail,

- title,

- year,

- genre/genres,

- excerpt.


## Installation

1. Upload `ficus-films-btn.php` to the `/wp-content/plugins/` directory.

2. Activate the plugin through the 'Plugins' menu in WordPress.

3. The new button `Films` you can see now in the *TinyMCE* aria.

4. When you add CPT `films` actual data the menu *Choose Film* will appear after `Films` button was clicked.


## Screenshots

1. *TinyMCE* editor with new `Films` button:

![TinyMCE editor with new Films button](/wp-content/plugins/ficus-films-btn/admin/images/screenshot-1.jpg)

2. After you clicked on `Films` button:

![After you clicked on Films button](/wp-content/plugins/ficus-films-btn/admin/images/screenshot-2.jpg)

3. Choose the film title:

![Choose the film title](/wp-content/plugins/ficus-films-btn/admin/images/screenshot-3.jpg))

4. Result in *TinyMCE* area:

![Result in TinyMCE area](/wp-content/plugins/ficus-films-btn/admin/images/screenshot-4.jpg))