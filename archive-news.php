<?php get_header(); ?>

    <div class="container">
        <div class="page-content">
            <header>
                <h1>News</h1>
            </header>
            <div id="main">
                <?php $argsNews = array( 'post_type' => 'news' );
                $news = new WP_Query( $argsNews );
                if ( have_posts() ) :
                    while ( $news->have_posts() ) : $news->the_post();?>
                        <div class="entry">
                            <h4><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h4>
                            <?php if( get_field( "news_excerpt" ) ) { ?>
                                <p> <?php the_field( "news_excerpt" );?></p>
                            <?php } else {
                                echo custom_field_excerpt('news_description',50);
                            }?>
                        </div>
                    <?php endwhile; ?>
                <?php endif; wp_reset_query(); ?>
            </div>
        </div>
    </div>

<?php get_footer(); ?>