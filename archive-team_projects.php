<?php get_header(); ?>

    <div class="container">
        <div class="page-content">
            <header>
                <h1>Teams</h1>
            </header>
            <div id="main">
                <?php $argsTeams = array( 'post_type' => 'team_projects' );
                $teams = new WP_Query( $argsTeams );
                if ( have_posts() ) :
                    while ( $teams->have_posts() ) : $teams->the_post();?>
                        <div class="entry">
                            <h4><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h4>
                            <?php if( get_field( "participants" ) ) { ?><i><?php the_field( "participants" );?></i><br><?php } ?>
                            <?php if( get_field( "team_excerpt" ) ) { ?>
                                <p> <?php the_field( "team_excerpt" );?></p>
                            <?php } else {
                                echo custom_field_excerpt('team_description',50);
                            }?>
                        </div>
                    <?php endwhile; ?>
                <?php endif; wp_reset_query(); ?>
            </div>
        </div>
    </div>

<?php get_footer(); ?>