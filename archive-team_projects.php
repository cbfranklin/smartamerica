<?php get_header(); ?>

    <div class="container">
        <div class="page-content">
            <header>
                <h1>Teams</h1>
            </header>
            <div id="main">
                <?php
                $temp = $teams;
                $teams = null;
                $argsTeams = array( 'post_type' => 'team_projects', 'posts_per_page' => 12, 'paged' => $paged );
                $teams = new WP_Query( $argsTeams );
                    while ( $teams->have_posts() ) : $teams->the_post();?>

                        <div class="entry">
                            <?php if( get_field( "featured_image_custom" ) ) { ?>
                                <figure class="pull-left col-md-2">
                                    <img class="img-responsive" src="<?php the_field( "featured_image_custom" ) ?>">
                                </figure>
                            <?php }?>
                            <h4><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h4>
                            <?php if( get_field( "participants" ) ) { ?><i><?php the_field( "participants" );?></i><br><?php } ?>
                            <?php if( get_field( "team_excerpt" ) ) { ?>
                                <p> <?php the_field( "team_excerpt" );?></p>
                            <?php } else {
                                echo custom_field_excerpt('team_description',50);
                            }?>
                            <div class="clearfix"></div>
                        </div>
                    <?php endwhile; ?>
                    <nav class="navigation">
                        <?php wpbeginner_numeric_posts_nav(); ?>
                    </nav>
                    <?php
                    $teams = null;
                    $teams = $temp;  // Reset
                    ?>
            </div>
        </div>
    </div>

<?php get_footer(); ?>