<?php
/*
  Template Name: PageDefault
 */
?>

<?php get_header();  ?>
<div class="container content-default">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
	<h1><?php the_title(); ?></h1>

	<?php the_content(); ?>

<?php endwhile;endif; ?>
</div>

<?PHP get_footer()?>