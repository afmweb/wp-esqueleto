<div class="container">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="jumbotron">
                <h1><?php the_title(); ?></h1>
                <?php the_title() ?>
            </div>  

        <?php endwhile;
    endif;
    ?> 

</div>