<?php get_header(); ?>
<header class="site__header shadow"
        style="z-index:1;background: url('<?php echo get_template_directory_uri(); ?>/img/header.jpg') no-repeat center center;background-size: cover">
    <div class="row align-items-center h-100 text-center text-white w-100">

        <div class="col-12">
            <img src="<?php echo get_template_directory_uri(); ?>/img/logo-white.png" alt="Logo" width="200">
        </div>

    </div>
</header>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <div class="container p-5">
    <article class="post">
        <?php if (has_post_thumbnail()): ?>
            <div class="post__thumbnail">
                <?php the_post_thumbnail(); ?>
            </div>
        <?php endif; ?>

        <h1><?php the_title(); ?></h1>
        <div class="review__date">Sortie le <?php the_field( 'date_de_sortie' ); ?></div>

        <div class="post__meta">
            <?php echo get_avatar(get_the_author_meta('ID'), 40); ?>
            <p>
                Publié le <?php the_date(); ?>
                par <?php the_author(); ?>
                Dans la catégorie <?php the_category(); ?>
                Avec les étiquettes <?php the_tags(); ?>
            </p>
        </div>

        <div class="post__content">
            <?php the_content(); ?>
            <div class="row">
                <?php
                if( get_field( 'pochette' ) ):
                    $picture = get_field( 'pochette' );
                    //var_dump( $picture );
                    ?>
                    <div class="review__picture">
                        <img
                                src="<?php echo $picture['sizes']['post-thumbnail']; ?>"
                                alt="Pochette de <?php $picture['title']; ?>">
                    </div>
                <?php endif; ?>
                <div class="col-6 rounded-left bg-light p-3">
                    <strong>Avis :</strong>
                    <?php echo get_post_meta(get_the_ID(), 'avis', true); ?>
                </div>

                <div class="col-6 text-right rounded-right bg-light">
                      <span class="rounded bg-danger p-3 text-white shadow">
                          <strong>Note :</strong>
                          <?php the_field( 'note' ); ?> / 10
                      </span>
                </div>
            </div>
            <div class="plus-moins row border-top text-center">
                <div class="plus col-6 bg-success border-right">
                    <h4>Les +</h4>
                    <?php the_field( 'les_plus' ); ?>
                </div>
                <div class="moins col-6 bg-warning">
                    <h4>Les -</h4>
                    <?php the_field( 'les_moins' ); ?>
                </div>
            </div>
        </div>

        <div class="row bg-light mt-3 rounded p-3">
            <?php comments_template(); // Par ici les commentaires ?>
        </div>
    </article>


<?php endwhile; endif; ?>
    <hr>
    <div class="row">
        <div class="col-6 border rounded-left border-right-0 bg-light p-3">
            <?php previous_post_link('Article Précédent<br>%link'); ?>
        </div>
        <div class="col-6 text-right border rounded-right  bg-light p-3">
            <?php next_post_link('Article Suivant<br>%link'); ?>
        </div>
    </div>
    </div>
<?php get_footer(); ?>
