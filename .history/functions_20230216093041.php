<?php

function university_files() {
    wp_enqueue_style('university_main_styles', get_theme_fileuri('/build'));
}

add_action('wp_enqueue_scripts', 'university_files');