<!doctype html>
<html <?php language_attributes(); ?> >
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title> <?php bloginfo( 'name' ); wp_title( '-' ); ?></title>
  <?php wp_head(); ?>
</head>

<body data-spy="scroll" data-target="#navbar-example">
  <header>
    <div class="header-area">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12">
            <nav id=navbar-navbar-default>
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                  </button>
                <?php $urlNaslovnica = get_site_url(); ?>
                <a class="navbar-brand page-scroll sticky-logo" href="<?php echo $urlNaslovnica?>">
                  <h1><span>e</span>Impress</h1>
                </a>
              </div>
                <?php $args = array(
                'theme_location'  =>  'glavni-menu',
                'menu_id'       =>  'impress-glavni-menu',
                'menu_class'    =>  'navbar-nav ml-auto',
                'container'     =>  'div',
                'container_class' =>  'collapse navbar-collapse',
                'container_id'    =>  'navbarResponsive'
                );
              wp_nav_menu( $args );
              ?>   
            </nav>
          </div>
        </div>
      </div>
    </div>
  </header>
  