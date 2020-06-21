<?php get_header(); ?>

<div id="portfolio" class="portfolio-area area-padding fix">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline text-center">
            <h2>Naš Portfolio</h2>
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

<?php get_footer(); ?>