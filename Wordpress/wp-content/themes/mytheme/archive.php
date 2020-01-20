<?php get_header(); ?>

<?php
if ( is_category() ) {
    $title = "Catégorie : " . single_tag_title( '', false );
}
elseif ( is_category() ) {
    $title = "Etiquette : " . single_tag_title( '', false );
}
elseif (is_search() ) {
    $title = "Vous avez recherché : " . get_search_query();
}
else{
    $title = 'Le Blog';
}
?>
    <h1><?php echo $title; ?></h1>

    <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

        <article class="post">
            <h2><?php the_title(); ?></h2>

            <?php the_post_thumbnail(); ?>

            <p class="post_meta">
                Publié le <?php the_time( get_option( 'date_format' ) ); ?>
                par <?php the_author(); ?> -- <?php comments_number(); ?>
            </p>

            <?php the_excerpt(); ?>

            <p>
                <a href="<?php the_permalink(); ?>" class="post_link">Lire la suite</a>
            </p>
        </article>
<?php endwhile; endif; ?>

<?php posts_nav_link(); //apres la boucle ?>

<aside class="site_sidebar">
            <ul>
                <?php dynamic_sidebar('blog-sidebar'); ?>
            </ul>
        </aside>

<?php get_footer(); ?>