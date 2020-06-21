<?php get_header(); ?>

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
			$sIstaknutaSlika = get_template_directory_uri(). '/img/team/team-1.jpg';
		}
	}
}
?>

<div id="team" class="our-team-area area-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline text-center">
            <h2 id="team-title"><?php echo $post->post_title ?></h2>
          </div>
        </div>
      </div>
     <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline text-center">
          </div>
        </div>
      </div>
  </div>
</div>
 <div class="awesome-project-1 fix">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="awesome-menu ">
              <ul class="project-menu">
                   <?php echo daj_html_usluge_portfolio($post->ID); ?>
              </ul>
            </div>
          </div>
        </div>
<div id="about" class="about-area team-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="well-left">
            <div class="single-well">
				      <img src="<?php echo $sIstaknutaSlika ?>" alt="">
            </div>
          </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="well-middle">
            <div class="single-well">
              <p>
                <?php echo $post->post_content; ?>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php get_footer(); ?>