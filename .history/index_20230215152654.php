<?php

    while(have_posts()) {
        the_post(); ?>
        <h2><?php the_title(); ?></h2>
        <?php the_content(); ?>
    <?php }

?>

//q: why is the link showing in the h2 tag?$_COOKIE