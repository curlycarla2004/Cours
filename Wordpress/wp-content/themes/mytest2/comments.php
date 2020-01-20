<div id="commentaires" class="comments col-6">
    <?php if ( have_comments() ) : ?>
        <h2 class="comments__title"><i class="fas fa-comments"></i>
            <?php echo get_comments_number(); // Nombre de commentaires ?> Commentaire(s)
        </h2>

        <ol class="comment__list">
            <?php
            // La fonction qui liste les commentaires
            wp_list_comments( array(
                'style'       => 'ol',
                'short_ping'  => true,
                'avatar_size' => 36,
            ) );
            ?>
        </ol>

        <?php
        // S'il n'y a pas de commentaires
        if ( ! comments_open() && get_comments_number() ) :
            ?>
            <p class="comments__none">
                Il n'y a pas de commentaires pour le moment. Soyez le premier à participer !
            </p>
        <?php endif; ?>
    <?php endif; ?>
</div>
<div class="col-6"> <?php comment_form(); // Le formulaire d'ajout de commentaire ?></div>