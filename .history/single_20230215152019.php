<?php

    while(have_posts()){
        the_post(); ?>
        <h2><?php the_permalink(); ?><?php the_title(); ?></h2>
        <?php the_content(); ?>
    <?php }

?>
