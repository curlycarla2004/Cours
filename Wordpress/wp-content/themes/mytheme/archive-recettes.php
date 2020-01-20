<?php get_header(); ?>

<h1 class="site_heading"><?php post_type_archive_title(); ?></h1>

<main class="site_recettes">
    <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
        <div class="recettes">
            <h2 class="recettes_title">
                <a href="<?php the_permalink(); ?>">
                    <?php the_title(); ?>
                    <?php the_terms( get_the_ID() , 'type-recettes' ); ?>
                </a>
            </h2>
            <?php the_post_thumbnail(); ?>
        </div>
    <?php endwhile; endif; ?>



</main>

<?php the_posts_pagination(); ?>
<?php get_footer(); ?>