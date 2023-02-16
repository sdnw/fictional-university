<?php

    while(have_posts()) {
        the_post(); ?>
        <h2><?php the_title_attribute(); ?></h2>
        <?php the_content(); ?>
    <?php }

?>

//q: why is the link showing in the h2 tag?
//a: because the_title() is a function that outputs the title of the post
//q: how do i not show the link in the post title?
//a: use the_title_attribute() instead of the_title()