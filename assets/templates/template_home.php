<?php
/*
  Template Name: HomeTemplate
 */
get_header();
?>
<div class="wrap">
    <div class="container">
        <div class="row">
            <!--COLUNA 01-->
            <div class="col-lg-6 col-md-8 col-sm-8 col-xs-12">
                <!--SECTION EVENTOS-->
                <section class="sc-eventos cor-eventos">
                    <h2 class="tit-oculto">Eventos</h2>

                    <ul class="bxslider">
                        <?php $args_slide = array( 'post_type' => 'slides-home', 'posts_per_page' => 10, 'orderby' => 'post_ID', 'ORDER' => 'DESC' ) ?>
                        <?php $imgSlides = new WP_Query( $args_slide ) ?>
                        <?php while ( $imgSlides->have_posts() ) : $imgSlides->the_post() ?>
                            <li>
                                <?php if ( has_post_thumbnail() ): ?>

                                    <?php the_post_thumbnail( 'slide-home', array( 'class' => 'img-responsive', 'alt' => '' ) ); ?>
                                <?php else: ?>
                                    <img src="<?php echo get_template_directory_uri() ?>/assets/img/no-img.jpg" alt="" class="img-responsive" />
                                <?php endif; ?>
                                <h4><?php the_field( 'ss0408_evento' ) ?></h4>
                                <div class="bx-info">
                                    <h3><?php the_title() ?></h3>
                                    <p><?php the_content() ?></p>
                                </div>
                            </li>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata() ?>
                    </ul>
                    <span class="bt-todas"><a href="<?php echo home_url() ?>/eventos-da-seme">Todas os eventos</a></span>
                </section>
                <!--FIM SECTION EVENTOS-->

                <!--SECTION LOCALIDADES-->
                <section class="sc-localidades cor-localidade">
                    <div class="bx-title bg-localidade">
                        <h2>Localidades</h2>
                    </div>
                    <?php
                    $args = array( 'post_type' => array( 'localidade', 'localidade_filho' ), 'meta_value' => 'simples', 'posts_per_page' => 2, 'orderby' => 'post_ID', 'meta_query' => array(
                            array(
                                'key' => '_thumbnail_id',
                                'compare' => 'EXISTS' ) ), 'ORDER' => 'DESC' );
                    ?>
                    <?php $locais = new WP_Query( $args ); ?>
                    <?php while ( $locais->have_posts() ): $locais->the_post() ?>                    
                        <div class="itens">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 bx-content">
                                <figure>
                                    <?php if ( has_post_thumbnail() ): ?>

                                        <?php the_post_thumbnail( '', array( 'class' => 'img-responsive', 'alt' => '' ) ); ?>

                                    <?php endif; ?>
                                </figure>
                                <h3><?php the_title() ?></h3>
                                <p><?php the_excerpt() ?></p>
                                <span class="bt-lermais"><a href="<?php the_permalink() ?>">Ler mais</a></span>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </section>
                <!--FIM SECTION LOCALIDADES-->
            </div>
            <!--FIM COLUNA 01-->

            <!--SIDEBAR-->
            <aside class="col-lg-3 col-md-4 col-sm-4 col-xs-12 col-lg-push-3" role="complementary">
                <!--SECTION DESTAQUE NOTICIA-->
                <section class="sc-destnoticia cor-noticias">
                    <div class="bx-title bg-noticias">
                        <h2>Notícias</h2>
                    </div>

                    <?php get_template_part( '/partials/content-ultimas-noticias' ) ?>


                </section>
                <!--FIM SECTION DESTAQUE NOTICIA-->

                <!--SECTION ACONTECE NA MIDIA-->
                <section class="sc-acontece bg-noticias">
                    <a href="http://www4.prefeitura.sp.gov.br/seme/CEDOC/Clipping/C20151022.asp" target="_blank">
                        <span><i class="fa fa-newspaper-o"></i></span>
                        <h3>Acontece na Midia</h3>
                        <p>
                            Confira aqui as notícias sobre esportes publicadas na mídia.
                        </p>
                    </a>
                </section>
                <!--FIM SECTION ACONTECE NA MIDIA-->
            </aside>
            <!--FIM SIDEBAR-->

            <!--COLUNA 02-->
            <div class="col-lg-3 col-md-8 col-sm-8 col-lg-pull-3">
                <div class="col02">
                    <div class="row">
                        <div class="col-lg-12 col-md-6 col-sm-6">
                            <!--SECTION PRATAS DA CASA-->
                            <section class="sc-pratcasa bg-pratacasa cor-pratacasa">
                                <div class="bx-title ">
                                    <h2>Pratas da Casa</h2>

                                </div>
                                <!--BOX DESTAQUE PRATAS DA CASA DESKTOP-->
                                <div class="bx-destaque-d">

                                    <?php
                                    $argsDestaque = array(
                                        'post_type' => 'pratas_pg_home',
                                        'posts_per_page' => 1,
                                        'orderby' => 'menu_order',
                                        'order' => 'ASC'
                                    );
                                    $prataDestaque = new WP_Query( $argsDestaque );
                                    ?>
                                    <?php while ( $prataDestaque->have_posts() ) : $prataDestaque->the_post(); ?>
                                        <figure>
                                            <?php if ( has_post_thumbnail() ) : ?>                           
                                                <?php the_post_thumbnail( '', array( 'class' => 'img-responsive' ) ); ?>
                                            <?php else: ?>
                                                <?php if ( get_field( 'url_do_video_pratas_home' ) ): ?>
                                                    <?php $urlPratasDaCasa = str_replace( 'watch?v=', 'embed/', get_field( 'url_do_video_pratas_home' ) ) ?>
                                                    <iframe width="268" height="200" src="<?php echo $urlPratasDaCasa ?>" frameborder="0" allowfullscreen  class="img-responsive"></iframe>
                                                <?php endif; ?>                                            
                                            <?php endif ?>                                           



                                        </figure>
                                        <div class="bx-conteudo">
                                            <h3><?php the_title(); ?></h3>
                                            <?php if ( get_field( 'link_externo_pratas_home' ) && get_field( 'link_externo_pratas_home' ) == 'nao' ) : ?>
                                                <?php the_excerpt(); ?>
                                            <?php elseif ( get_field( 'link_para_outra_pagina_pratas_home' ) == 'nao' ): ?>
                                                <a href="<?php echo get_field( 'link_da_pagina_pratas_home' ) ?>"><?php the_excerpt(); ?></a>
                                            <?php else: ?>
                                                <a href="<?php echo get_field( 'link_da_pagina_pratas_home' ) ?>" target="_blank"><?php the_excerpt(); ?></a>
                                            <?php endif; ?>
                                            <span class="bt-todas"><a href="<?php get_template_directory_uri() ?>pratas-da-casa">Todas Pratas da Casa</a></span>
                                        </div>
                                    <?php endwhile; ?> 
                                </div>
                                <!--FIM BOX DESTAQUE PRATAS DA CASA DESKTOP-->

                                <!--BOX DESTAQUE PRATAS DA CASA MOBILE-->
                                <div class="bx-destaque-m">
                                    <div class="bx-conteudo">
                                        <figure>
                                            <img src="<?php echo get_template_directory_uri() ?>/assets/img/img_dest_pratacasa.jpg" alt="">
                                        </figure>
                                        <hgroup>
                                            <h3>Juán Thomaz</h3>
                                            <h4>Melhor jogador de Guaianases na Copa SP14.</h4>
                                        </hgroup>
                                        <span class="bt-todas"><a href="#">Ver todos</a></span>
                                    </div>
                                </div>
                                <!--FIM BOX DESTAQUE PRATAS DA CASA MOBILE-->
                            </section>
                            <!--FIM SECTION PRATAS DA CASA-->
                        </div>

                        <div class="col-lg-12 col-md-6 col-sm-6">
                            <!--SECTION GALERIAS-->
                            <section class="sc-galerias cor-galerias">
                                <div class="bx-title bg-galerias">
                                    <h2>Galerias</h2>
                                </div>
                                <!--BOX DESTAQUE DESKTOP-->
                                <div class="bx-destaque">
                                    <figure>
                                        <img src="<?php echo get_template_directory_uri() ?>/assets/img/img_galerias.jpg" class="img-responsive" alt="">
                                    </figure>
                                    <div class="bx-conteudo">
                                        <h3>Folclore Brasileiro no CE Vila Manchester</h3>
                                        <p>Lorem ipsum dolor sit amet, lorem adipiscing elit. Gravida dolor ipsum lorem sit amet.</p>
                                        <span class="bt-todas"><a href="<?php echo home_url() ?>/todas-as-galerias">Todas as galerias</a></span>
                                    </div>
                                </div>
                                <!--FIM BOX DESTAQUE DESKTOP-->

                                <!--BOX GALERIA MOBILE-->
                                <div class="bx-galeria">
                                    <ul class="galeria">
                                        <li>
                                            <img src="<?php echo get_template_directory_uri() ?>/assets/img/img_evento01.jpg" class="img-responsive" alt="">
                                        </li>
                                        <li>
                                            <img src="<?php echo get_template_directory_uri() ?>/assets/img/img_evento01.jpg" class="img-responsive" alt="">
                                        </li>
                                        <li>
                                            <img src="<?php echo get_template_directory_uri() ?>/assets/img/img_evento01.jpg" class="img-responsive" alt="">
                                        </li>
                                        <li>
                                            <img src="<?php echo get_template_directory_uri() ?>/assets/img/img_evento01.jpg" class="img-responsive" alt="">
                                        </li>
                                    </ul>
                                    <span class="bt-todas"><a href="#">Todas as galerias</a></span>
                                </div>
                                <!--FIM BOX GALERIA MOBILE-->
                            </section>
                            <!--FIM SECTION GALERIAS-->
                        </div>
                    </div>
                </div>
            </div>
            <!--FIM COLUNA 02-->

            <!--BOX PROGRAMAS-->
            <div class="col-lg-12 col-md-4 col-sm-4">
                <section class="sc-programas">
                    <div class="bx-title bg-programas cor-programas">
                        <h2>Programas</h2>
                        <span class="bt-todas"><a href="<?php home_url() ?>/programas">Ver todos</a></span>
                    </div>
                    <div class="itens">
                        <?php $args_prgramas = array( 'post_type' => 'programas', 'posts_per_page' => 4, 'orderby' => 'post_ID', 'order' => 'DESC' ); ?>
                        <?php $programas_4 = new WP_Query( $args_prgramas ); ?>
                        <?php while ( $programas_4->have_posts() ): $programas_4->the_post() ?>
                            <div class="col-lg-3 col-md-12 bx-content">
                                <figure>
                                    <?php if ( has_post_thumbnail() ) : ?>                           
                                        <?php the_post_thumbnail( 'programas-home', array( 'class' => 'img-responsive' ) ); ?>
                                    <?php endif ?>
                                </figure>
                                <h3><?php the_title() ?></h3>
                                <?php the_excerpt() ?>
                                <span class="bt-lermais"><a href="<?php the_permalink() ?>">Ler mais</a></span>
                            </div>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata() ?>
                </section>
            </div>
            <!--FIM BOX PROGRAMAS-->
        </div>


        <!--SECTION REDES SOCIAIS-->
        <section class="sc-redes">
            <div class="bx-title bg-redesocial">
                <h2>Redes Sociais</h2>
            </div>
            <div class="col-md-4">
                <div class="fb-page" data-href="https://www.facebook.com/Secretariadeesportesoficial" data-width="100%" data-height="440" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/Secretariadeesportesoficial"><a href="https://www.facebook.com/Secretariadeesportesoficial">Secretaria Municipal de Esportes, Lazer e Recreação</a></blockquote></div></div>
            </div>
            <div class="col-md-4">
                <a class="twitter-timeline" href="https://twitter.com/esportenafaixa" data-widget-id="661949781913313280">Tweets de @esportenafaixa</a>
                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
            </div>
            <div class="col-md-4">
            <!-- YOUTUBE -->
                <div id="youtube-videos" style="width:100%; height: 440px; overflow-x:none; overflow-y:scroll; border:1px solid #e2e2e2 "></div>
  

                <script>
               jQuery.noConflict()(function ($) {

                function loadVideos(limit, credencial, channelId) {
                    $("#youtube-videos").hide();
                    //Cria uma requisicao AJAX para a URL da API do Youtube
                    $.ajax({
                        type: "GET",
                        url: "https://www.googleapis.com/youtube/v3/search?key=" + credencial + "&channelId=" + channelId + "&part=snippet,id&order=date"
                    }).done(function(data) {
                        var lista = "";
                        console.log(data)

                        var ct = 0;

                        $.each(data.items, function(key, value) {

                            //Existem varios tipos ou "kind", como youtube#channel, youtube#video, etc...
                            //Porem queremos apenas itens do tipo youtube#video, que como o nome ja diz sao videos do youtube
                            if (limit > 0 && value.id.kind == "youtube#video") {
                                lista += '<div style="overflow:hidden; padding:16px 0 16px 16px; border-bottom:1px solid #e2e2e2"><a target="_blank" href="https://www.youtube.com/watch?v=' + value.id.videoId + '">';
                                lista +='<div style="float:left; width:120px; height:90px; background: url('+value.snippet.thumbnails.default.url+') no-repeat "><img  src="<?php echo get_template_directory_uri() ?>/assets/img/video-play-butto180.png"  /></div>';
                                lista += '<div style="float:left; margin:0 0 0 16px; width:52%; font-size:0.8em; color:#c41b1d">' + value.snippet.title + '</div>';
                                lista +='</a></div>';
                               // '<a href="https://www.youtube.com/watch?v=' + value.id.videoId + '"><img align="left"src="' + value.snippet.thumbnails.default.url + '"  />' + value.snippet.title + '</a>' + '</div>';
                                limit--;
                            }

                        });

                        $("#youtube-videos").html(lista);



                    }).fail(function(jqXHR, textStatus) {
                        console.log(jqXHR);
                        $("#youtube-videos").html('Não foi possivel recuperar a lista de videos!');
                    }).always(function() {
                        $("#youtube-videos").show();
                    });
                }

                $( document ).ready(function() {
                    loadVideos(15, 'AIzaSyDeXmjJE6E2VrBjG5watW7JISARA4WEMag', 'UCz4CW4CnFcAUdzkK9QvYPIA');
                });
            });

               
                </script>
            </div>
        </section>
        <!--FIM SECTION REDES SOCIAIS-->
    </div>
</div>

<?php get_footer(); ?>
