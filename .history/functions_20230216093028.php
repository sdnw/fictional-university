<?php

function university_files() {
    wp_enqueue_style('university_main_styles', get_theme);
}

add_action('wp_enqueue_scripts', 'university_files');