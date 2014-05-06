<?php get_header(); ?>

    <div class="container">
        <div class="page-content">
            <header>
                <h1>Challenges</h1>
            </header>
            <div id="main">
                <?php $argsChallenge = array( 'post_type' => 'challenge' );
                $challenge = new WP_Query( $argsChallenge );
                if ( have_posts() ) :
                    while ( $challenge->have_posts() ) : $challenge->the_post();?>
                        <div class="entry">
                            <?php if( get_field( "challenge_icon" ) ) { ?>
                                <figure class="pull-left col-md-3">
                                    <img class="img-responsive" src="<?php the_field( "challenge_icon" ) ?>">
                                </figure>
                            <?php }?>
                            <h4><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h4>
                            <?php if( get_field( "challenge_excerpt" ) ) { ?>
                                <p> <?php the_field( "challenge_excerpt" );?></p>
                            <?php } else {
                                echo custom_field_excerpt('challenge_description',50);
                            }?>
                        </div>
                    <?php endwhile; ?>
                <?php endif; wp_reset_query(); ?>
            </div>
        </div>
    </div>

<?php get_footer(); ?>