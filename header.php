<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <link rel="alternate" type="application/rss+xml" title="RSS2.0" href="<?php bloginfo('rss2_url'); ?>" />
        <title><?php bloginfo('name'); ?></title>
        <meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
        <meta name="description" content="<?php bloginfo('description'); ?>">
        <?php wp_head(); ?>
    </head>

    <body>

        <!-- Container -->

        <div class="container">

            <!-- Barra de navegação -->


            <div class="navbar">
                <div class="navbar-inner">
                    <div style="width: auto;" class="container">

                        <!-- Opções de Menu -->

                        <a href="<?php echo home_url() ?>" class="brand">Logo</a>
                        <div class="nav-collapse">
                            <?php
                            wp_nav_menu(
                                    array(
                                        'menu' => 'menu_principal',
                                        'menu_class' => 'nav')
                            );
                            ?>

                            <!-- Formulário de pesquisa -->


                            <?php echo tw_search_form() ?>

                            <!-- Opções de menu -->
                            <ul class="nav pull-right">
                                <li class="divider-vertical"></li>
                                <li class="dropdown">
                                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">Opções <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Ação 1</a></li>
                                        <li><a href="#">Ação 2</a></li>
                                        <li><a href="#">Ação 3</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Logout</a></li>
                                    </ul>
                                </li>
                            </ul>

                        </div><!-- /.nav-collapse -->
                    </div>
                </div><!-- /navbar-inner -->
            </div>

            <!-- Topo -->

<div class="row-fluid">
  <div class="hero-unit">
  <img src="https://treinaweb-assets.s3.amazonaws.com/img/site/logo/treinaweb-index.png" alt="TreinaWeb Cursos" >
  <p>    Seja bem vindo ao tema/blog desenvolvido do zero no  curso de  <a href="https://www.treinaweb.com.br/curso/wordpress-desenvolvimento-de-temas" target="_blank">dessenvolvimento de temas Wordpress</a> da  <b>TreinaWeb Cursos</b>!</p>
  </div>
</div>

            <div class="row-fluid">