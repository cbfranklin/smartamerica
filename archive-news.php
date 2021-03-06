<?php get_header(); ?>

    <div class="container">
        <div class="page-content">
            <header>
                <h1>News</h1>
            </header>
            <div id="main">
                <?php
                $temp = $news;
                $news = null;
                $argsNews = array( 'post_type' => 'news','posts_per_page' => 12, 'paged' => $paged );
                $news = new WP_Query( $argsNews );
                    while ( $news->have_posts() ) : $news->the_post();?>
                        <div class="entry">
                            <?php if( get_field( "featured_image_custom" ) ) { ?>
                                <figure class="pull-left col-md-2">
                                    <img class="img-responsive" src="<?php the_field( "featured_image_custom" ) ?>">
                                </figure>
                            <?php }?>
                            <h4><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h4>
                            <?php if( get_field( "news_excerpt" ) ) { ?>
                                <p> <?php the_field( "news_excerpt" );?></p>
                            <?php } else {
                                echo custom_field_excerpt('news_description',50);
                            }?>
                            <div class="clearfix"></div>
                        </div>
                    <?php endwhile; ?>
                    <nav class="navigation">
                        <?php wpbeginner_numeric_posts_nav(); ?>
                    </nav>
                    <?php
                    $news = null;
                    $news = $temp;  // Reset
                    ?>
            </div>
        </div>
    </div>

<?php get_footer(); ?>