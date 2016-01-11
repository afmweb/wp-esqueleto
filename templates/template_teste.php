<?php
/*
  Template Name: Teste
 */
//get_header();
global $wpdb;

$query = "
        SELECT      *
        FROM        $wpdb->ss0408_posts
        WHERE       $wpdb->ss0408_posts.post_title LIKE 'teste%'
        AND         $wpdb->ss0408_posts.post_type = 'eventos-da-semes'
        ORDER BY    $wpdb->ss0408_posts.post_title
";
$teste = $wpdb->get_results($query);

var_dump($teste);












/*

$args  = array(
    
    'post_type' => 'eventos-da-seme',
    array(
      'key' => 'modalidades_evento',
      'value'   => array( 'alongamento', 'judo', 'natacao'),
      'type'    => 'numeric',
      'compare' => 'BETWEEN',
));


*/





       $args = array(
		'posts_per_page' => 10,
		'post_type' => 'eventos-da-seme',
		'meta_query' => array(
                        array(
			'key' => 'modalidades_evento',
			'value' => $branch
			)
                    
                    )
		);