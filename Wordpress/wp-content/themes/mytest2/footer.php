<footer class="text-center bg-dark text-white pt-3 pl-3 pr-3 pb-0">
    <div class="row">
        <div class="col-8 offset-2">
            <?php get_template_part('parts/newsletter'); ?>
        </div>
        <div class="col-2">
            <div class="row">
                <div class="col-4">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/logo-white.png" alt="Logo" width="100">
                </div>
                <div class="col-8 text-left">
                    <small>
                        Food Inc. <br>
                        Entreprise fictive <br>
                        Mais on aime ça quand même.
                    </small>
                </div>
            </div>
        </div>
    </div>
    <div class="row " style="background: black;">
        <div class="col-12">
           <span class="small">
               Made with <i class="fas fa-mug-hot"></i> and <i class="fas fa-heart"></i> by Sam BZEZ - <i class="far fa-copyright"></i> 2020
           </span>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>