<?php
/* Template Name: PratasDaCasa */
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
                <?php $temp = $wp_query; ?>
                <?php $wp_query = null; ?>
                <?php $wp_query = new WP_Query(); ?>
                <?php if(  isset($_GET['m']) ): $val_modalidade  = filter_input(INPUT_GET, 'm', FILTER_SANITIZE_STRING) ; else: $val_modalidade= null; endif; ?>                
                
                <?php if( empty($val_modalidade)):  ?>
               <?php  $arg_str = array('post_type'=>'pratas_da_casa', 'paged'=>$paged, 'posts_per_page'=>6, 'orderby'=>'post_title', 'order'=>'asc'); ?>                
                <?php else: ?>
                <?php  $arg_str = array('post_type'=>'pratas_da_casa', 'meta_value'=> "$val_modalidade", 'paged'=>$paged, 'posts_per_page'=>6, 'orderby'=>'post_title', 'order'=>'asc'); ?>                
                <?php endif; ?>
               <?php  $wp_query->query( array_merge($arg_str ));?>
                
                <!--BOX DESTAQUE MODALIDADE-->
                <div class="bx-dest-modalidade cor-pratacasa">
                    <div class="row">
                        <!--BOX FILTRO-->
                        <div class="bx-filtro col-sm-12 col-md-12">
                            <fieldset>
                                <label>
                                    <span class="title">Modalidade</span>
                                    <div class="selPerso">
                                        <input type="hidden" class="jq-url-atual" name="url-atual" value="<?php echo home_url() ?>" />
                                        <select name="modalidade_evento"  class="jq-cbo-pratas">
                                            <option value="">Todas as modalidades</option>
                                            <?php echo ss0408_options_modalidade() ?>
                                        </select>
                                    </div>
                                </label>
                            </fieldset>
                        </div>
                        <!--FIM BOX FILTRO-->
                        <!--BOX DESTAQUE FOTO-->
                        <?php $count_loop = 0; ?>
                        <?php while ( have_posts() ) : the_post(); ?>
                            <div class="col-sm-6 col-md-4">
                                <div class="bx-dest-foto">
                                    <a href="<?php the_permalink(); ?>">
                                        <figure>
                                            <?php if ( has_post_thumbnail() ) {  // mostra a imagem destacada   ?>                           
                                                <?php the_post_thumbnail( 'post-thumb-pratas', array( 'class' => 'img-responsive' ) ); ?>
                                            <?php } ?>
                                            <h3><?php  echo  get_nome_modalidades(  get_field( 'modalidade' )); ?></h3>
                                        </figure>
                                        <h4><?php the_title(); ?></h4>
                                        <p><?php  echo ss0408_limitarTexto(get_field('descricao'), 45) ?></p>

                                    </a>
                                </div>
                            </div>          
                        <?php $count_loop++ ?>
                        <?php endwhile; ?> 
                        <!--FIM BOX DESTAQUE FOTO-->
                    </div>
                </div>
                <!--COMPONENTE PAGINACAO-->
                <div class="cpm-paginacao cor-pratacasa">
                    <nav>

                        <div class="paginate_posts"><?php echo ss0408_pagination(); ?></div>
                        <?php  if( $count_loop == 0 ) echo 'Nenhuma Prata da Casa nesta modalidade'; ?>
                    </nav>
                </div>
                <!--FIM COMPONENTE PAGINACAO-->                                                                                            
            </section>

        </div>
    </div>


    <?php get_footer(); ?>
