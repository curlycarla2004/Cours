<?php get_header(); ?>

    <div class="container mt-5 mb-5" style="min-height: calc(100vh - 75px)">
       <div class="m-auto">
           <h1 class="site__heading text-center mb-5 text-uppercase"><i class="fas fa-utensils text-warning"></i> &nbsp;<?php post_type_archive_title(); ?>&nbsp; <i class="fas fa-utensils text-warning"></i></h1>

           <main class="site__recettes row">
               <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
                   <div class="recette mb-4">
                       <div class="col-12 p-5 rounded shadow"  style="background:url(<?php the_post_thumbnail_url(); ?>) no-repeat center;min-height: 25vh;background-size: cover;">
                           <h2 class="recette__title" style="text-shadow: 2px 2px black;">
                               <a class="text-white" href="<?php the_permalink(); ?>">
                                   <?php the_title(); ?>
                               </a>
                           </h2>
                           <span class="border p-1 rounded bg-white border-0 text-uppercase small shadow">
                            <?php the_terms( get_the_ID() , 'type-recette' ); ?>
                        </span>
                       </div>
                   </div>
               <?php endwhile; endif; ?>
           </main>
       </div>
    </div>

<?php the_posts_pagination(); ?>
<?php get_footer(); ?>