<?php get_header(); ?>
<?php
if (is_category()) {
    $title = "Catégorie : " . single_tag_title('', false);
} elseif (is_tag()) {
    $title = "Étiquette : " . single_tag_title('', false);
} elseif (is_search()) {
    $title = "Vous avez recherché : " . get_search_query();
} else {
    $title = 'Le Blog';
}
?>
    <header class="site__header shadow"
            style="z-index:1;background: url('<?php echo get_template_directory_uri(); ?>/img/header.jpg') no-repeat center center;background-size: cover">
        <div class="row align-items-center h-100 text-center text-white w-100">

            <div class="col-12">
                <img src="<?php echo get_template_directory_uri(); ?>/img/logo-white.png" alt="Logo" width="200">
            </div>
            <div class="col-12">
                <h1 class="text-center "><?php echo $title; ?></h1>
            </div>

        </div>
    </header>

    <div class="container">
        <div class="row mt-5">
            <main class="col-8">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <article class="p-3 shadow rounded mb-3 bg-white blog-post-list">
                        <header>
                            <h2 class="m-0"><?php the_title(); ?></h2>
                            <p class="post__meta small text-black-50">
                                Publié le <?php the_time(get_option('date_format')); ?>
                                par <?php the_author(); ?>
                            </p>
                        </header>
                       <? if (has_post_thumbnail()) {
                           echo ' <img src="'. get_the_post_thumbnail_url().'" alt="" style="width: 100%" class="rounded">';
                       } ?>



                        <?php the_excerpt(); ?>

                        <div class="row">
                            <div class="col-8">
                                <a href="<?php the_permalink(); ?>" class="post__link">
                                    <button class="btn btn-sm btn-warning"><i class="fas fa-plus"></i> &nbsp;Lire la suite
                                    </button>
                                </a>
                            </div>
                            <div class="col-4 text-right">
                                <span class="p-2 bg-light rounded small">
                                    <i class="fas fa-comments"></i> <?php comments_number(); ?>
                                </span>
                            </div>
                        </div>
                    </article>

                <?php endwhile; endif; ?>
                <hr>
                <div class="row p-3">
                    <div class="site__navigation__prev col-6 border border-right-0 rounded-left bg-light p-3">
                        <?php previous_posts_link(); ?>
                    </div>
                    <div class="site__navigation__next col-6 text-right border rounded-right bg-light p-3">
                        <?php next_posts_link(); ?>
                    </div>
                </div>

            </main>

            <aside class="col-4 p-3 bg-white shadow rounded text-center h-100 position-sticky" style="top:0">
                <?php dynamic_sidebar('blog-sidebar'); ?>
            </aside>
        </div>
    </div>
<?php get_footer(); ?>