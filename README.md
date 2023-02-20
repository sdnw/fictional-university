# fictional-university

How to get started
- have local installed
- start new project to install wordpress
- when you pull this custom theme, add it to wp-content folder along with other themes
- in WP Admin
    - go to appearance > themes, this custom theme should be in there
- to import the pages and posts
    - go to tools > import > click WordPress (install if needed) > click "Run Importer" > select .xml file to import
- to export the pages and posts
    - go to tools > export > click All content > Download Export File > add to root of theme file
- you should be ready to after that!


custom fields
- mu-themes folder isn't tracked by git as it is outside our custom theme folder. 
- in wp-content we have a university-plugins.php folder so if our custom theme was to be swapped with something else, we would still keep our custom post-types. here is the code in case we need to make our own mu-themes folder, the file name was university-plugins.php

```
<?php

function university_post_types() {
    register_post_type('event', array(
        'public' => true,
        'labels' => array(
            'name' => 'Events'
        ),
        'menu_icon' => 'dashicons-calendar'
    ));
}
add_action('init', 'university_post_types');

?>
```