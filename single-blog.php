<?php get_header(); ?>

    <div class="container">
        <div class="page-content">
            <?php if ( have_posts() ) :
                while ( have_posts() ) : the_post(); ?>
                    <header class="single-post-header">
                        <h1><?php the_title();?></h1>
                    </header>
                    <div id="main">
                        <small><?php the_date(); ?></small><br><br>
                        <?php the_content()?>
                    </div>
                <?php endwhile; ?>
            <?php endif;?>
        </div>
    </div>
    <div class="slide-out">
        <button type="button" class="close" aria-hidden="true">&times;</button>
        <a href="<?php echo get_post_type_archive_link( 'blog' ); ?>"><< View All Blog Posts</a>
    </div>

<?php get_footer(); ?>