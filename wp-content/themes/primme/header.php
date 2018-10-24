<!DOCTYPE html>
<html dir="ltr" <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="SemiColonWeb" />
    <title><?php wp_title('|', true, 'right');?></title>
    <meta name="description" content="<?php bloginfo();?>">

    <!-- Stylesheets
    ============================================= -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body class="stretched">

    <!-- Document Wrapper
    ============================================= -->
    <div id="wrapper" class="clearfix">

        <!-- Header
        ============================================= -->
        <header id="header" class="transparent-header dark full-header" data-sticky-class="not-dark">

            <div id="header-wrap">

                <div class="container clearfix">

                    <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

                    <!-- Logo
                    ============================================= -->
                    <div id="logo">
                        <a href="index.html" class="standard-logo" data-dark-logo="<?php bloginfo('template_directory')?>/images/logo-dark.png"><img src="<?php bloginfo('template_directory')?>/images/logo.png" alt="Canvas Logo"></a>
                        <a href="index.html" class="retina-logo" data-dark-logo="<?php bloginfo('template_directory')?>/images/logo-dark@2x.png"><img src="<?php bloginfo('template_directory')?>/images/logo@2x.png" alt="Canvas Logo"></a>
                    </div><!-- #logo end -->

                    <!-- Primary Navigation
                    ============================================= -->
                    <?php 
                    $defaults = array( 
                        'theme_location' => 'principal-menu', 
                        'container' => 'nav', 
                        'container_id' => 'primary-menu',
                        'link_before' => '<i class="icon-home"></i>'
                        );
                    wp_nav_menu($defaults);
                    ?>
                    <nav id="primary-menu">

                        <ul>
                            <li><a href="index.html"><div><i class="icon-home"></i>Inicio</div></a>
                            </li>
                            <li><a href="contacto.html"><div><i class="icon-line2-arrow-right"></i>Inscríbete</div></a>
                            </li>
                            <li><a href="blog.html"><div><i class="icon-news"></i>Blog</div></a>
                            </li>
                            <li><a href="business/index.html"><div><i class="icon-coffee"></i>Business</div></a>
                            </li>
                        </ul>



                        <!-- Top Search
                        ============================================= -->
                        <div id="top-search">
                            <a href="#" id="top-search-trigger"><i class="icon-search3"></i><i class="icon-line-cross"></i></a>
                            <form action="search.html" method="get">
                                <input type="text" name="q" class="form-control" value="" placeholder="Escribe aquí...">
                            </form>
                        </div><!-- #top-search end -->

                    </nav><!-- #primary-menu end -->

                </div>

            </div>

        </header><!-- #header end -->