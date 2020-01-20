<?php get_header(); ?>
    <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
    
        <article class="post">
        <?php if ( has_post_thumbnail() ): ?>
            <div class="post_thumbnail">
                <?php the_post_thumbnail('square'); ?>
            </div>
        <?php endif; ?>

            <h1><?php the_title(); ?></h1>

            <div class="post_meta">
                <?php echo get_avatar( get_the_author_meta( 'ID' ), 40 ); ?>
                <p>
                    Publié le <?php the_date(); ?>
                    par <?php the_author(); ?>
                    Dans la catégorie <?php the_category(); ?>
                    Avec les étiquettes <?php the_tags(); ?>
                </p>
            </div>

            <div class="post_content">

                <?php   $temps = get_field( 'temps');
                        $personnes = get_field( 'personnes');
                        $difficulte = get_field( 'difficulte');
                        $cout = get_field( 'cout');
                        $ingredients = get_field( 'ingredients');
                ?>
                        <p><?php echo $temps; ?> min</p>
                        <p><?php echo $personnes; ?> personnes</p>
                        <p>This recette is <?php echo $difficulte['label']; ?>.</p>
                        <p>And it is <?php echo $cout['label']; ?> to make.</p>
                        <p>These are the ingredients necessary:<?php echo $ingredients; ?></p>

                <?php the_content(); ?>
                <p>
                    <strong>Avis :</strong>
                    <?php echo get_post_meta( get_the_ID(), 'avis', true); ?>
                </p>

                <p>
                    <strong>Note :</strong>
                    <?php echo get_post_meta( get_the_ID(), 'note', true); ?> / 10
                </p>
                <div class="plus-moins">
                    <div class="plus">
                        <?php echo get_post_meta( get_the_ID(), 'plus', true); ?>
                    </div>
                </div>
                <div class="moins">
                    <?php echo get_post_meta( get_the_ID(), 'moins', true); ?>
                </div>
            </div>
        </article>

        <?php comments_template(); // Par ici les commentaires ?>
<?php endwhile; endif; ?>



<?php get_footer(); ?>