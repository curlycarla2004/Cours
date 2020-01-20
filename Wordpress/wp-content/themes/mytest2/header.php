<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<nav class="navbar navbar-expand-lg navbar-light bg-light " style="z-index: 99">
    <a class="navbar-brand" href="<?php echo home_url('/'); ?>">
        <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="Logo" width="75">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse font-weight-bold " id="navbarText">

        <?php wp_nav_menu(
            array(
                'theme_location' => 'main',
                'container' => 'ul', // afin d'éviter d'avoir une div autour
                'menu_class' => 'navbar-nav m-auto', // ma classe personnalisée
                'add_li_class' => 'nav-item',
                'link_class' => 'h5 m-0 nav-link pr-0'
            )
        ); ?>

    </div>
    <span class="navbar-text">
		<?php if ( is_user_logged_in() ): get_currentuserinfo(); ?>
            <a class="nav-link" href="<?php echo wp_login_url(); ?>"><i class="fas fa-sign-out-alt"></i> Déconnexion </a>
        <?php else: ?>
            <a class="nav-link" href="<?php echo wp_login_url(); ?>"><i class="fas fa-sign-in-alt"></i> Connexion </a>
        <?php endif; ?>
    </span>
</nav>
<nav class="navbar navbar-expand-lg navbar-dark bg-warning shadow-lg text-right">

       <div class="ml-auto mr-3">
           <?php get_search_form(); ?>
       </div>

</nav>
<?php wp_body_open(); ?>
	