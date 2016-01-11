<!-- Fixed navbar -->
<div class="navbar navbar-inverse navbar-fixed-top headroom" >
    <div class="container">
        <div class="navbar-header">
            <!-- Button for smallest screens -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            <a class="navbar-brand" href="<?php echo home_url() ?>">Eu WEB</a>
        </div>
        <div class="navbar-collapse collapse">
            <?php
            wp_nav_menu(
                    array(
                        'theme_location' => 'menu_principal',
                        'menu' => '',
                        'container' => 'ul',
                        'container_class' => '',
                        'container_id' => '',
                        'menu_class' => 'nav navbar-nav pull-right',
                        'menu_id' => '',
                        'echo' => true,
                        'fallback_cb' => 'wp_page_menu',
                        'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    )
            );
            ?>
        </div><!--/.nav-collapse -->
    </div>
</div> 
<!-- /.navbar -->