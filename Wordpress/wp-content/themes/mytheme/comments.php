<div id="commentaires" class="comments">
    <?php if ( have_comments() ) : ?>
        <h2 class="comments_title">
            <?php echo get_comments_number(); // Nombre de commentaires ?> Commentaire(s)
        </h2>

        <ol class="comment_list">
            <?php
            //la fonction qui list les commentqires
            wp_list_comments( array(
                'style' =>'ol',
                'short_ping' => true,
                'avatar_size' =>74,
            ) );
            ?>
        </ol>

        <?php
        //S'il n'y a pas de commentaires
        if (! comments_open() && get_comments_number() ) :
            ?>
            <p class="comments_none">
                Il n'y a pas de commentaires pour le moment. soyez le premier à particper!
            </p>
        <?php endif; ?>
        <?php endif;?>

        <?php comment_form(); // Le formulaire d'ajout de commentaire ?>

</div>