<?php
/*
  Template Name: PerguntasFrequentas
 */
?>
<?php get_header(); ?>
<div class="wrap">
    <!--CONTAINER-->
    <div class="container">
        <div class="row">         
            <?php get_template_part( '/partials/breadCrumb' ); ?>

            <!-- SIDEBAR ESQUERDA -->
            <section class="col-sm-12 col-md-3">
                <div class="mn-sidebar">
                    <div class="navbar navbar-default">
                        <div class="navbar-header bg-institucional">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
                            <span class="fa fa-ellipsis-v"></span>
                            </button>
                            <h1 class="visible-xs navbar-brand">Institucional</h1>
                        </div>
                        <nav class="navbar-collapse collapse sidebar-navbar-collapse">
                            <ul class="nav navbar-nav mn-institucional">
                                  <?php echo ss0408_menu_institucional() ?>
                            </ul>
                        </nav>
                    </div>
                </div>
        </section>
            <!--/FIM  SIDEBAR ESQUERDA  -->            

            <!--BOX CONTEUDO INFORMATIVO-->
            <section class="col-md-9">
                <!--BOX CONTEUDO INFO-->
                <div class="bx-continfo">
                    <h2>Perguntas Frequentes</h2>
                    <!--COMPONENTE PERGUNTAS-->
                    <section class="cpm-perguntas">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <?php $perguntas = new WP_Query( array( 'posts_per_page' => '-1', 'post_type' => 'perguntas_frequentes' ) ); ?>
                            <?php $countTab = 1 ?>
                            <?php while ( $perguntas->have_posts() ) : $perguntas->the_post(); ?>
                                <!--BOX PERGUNTA-->
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#tab-<?php  echo $countTab; ?>" aria-expanded="false">
                                                <?php the_title(); ?>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="tab-<?php echo $countTab ?>" class="panel-collapse collapse" role="tabpanel">
                                        <div class="panel-body">  
                                            <?php the_field( 'resposta' ) ?>
                                        </div>
                                    </div>
                                </div>
                                <!--FIM BOX PERGUNTA-->
                                <?php $countTab ++ ?>
                            <?php endwhile; ?>
                        </div>
                    </section>
                    <!--FIM COMPONENTE PERGUNTAS-->
                </div>
            </section>
        </div>
    </div>
</div>
<!--#/ FIM CONTENT MAIN  ----------------------------------------------------#-->

<?php get_footer(); ?>
