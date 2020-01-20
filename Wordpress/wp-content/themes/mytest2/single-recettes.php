<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) :
the_post(); ?>
<?php if (has_post_thumbnail()): ?>
    <?php $url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())) ?>

    <header class="site__header shadow"
            style="background: url('<?php echo $url; ?>') no-repeat center center;background-size: cover">
        <div class="row align-items-center h-100 text-center text-white w-100">

            <span class="col-12" >
                <h1 style="text-shadow: 2px 2px black;"><?php the_title(); ?></h1>
                <span class="border p-1 rounded bg-white border-0 text-uppercase small shadow text-black-50">
                        Publié le <?php the_date(); ?>
                        par <?php the_author(); ?>
                </span>
            </div>

        </div>
    </header>

<?php endif; ?>
<div class="container p-5">
    <article class="post">
        <div class="row text-center p-5 rounded bg-light shadow-sm mb-5">
            <div class="col-3 border-right">
                <div class="row">
                    <div class="col-12">
                        <h5>Temps</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 ">
                        <span class="h3 text-warning font-weight-bold"> <?php the_field('temps'); ?> min</span>
                    </div>
                </div>
            </div>
            <div class="col-3 border-right">
                <div class="row">
                    <div class="col-12">
                        <h5>Personnes</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <span class="h3 text-warning font-weight-bold"><?php the_field('personnes'); ?></span>
                    </div>
                </div>
            </div>
            <div class="col-3 border-right">
                <div class="row">
                    <div class="col-12">
                        <?php $note = get_field('difficulte')[0]; ?>
                        <h5><?php echo $note['label']; ?></h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                      <span class="h3 text-warning font-weight-bold">
                        <?php for ($k = 0; $k < $note['value']; $k++) {
                            echo '<i class="fas fa-hamburger"></i>';
                        }
                        $reste = 4 - $note['value'];
                              for ($v = 0; $v < $reste; $v++) {
                                  echo '<i class="text-black-50 fas fa-hamburger" style="opacity: .5"></i>';
                              }?>
                      </span>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="row">
                    <div class="col-12">
                        <?php $cout = get_field('cout'); ?>
                        <h5><?php echo $cout['label']; ?></h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <span class="h3 font-weight-bold">
                          <?php for ($v = 0; $v < $cout['value']; $v++) {
                              echo '<i class="text-warning fas fa-euro-sign"></i>';
                          }
                              $reste = 4 - $cout['value'];
                              for ($v = 0; $v < $reste; $v++) {
                              echo '<i class="text-black-50 fas fa-euro-sign" style="opacity: .5"></i>';
                          } ?>
                      </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row rounded p-5 bg-light shadow-sm mb-5">
            <div class="col-3">
                <div class="row">
                    <div class="col-12">
                        <span class="h3 font-weight-bold text-warning"><i class="fas fa-carrot text-black-50"></i> &nbsp;Ingrédients</span>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12 liste-ingredients">
                        <?php the_field('ingredients'); ?>
                    </div>
                </div>
            </div>
            <div class="col-9 pl-5 pr-5">
                <div class="row">
                    <div class="col-12">
                        <span class="h3 font-weight-bold text-warning mb-5"><i class="fas fa-history text-black-50"></i> &nbsp;Préparation</span>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row bg-light mt-3 rounded p-5 shadow-sm">
            <?php comments_template(); // Par ici les commentaires
            ?>
        </div>
    </article>


    <?php endwhile;
    endif; ?>
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
