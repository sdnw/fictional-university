<!-- this file name is important
    no google maps api key bc google sucks
-->


<?php
get_header();
pageBanner([
  "title" => "Our Campuses",
  "subtitle" => "We have several conveniently located campuses.",
]);
?>


    <div class="container container--narrow page-section">
      <ul class="link-list min-list">
      <?php while (have_posts()) {
        the_post(); ?>
        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
      <?php
      } ?>
        </ul>

  <?php get_footer();

?>
