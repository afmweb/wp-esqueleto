<?php
/*
  Template Name: Todas-as-noticias
 */
?>
<?php get_header(); ?>

<div class="wrap">
    <!--CONTAINER-->
    <div class="container">
        <!--ROW-->
        <div class="row">

            <?php get_template_part( '/partials/breadCrumb' ); ?>

            <!--MENU LATERAL-->
            <?php get_template_part( '/partials/submenu-noticias' ) ?>
            <!--BOX CONTEUDO INFORMATIVO-->
            <section class="col-md-9">
                <div class="bx-continfo">
                    <h2 class="fleft">Notícias da SEME</h2>
                    <!--BOX REDES-->
                    <?php get_template_part( '/partials/redes-sociais' ) ?>
                    <!--FIM BOX REDES-->


                    <?php
                    $temp = $wp_query;
                    $wp_query = null;
                    $wp_query = new WP_Query();
                    ?>
                    <?php
                    $wp_query->query( 'post_type=todas-as-noticias'
                            . '&paged='
                            . $paged
                            . '&posts_per_page=6'
                            . $orderby . '&orderby=ID&order=DESC'
                    );
                    ?>
                    <?php ?>
                    <?php while ( have_posts() ) : ?>
                        <?php the_post(); ?>      
                        <!--BOX GROUP NOTICIA-->
                        <section class="bx-group-notica">
                            <span class="data"><?php the_time( 'd/m' ); ?></span>

                            <article>
                                <a href="<?php the_permalink() ?>">
                                    <time><?php the_time( 'H:i' ); ?>h</time>
                                    <h3><?php the_title(); ?></h3>
                                    <p><?php the_field( 'linha_fina' ) ?></p>
                                </a>
                            </article>
                        </section>
                    <?php endwhile; ?>
                    <!--FIM BOX GROUP NOTICIA-->
            </section>
            <!--FIM BOX GROUP NOTICIA-->

            <!--COMPONENTE PAGINACAO-->

            <div class="cpm-paginacao">
                <?php echo ss0408_pagination(); ?>
                <?php wp_reset_postdata(); ?> 

            </div>
            <!--FIM COMPONENTE PAGINACAO-->
        </div>
        </section>
        <!--FIM BOX CONTEUDO INFORMATIVO-->
    </div>
    <!--FIM ROW-->
</div>
<!--FIM CONTAINER-->
</div>
<?PHP get_footer() ?>    