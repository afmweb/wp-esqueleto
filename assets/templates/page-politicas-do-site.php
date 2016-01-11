<?php
/* Template Name: PoliticasDoSite */
get_header(); 
?>
<div class="wrap">
    <!--CONTAINER-->
    <div class="container">
        <!--ROW-->
        <div class="row">       
            <?php get_template_part( '/partials/breadCrumb' ); ?>
            <!--BOX CONTEUDO INFORMATIVO-->
            <section class="col-md-12">
                <!--BOX CONTEUDO INFO-->
                <div class="bx-continfo">
                    <?php if ( have_posts() ) : the_post() ?> 
                        <h2><?php the_title() ?></h2>
                        <?php get_template_part( '/partials/redes-sociais' ); ?>
                        <?php the_content() ?>
                    <?php endif; ?>
                </div>
                <!--FIM BOX CONTEUDO INFO-->    

            </section>

        </div>
    </div>


    <?php get_footer(); ?>
