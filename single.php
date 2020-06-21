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
			$sIstaknutaSlika = get_template_directory_uri(). '/img/5.jpg';
    	}
    }
}

$sPostNaziv = get_the_title( $post->ID );
$sObjavaAutor = get_bloginfo();
$sObjavaDatum = get_the_date( $format,$post->ID );
?>

<div id="team" class="our-team-area area-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline text-center">
            <h2 id="team-title"><?php echo $post->post_title ?></h2>
            <div class="entry-meta">
          		<span class="author-meta"><i class="fa fa-user"></i> <a href="#"><?php echo $sObjavaAutor ?></a></span>
          		<span><i class="fa fa-clock-o"></i> <?php echo $sObjavaDatum ?></span>
        	</div>
          </div>
        </div>
      </div>
  </div>
</div>
<div id="about" class="about-area team-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="well-left">
            <div class="center">
				      <img src="<?php echo $sIstaknutaSlika ?>" alt="">
            </div>
          </div>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="well-middle">
            <div class="single-well">
            	<br>
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