<?php
/*******************************************************************************
 * FUNÇÕES QUE INICIAL-SE COM O WP
 ******************************************************************************/
add_action('init', 'euam_init');
function euam_init() {
    euam_register_menus();
    //euam_register_post_types();
    //euam_register_taxonomies();
}

function euam_register_menus() {
    register_nav_menu('menu-primario', 'Menu Principal ( Topo )');
}

/*******************************************************************************
 * SUPORTE AO TEMA
 ******************************************************************************/
add_theme_support('menu');
add_theme_support('post-thumbnails');


/*******************************************************************************
 * CONFIGURAÇÕES DE IMAGENS
 ******************************************************************************/
add_image_size('post-thumb-euam', 1024, 800, true);



/*******************************************************************************
 * ARQUIVOS E BIBLIOTECAS CSS / JS
 ******************************************************************************/
add_action('wp_enqueue_scripts', 'euam_enqueue_scripts');

function euam_enqueue_scripts() {
    //CSS
    wp_enqueue_style('main-css', get_stylesheet_directory_uri() . '/assets/css/main.css');


    //JS
    wp_enqueue_script('jqueryMin', get_stylesheet_directory_uri() . '/assets/js/jquery-2.1.4.min.js', '', '', true);
    wp_enqueue_script('bootstrapjs', get_stylesheet_directory_uri() . '/assets/js/bootstrap.min.js', '', '', true);
   
}

//adicionando arquivo js no admin
add_action('admin_enqueue_scripts', 'load_custom_script');

function load_custom_script() {
   // wp_enqueue_script('inputmask', get_stylesheet_directory_uri() . '/assets/js/jquery.inputmask.js', array('jquery'));
    //wp_enqueue_script('buscacep', get_stylesheet_directory_uri() . '/assets/js/buscacep.js', array('jquery'));
}



/*******************************************************************************
 * INCLUDES
 ******************************************************************************/
$path_tpl = TEMPLATEPATH . '/inc/';

(file_exists($path_tpl . 'helpers/fnc_main.php')) ? include_once $path_tpl . 'helpers/fnc_main.php' : die('<h1>arquivo nao encontrado '.__LINE__.'</h1>') ;
(file_exists($path_tpl . 'taxonomias.php')) ? include_once $path_tpl . 'taxonomias.php' : die('<h1>arquivo nao encontrado</h1>') ;



define('ACF_LITE', false);
