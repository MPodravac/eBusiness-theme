<?php
	get_header();
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
						$sIstaknutaSlika = get_template_directory_uri(). '/img/1.jpg';
    				}
      			    echo '<div class="col-md-3 col-sm-3 col-xs-12">
            				<div class="single-blog">
              					<div class="single-blog-img">
               						<a href="blog.html">
										<img src="'.$sIstaknutaSlika.'" alt="">
									</a>
              					</div>
              					<div class="blog-text">
               						<h4><a href="'.$post->guid.'">'.$post->post_title.'</a></h4>
              					</div>
            				</div>
          				</div>';
      			  }
      			}
    		?>					
        </div>
        <div class="col-md-3 col-sm-3 col-xs-12">
          <?php dynamic_sidebar('glavni-sidebar') ?>
        </div>
      </div>
    </div>
  </div>
                
 <?php get_footer(); ?>