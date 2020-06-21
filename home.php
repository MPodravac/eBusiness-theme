<?php get_header(); ?>

<?php
  if ( have_posts() )
  {
    while ( have_posts() )
    {
      the_post();
    }
  }
?>

  <div id="blog" class="blog-area">
    <div class="blog-inner area-padding">
      <div class="blog-overly"></div>
      <div class="container ">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>Blog</h2>
            </div>
          </div>
        </div>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <?php echo prikazi_postove(); ?>
        </div>
        <div class="col-md-3 col-sm-13 col-xs-12">
          <?php dynamic_sidebar( 'glavni-sidebar' ) ?>
        </div>
      </div>
    </div>
  </div>

<?php get_footer(); ?>