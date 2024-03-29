# fictional-university

**_IMPORTANT: make sure to use git in the wordpress install itself so it can keep track of things like `wp-content` which has folders we need outside of the custom theme like `mu-plugins` and plugins from wp itself. Also make sure to update the .xml file before taking this home too_**

plugins installed

- Advanced Custom Fields
- Wordpress Importer
- Manual Image Crop
- Regenerative Thumbnails

How to get started

- have local installed
- start new project to install wordpress
- when you pull this custom theme, add it to `wp-content` folder along with other themes
- in WP Admin
  - go to appearance > themes, this custom theme should be in there
- to import the pages and posts
  - go to tools > import > click WordPress (install if needed) > click "Run Importer" > select .xml file to import
- to export the pages and posts
  - go to tools > export > click All content > Download Export File > add to root of theme file
- you should be ready to after that

Custom Fields

- `mu-plugins` folder isn't tracked by git as it is outside our custom theme folder.
- in `wp-content` we need to have a folder called `mu-plugins` (name is required) so if our custom theme was to be swapped with something else, we would still keep our custom post-types. here is the code in case we need to make another folder the file name is `university-post-types.php` (name on this doesn't matter)

```
<?php

function university_post_types()
{
  // Campus post type
  register_post_type("campus", [
    "capability_type" => "campus",
    "map_meta_cap" => true,
    "show_in_rest" => true,
    "supports" => ["title", "editor", "excerpt"],
    "rewrite" => ["slug" => "campuses"],
    "has_archive" => true,
    "public" => true,
    "show_in_rest" => true,
    "labels" => [
      "name" => "Campuses",
      "add_new_item" => "Add New Campus",
      "edit_item" => "Edit Campus",
      "all_items" => "All Campuses",
      "singular_name" => "Campus",
    ],
    "menu_icon" => "dashicons-location-alt",
  ]);

  // Event post type
  register_post_type("event", [
    "capability_type" => "event",
    "map_meta_cap" => true,
    "show_in_rest" => true,
    "supports" => ["title", "editor", "excerpt"],
    "rewrite" => ["slug" => "events"],
    "has_archive" => true,
    "public" => true,
    "show_in_rest" => true,
    "labels" => [
      "name" => "Events",
      "add_new_item" => "Add New Event",
      "edit_item" => "Edit Event",
      "all_items" => "All Events",
      "singular_name" => "Event",
    ],
    "menu_icon" => "dashicons-calendar",
  ]);

  // Program post type
  register_post_type("program", [
    "show_in_rest" => true,
    "supports" => ["title"],
    "rewrite" => ["slug" => "programs"],
    "has_archive" => true,
    "public" => true,
    "show_in_rest" => true,
    "labels" => [
      "name" => "Programs",
      "add_new_item" => "Add New Program",
      "edit_item" => "Edit Program",
      "all_items" => "All Programs",
      "singular_name" => "Program",
    ],
    "menu_icon" => "dashicons-awards",
  ]);

  // Profressor post type
  register_post_type("professor", [
    "show_in_rest" => true,
    "supports" => ["title", "editor", "thumbnail"],
    "public" => true,
    "show_in_rest" => true,
    "labels" => [
      "name" => "Professors",
      "add_new_item" => "Add New Professor",
      "edit_item" => "Edit Professor",
      "all_items" => "All Professors",
      "singular_name" => "Professor",
    ],
    "menu_icon" => "dashicons-welcome-learn-more",
  ]);

  // Note Post Type
  register_post_type('note', array(
    // 'capability_type' => 'note',
    // 'map_meta_cap' => true,
    'show_in_rest' => true,
    'supports' => array('title', 'editor'),
    'public' => false,
    'show_ui' => true,
    'labels' => array(
      'name' => 'Notes',
      'add_new_item' => 'Add New Note',
      'edit_item' => 'Edit Note',
      'all_items' => 'All Notes',
      'singular_name' => 'Note'
    ),
    'menu_icon' => 'dashicons-welcome-write-blog'
  ));
}
add_action("init", "university_post_types");

?>


```

If you get lost and don't know which template file is controlling the front end use this code in `functions.php` to print the working directory in the header:

```
add_action('wp_head', 'show_template');
function show_template() {
  global $template;
  print_r($template);
}
```
