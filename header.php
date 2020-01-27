<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	
	<title> <?php bloginfo('title'); ?></title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    
           
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header>
		<nav class="container-fluid navbar navbar-ct-transparent navbar-expand-lg fixed-top" role="navigation-demo" id="demo-navbar">
            <div class="container wrapper-nav">
            <a class="navbar-brand" href="<?php echo esc_url( home_url('/') ); ?>">

				<?php
            
                    $options = get_option( 'nf_theme_options' );
						if(isset($options['logo'])):
                
                ?>
					<img src="<?php echo $options['logo'] ?>" alt="logo">
						<?php else: ?>
							<?php bloginfo('name'); ?>
						<?php endif; ?>

			</a>
    

<!--    navbar come here          -->

<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon">
                <i class="fas fa-bars"></i>
              </span>
            </button>
                <?php
                    $args = array(
                       'menu_class' => 'navbar-nav',
                       'container_id' => 'navbarNav',
                       'container_class' => 'collapse navbar-collapse',
                       'theme_location' => 'main_menu',
                       'add_li_class' => 'nav-item'


                      );
                      wp_nav_menu($args);
                ?>

            </div>
          </nav>


<!-- end navbar  -->
<!-- hero section -->

<div class="demo-header demo-header-image">
            <div class="motto">
                <h1 class="title-uppercase">Nutri Facts</h1>
                <h3>Check your products' Nutrifacts</h3>
            </div>
</div>

<!-- end hero section -->

</header>