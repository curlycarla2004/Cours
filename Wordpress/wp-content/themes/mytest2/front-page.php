<?php get_header(); ?>
    <header class="site__header shadow"
            style="z-index:1;background: url('<?php echo get_template_directory_uri(); ?>/img/header.jpg') no-repeat center center;background-size: cover">
        <div class="row align-items-center h-100 text-center text-white w-100">

            <div class="col-12">
                <img src="<?php echo get_template_directory_uri(); ?>/img/logo-white.png" alt="Logo" width="200">
            </div>

        </div>
    </header>
	<div class="container p-5 mt-5 mb-5 rounded bg-white shadow">
		<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
    
    	<h1><?php the_title(); ?></h1>
    
    	<?php the_content(); ?>

	<?php endwhile; endif; ?>
	</div>

<?php get_footer(); ?>