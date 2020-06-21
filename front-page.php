<?php
  get_header();
?>
<?php
if ( have_posts() )
{
  while ( have_posts() )
  {
    the_post();
    $sIstaknutaSlika = "";
    if( get_the_post_thumbnail_url($post->ID) )
    {
      $sIstaknutaSlika = get_the_post_thumbnail_url($post->ID);
    }
    else
    {
      $sIstaknutaSlika = get_template_directory_uri(). '/img/pocetna.jpg';
    }
  }
}

?>

  <div id="home" class="slider-area">
      <div>
        <img id="background" src="<?php echo $sIstaknutaSlika ?>" />
      </div>
      <div class="jumbotron">
        <h1><?php echo $post->post_title ?></h1>
        <div>
          <p><?php echo $post->post_content ?></p>
        </div>
      </div>

  <div id="team" class="our-team-area area-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline text-center">
            <h2>Naš tim</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="team-top">
          <?php echo daj_tim(); ?>
        </div>
      </div>
    </div>
  </div>

  <div id="portfolio" class="portfolio-area area-padding fix">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline text-center">
            <h2>Naši dosadašnji radovi</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="awesome-project-content">
          <?php echo daj_portfolio(); ?>
        </div>
      </div>
    </div>
  </div>
  </div>
</div>

<?php get_footer(); ?>