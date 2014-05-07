<?php get_header(); ?>

    <div class="container">
        <div class="page-content">
            <header>
                <h1>Smart America Blog</h1>
            </header>
            <div id="main">
                <?php $argsBlog = array( 'post_type' => 'blog' );
                $blogs = new WP_Query( $argsBlog );
                if ( have_posts() ) :
                    while ( $blogs->have_posts() ) : $blogs->the_post();?>
                        <div class="entry">
                            <?php if( get_field( "featured_image_custom" ) ) { ?>
                                <figure class="pull-left col-md-2">
                                    <img class="img-responsive" src="<?php the_field( "featured_image_custom" ) ?>">
                                </figure>
                            <?php }?>
                            <h4><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h4>
                            <?php the_excerpt();?>
                            <div class="clearfix"></div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; wp_reset_query(); ?>
            </div>
        </div>
    </div>

<?php get_footer(); ?>