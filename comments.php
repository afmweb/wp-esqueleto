<?php
// Do not delete these lines
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
    die('Please do not load this page directly. Thanks!');

if (post_password_required()) {
    ?>
    <p class="nocomments">Este artigo está protegido por password. Insira-a para ver os comentários.</p>
    <?php
    return;
}
?>

<div id="comments">
    <h3><?php comments_number('0 Comentários', '1 Comentário', '% Comentários'); ?></h3>

<?php if (have_comments()) : ?>

        <ol class="commentlist">
    <?php wp_list_comments('avatar_size=64&type=comment'); ?>
        </ol>

    <?php if ($wp_query->max_num_pages > 1) : ?>
            <div class="pagination">
                <ul>
                    <li class="older"><?php previous_comments_link('Anteriores'); ?></li>
                    <li class="newer"><?php next_comments_link('Novos'); ?></li>
                </ul>
            </div>
        <?php endif; ?>

    <?php endif; ?>

<?php if (comments_open()) : ?>

        <div id="respond">
            <h3>Deixe o seu comentário!</h3>

            <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

    <?php if ($user_ID) : ?>

                    <p>Autentificado como <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(); ?>" title="Sair desta conta">Sair desta conta &raquo;</a></p>

    <?php else : ?>

                    <p>
                        <label for="author"><small><?php _e('Name'); ?> <?php if ($req) _e('(required)'); ?></small></label>
                        <input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
                    </p>

                    <p>
                        <label for="email"><small><?php _e('Mail (will not be published)'); ?> <?php if ($req) _e('(required)'); ?></small></label>
                        <input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
                    </p>

                    <p>
                        <label for="url"><small><?php _e('Website'); ?></small></label>
                        <input type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="3" />
                    </p>

    <?php endif; ?>

    <!--<p><small><?php printf(__('<strong>XHTML:</strong> You can use these tags: <code>%s</code>'), allowed_tags()); ?></small></p>-->

                <p><textarea name="comment" id="comment" cols="58" rows="10" tabindex="4"></textarea></p>
                <?php
                /** This filter is documented in wp-includes/comment-template.php */
                do_action('comment_form', $post->ID);
                ?>
                <p><input name="submit" type="submit" id="submit" tabindex="5" value="<?php esc_attr_e('Submit Comment'); ?>" />
    <?php comment_id_fields(); ?>
                </p>
            </form>
            <p class="cancel"><?php cancel_comment_reply_link('Cancelar Resposta'); ?></p>
        </div>
    <?php else : ?>
        <h3>Os comentários estão fechados.</h3>
<?php endif; ?>
</div>