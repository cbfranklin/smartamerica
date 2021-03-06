<?php get_header(); ?>

    <div class="container">
        <div class="page-content">
            <?php if ( have_posts() ) :
                while ( have_posts() ) : the_post(); ?>
                    <header>
                        <h1><?php the_title();?></h1>
                    </header>
                    <div id="main">
                        <?php the_content(); ?>
                    </div>
                <?php endwhile; ?>
            <?php endif;?>
        </div>
    </div>

<?php get_footer(); ?>