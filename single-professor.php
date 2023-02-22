<!-- this name is important -->
<?php
// call these functions from functions.php
get_header();
while (have_posts()) {

  the_post();
  pageBanner();
  ?>

    

<!-- resize the image and have the text next to it two-column style -->
    <div class="container container--narrow page-section">
    <div class="generic-content">
        <div class="row group">
            <div class="one-third">
            <?php the_post_thumbnail("professorPortrait"); ?>
            </div>
            <div class="two-thirds">
            <?php the_content(); ?>
            </div>
        </div>
    </div>

    <?php
    $relatedPrograms = get_field("related_programs");

    // this is the code that will display the related programs on the single professor page
    if (get_field("related_programs")) {
      foreach ($relatedPrograms as $program) { ?>
          <hr class="section-break">
          <h2 class="headline headline--medium">Subject(s) Taught</h2>
          <ul class="link-list min-list">
            <li><a href="<?php echo get_the_permalink(
              $program
            ); ?>"><?php echo get_the_title($program); ?></a></li>
          </ul>
          <?php }
    }
    ?>

  <?php
}

get_footer();


?>
