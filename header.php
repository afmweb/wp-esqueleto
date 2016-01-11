<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <!--<![endif]-->
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="description" content="<?php bloginfo( 'description' ) ?>">
        <meta name="viewport" content="width=device-width">
        <title>
            <?php bloginfo( 'name' ); ?>
            <?php if ( is_home() ): echo ' - ' . get_bloginfo( 'description' ); ?>
            <?php else: wp_title( '|', true ); ?>
            <?php endif; ?>
        </title>
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        <link type="text/css" rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" />

        <!--[if lt IE 9]>
        <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
        <![endif]-->
        <?php wp_head(); ?>
</head>
<?php get_header('menu');