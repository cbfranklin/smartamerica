<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie ie6 no-js" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 no-js" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 no-js" lang="en"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 no-js" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" <?php language_attributes() ?>><!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">	
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:title" content="<?php bloginfo('name'); ?> | <?php is_home() ? bloginfo('description') : wp_title(''); ?>">
    <meta property="og:image" content="<?php bloginfo('template_url'); ?>/images/logo.png">
    <meta property="og:type" content="Website">
    <meta property="og:url" content="http://smartamerica.org">
    <title><?php wp_title(' '); ?><?php if(wp_title(' ', false)) { echo ' &raquo; '; } ?><?php bloginfo('name'); ?></title>
	<link rel="shortcut icon" href="<?php bloginfo('template_url') ?>/images/favicon.ico">
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS2 Feed" href="<?php bloginfo('rss2_url'); ?>">  
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">  
	<link rel="stylesheet" href="<?php bloginfo('template_url') ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php bloginfo('template_url') ?>/css/all.css">
    <script id="_fed_an_js_tag" type="text/javascript" src="http://m.gsa.gov/m/external/resources/js/dap.js?agency=GSA"></script>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-45177624-2', 'smartamerica.org');
        ga('send', 'pageview');

    </script>​
    <?php wp_head(); ?>
</head>  
<body <?php body_class(); ?>>
    <section id="splash">
        <div class="container">
            <header id="logo">
                <a class="col-md-4 pull-left" href="<?php bloginfo('url')?>"><img class="img-responsive" src="<?php
                    bloginfo('template_url'); ?>/images/logo.png" alt="Smart America Logo"></a>
                <div id="smartAmerica-search" class="pull-right">
                    <?php get_search_form(); ?>
                </div>
            </header>
        </div>
        <nav class="navbar navbar-default" id="main-nav" role="navigation">
            <div class="container">
                <button class="mobile-menu visible-xs btn ">Menu </button>
                <?php  $defaults = array(
                        'theme_location'  => 'main_nav',
                        'container'       => false,
                        'menu_class'      => false,
                        'items_wrap'      => '<ul class="nav navbar-nav pull-left">%3$s</ul>'
                    );  wp_nav_menu( $defaults ); ?>
                <?php  $defaults = array(
                    'theme_location'  => 'aside_nav',
                    'container'       => false,
                    'menu_class'      => false,
                    'items_wrap'      => '<ul class="nav navbar-nav pull-right">%3$s</ul>'
                );  wp_nav_menu( $defaults ); ?>
                <div class="clearfix"></div>
            </div>
        </nav>
        <?php if ( is_front_page()) { ?>
            <div class="container" id="robot-wrap">
                <img class="hidden-xs img-responsive" id="robot-left" src="<?php bloginfo('template_url');?>/images/robot-left.png" alt="">
                <img class="hidden-xs img-responsive" id="robot-right" src="<?php bloginfo('template_url');?>/images/robot-right.png" alt="">
                <div class="hero col-md-7 col-lg-6 col-md-offset-3 " id="jumbotron">
                    <?php if ( have_posts() ) :
                        while ( have_posts() ) : the_post(); ?>

                            <?php if (get_field( "page_link_hero" )) { ?>
                                <h1><a href="<?php the_field( "page_link_hero" )?>"><?php the_title();?></a></h1>
                            <?php } else { ?>
                                <h1><?php the_title();?></h1>
                            <?php } ?>
                                 <?php the_content();?>
                        <?php endwhile; ?>
                    <?php endif;?>
                </div>
            </div>
        <?php } ?>
    </section>







