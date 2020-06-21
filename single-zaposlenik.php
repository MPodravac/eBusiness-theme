<?php get_header(); ?>

<?php
if ( have_posts() )
{
	while ( have_posts() )
	{
		the_post();

		$sIstaknutaSlika = "";
	
    	$oUloge = wp_get_post_terms( $post->ID, 'uloga_zaposlenika' );
    	$sUloga = "-";
    	if(sizeof($oUloge)>0)
    	{
    	  $sUloga = $oUloge[0]->name;
    	}
	
		if( get_the_post_thumbnail_url($post->ID) )
		{
			$sIstaknutaSlika = get_the_post_thumbnail_url($post->ID);
		}
		else
		{
			$sIstaknutaSlika = get_template_directory_uri(). '/img/team/user.jpg';
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
            <h4><?php echo $sUloga ?></h4>
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