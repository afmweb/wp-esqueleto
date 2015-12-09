<?php

    /*
    * Registrando os Scripts e Estilos
    */    
function tw_add_css_js() {    
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_style( 'style', get_stylesheet_uri() );
        
	wp_enqueue_script( 'JQueryMin', get_stylesheet_directory_uri() . '/js/jquery-2.1.4.min.js', '', '', true );
        wp_enqueue_script( 'modernizr', get_stylesheet_directory_uri() . '/js/modernizr.js', '', '', true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', '', '', true );
       //wp_enqueue_script( 'jqueryMin', get_stylesheet_directory_uri() . '/assets/js/jquery-1.11.3.min.js', '', '', true );
}
add_action( 'wp_enqueue_scripts', 'tw_add_css_js' ); 

//habilitando Menu
add_theme_support('menus');    
register_nav_menu( 'menu_principal', 'Menu Principal - Topo');

//habilitando Widgets
register_sidebar(
        array(
            'name' => 'Widget Lateral', 
            'id' => 'twWideget01'
            ) );

 // Ativa o suporte de miniaturas
add_theme_support( 'post-thumbnails' );
// Define o tamanho da miniatura
add_image_size( 'post-thumb', 100, 100, true );

//Formulário de pesquisa
function tw_search_form(  ) {
	$form = '<form role="search" method="get" id="searchform" class="navbar-search pull-left" action="' . home_url( '/' ) . '" >	
	<input type="text" value="' . get_search_query() . '" name="s" id="s" class="search-query span2" />
	</form>';

	return $form;
}


/*
 * Paginação
 */

function pagination() {

  global $wp_query;

  $baseURL = get_bloginfo( 'url' ); // Url base do blog

  $page = ( !$wp_query->query_vars["paged"] ) ? 1 : $wp_query->query_vars["paged"]; // Página atual

  if ( $wp_query->found_posts > $wp_query->query_vars["posts_per_page"] ) {
    echo '<div class="pagination"><ul>';

    if ( $page > 1 ) {
      echo '<li><a href="'.$baseURL.'/page/'.($page-1).'">« Anterior</a></li>';
    }

    for ( $i=1; $i <= $wp_query->max_num_pages; $i++ ) {
      if ( $i == $page ) {
          echo '<li class="active"><a href="">'.$i.'</a></li>';
      } else {
          echo '<li><a href="'.$baseURL.'/page/'.$i.'">'.$i.'</a></li>';
      }
    }

    if ( $page < $wp_query->max_num_pages ) {
      echo '<li><a href="'.$baseURL.'/page/'.($page+1).'">Próxima »</a></li>';
    }

    echo '</ul></div>';
  }

}