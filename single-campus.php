<!-- this name is important -->
<?php
get_header();

while (have_posts()) {

  the_post();
  pageBanner();
  ?>

    <div class="container container--narrow page-section">
        <div class="metabox metabox--position-up metabox--with-home-link">
        <p>
          <a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link(
            "campus"
          ); ?>">
          <i class="fa fa-home" aria-hidden="true"></i> All Campuses</a> 
          <span class="metabox__main"><?php the_title(); ?></span>
        </p>
      </div>
    <div class="generic-content"><?php the_content(); ?></div>

    <!-- custom query for related professors in single program page -->
    <?php
    $relatedPrograms = new WP_Query([
      "posts_per_page" => -1,
      "post_type" => "program",
      "orderby" => "title",
      "order" => "ASC",
      "meta_query" => [
        [
          "key" => "related_campus",
          "compare" => "LIKE",
          // search for a value in a serialized array
          "value" => '"' . get_the_ID() . '"',
        ],
      ],
    ]);
    if ($relatedPrograms->have_posts()) {
      echo '<hr class="section-break">';
      echo '<h2 class="headline headline--medium">Programs Available at This Campus</h2>';

      // loop through the custom query to show related professors, show their image and name
      echo '<ul class="min-list link-list">';
      while ($relatedPrograms->have_posts()) {
        $relatedPrograms->the_post(); ?>
            <li>
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </li>
          <?php
      }
    }
    echo "</ul>";
    // reset the global post object (so that the rest of the page works correctly/upcoming events comes back)
    wp_reset_postdata();

      ?>
    <?php
    }
    ?>
    </div>

    <?php
get_footer();
?>
