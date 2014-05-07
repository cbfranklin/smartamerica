<?php get_header(); ?>

    <div id="sections-wrap">
        <section class="section-block" id="challenges">
            <div class="container">
                <h2><a href="<?php echo get_post_type_archive_link( 'challenge' ); ?>">Challenges</a></h2>
                <div class="categories">
                    <ul>
                        <?php $argsChallenges = array( 'post_type' => 'challenge' );
                        $challenges = new WP_Query( $argsChallenges );
                        if ( have_posts() ) :
                            while ( $challenges->have_posts() ) : $challenges->the_post();?>
                                <li class="col-md-6">
                                    <a href="<?php the_permalink();?>">
                                        <img class="img-responsive pull-left" src="<?php the_field( "challenge_icon" );?>" alt="<?php the_title();?>">
                                        <h3><?php the_title();?></h3>
                                        <?php if( get_field( "challenge_excerpt" ) ) { ?>
                                            <p> <?php the_field( "challenge_excerpt" );?></p>
                                        <?php } else {
                                            echo custom_field_excerpt('challenge_description',15);
                                        }?>
                                    </a>
                                </li>
                            <?php endwhile; ?>
                        <?php endif; wp_reset_query(); ?>
                        <div class="clearfix"></div>
                    </ul>
                </div>
            </div>
        </section>
        <section class="section-block" id="teams">
            <div class="container">
                <h2><a href="<?php echo get_post_type_archive_link( 'team_projects' ); ?>">Teams</a></h2>
                <div id="slider-wrap" class="col-md-6 col-md-offset-3">
                    <div id="teams-slider">
                        <?php $argsTeams = array( 'post_type' => 'team_projects', 'orderby' => 'rand' );
                        $teams = new WP_Query( $argsTeams );
                        if ( have_posts() ) :
                            while ( $teams->have_posts() ) : $teams->the_post();?>
                                <article>
                                    <header>
                                        <hgroup>
                                            <h3><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
                                            <h6>
                                            <?php
                                                $leads = get_field( "team_leads" );
                                            switch ($leads) {
                                                case 1:?>
                                                    <?php if (get_field( "team_lead_email_1" )) { ?>
                                                        <?php if (get_field( "team_lead_email_1" )) { ?>
                                                            <a href="mailto:<?php the_field ('team_lead_email_1') ?>"><?php the_field('team_lead_name_1' )?></a>
                                                            <?php if (get_field( "team_lead_misc_1" )) { ?>
                                                                ,&nbsp; <?php the_field( "team_lead_misc_1" )?>
                                                            <?php } ?>
                                                        <?php } else { ?>
                                                            <?php the_field('team_lead_name_1' )?>
                                                            <?php if (get_field( "team_lead_misc_1" )) { ?>
                                                                ,&nbsp; <?php the_field( "team_lead_misc_1" )?>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    <?php } ?>

                                                    <?php break; ?>
                                                <?php case 2: ?>
                                                    <?php if (get_field( "team_lead_email_1" )) { ?>
                                                        <a href="mailto:<?php the_field ('team_lead_email_1') ?>"><?php the_field('team_lead_name_1' )?></a>
                                                        <?php if (get_field( "team_lead_misc_1" )) { ?>
                                                            ,&nbsp; <?php the_field( "team_lead_misc_1" )?>
                                                        <?php } ?>
                                                    <?php } else { ?>
                                                        <?php the_field('team_lead_name_1' )?>
                                                        <?php if (get_field( "team_lead_misc_1" )) { ?>
                                                            ,&nbsp; <?php the_field( "team_lead_misc_1" )?>
                                                        <?php } ?>
                                                    <?php } ?>

                                                    <?php if (get_field( "team_lead_email_2" )) { ?>
                                                       &nbsp; | &nbsp;<a href="mailto:<?php the_field ('team_lead_email_2')
                                                    ?>"><?php the_field('team_lead_name_2' )?></a>
                                                        <?php if (get_field( "team_lead_misc_2" )) { ?>
                                                            ,&nbsp; <?php the_field( "team_lead_misc_2" )?>
                                                        <?php }  ?>
                                                    <?php } else { ?>
                                                        &nbsp; | &nbsp; <?php the_field('team_lead_name_2' )?>
                                                        <?php if (get_field( "team_lead_misc_2" )) { ?>
                                                            ,&nbsp; <?php the_field( "team_lead_misc_2" )?>
                                                        <?php } ?>
                                                    <?php } ?>

                                                    <?php break;  ?>

                                                <?php case 3: ?>
                                                    <?php if (get_field( "team_lead_email_1" )) { ?>
                                                        <a href="mailto:<?php the_field ('team_lead_email_1') ?>"><?php the_field('team_lead_name_1' )?></a>
                                                        <?php if (get_field( "team_lead_misc_1" )) { ?>
                                                            ,&nbsp; <?php the_field( "team_lead_misc_1" )?>
                                                        <?php } ?>
                                                    <?php } else { ?>
                                                        <?php the_field('team_lead_name_1' )?>
                                                        <?php if (get_field( "team_lead_misc_1" )) { ?>
                                                            ,&nbsp; <?php the_field( "team_lead_misc_1" )?>
                                                        <?php } ?>
                                                    <?php } ?>

                                                    <?php if (get_field( "team_lead_email_2" )) { ?>
                                                        &nbsp; | &nbsp; <a href="mailto:<?php the_field ('team_lead_email_2')
                                                        ?>"><?php the_field('team_lead_name_2' )?></a>
                                                        <?php if (get_field( "team_lead_misc_2" )) { ?>
                                                            ,&nbsp; <?php the_field( "team_lead_misc_2" )?>
                                                        <?php }  ?>
                                                    <?php } else { ?>
                                                        &nbsp; | &nbsp; <?php the_field('team_lead_name_2' )?>
                                                        <?php if (get_field( "team_lead_misc_2" )) { ?>
                                                            ,&nbsp; <?php the_field( "team_lead_misc_2" )?>
                                                        <?php } ?>
                                                    <?php } ?>

                                                    <?php if (get_field( "team_lead_email_3" )) { ?>
                                                        &nbsp; | &nbsp; <a href="mailto:<?php the_field ('team_lead_email_3')
                                                        ?>"><?php the_field('team_lead_name_3' )?></a>
                                                        <?php if (get_field( "team_lead_misc_3" )) { ?>
                                                            ,&nbsp; <?php the_field( "team_lead_misc_3" )?>
                                                        <?php }  ?>
                                                    <?php } else { ?>
                                                        &nbsp; | &nbsp; <?php the_field('team_lead_name_3' )?>
                                                        <?php if (get_field( "team_lead_misc_3" )) { ?>
                                                            ,&nbsp; <?php the_field( "team_lead_misc_3" )?>
                                                        <?php } ?>
                                                    <?php } ?>
                                                     <?php break;  ?>
                                                <?php default:
                                                    echo "";  }?></h6>
                                        </hgroup>
                                        <?php if( get_field( "team_excerpt" ) ) { ?>
                                            <p> <?php the_field( "team_excerpt" );?></p>
                                        <?php } else {
                                            echo custom_field_excerpt('team_description',50);
                                        }?>
                                            <a href="<?php the_permalink();?>">Visit the team page >></a>
                                    </header>
                                    <div class="clearfix"></div>
                                </article>
                            <?php endwhile; ?>
                        <?php endif; wp_reset_query(); ?>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </section>
        <section class="section-block" id="events">
            <div class="container">
                <?php $counter = 0;
                $today = date('Ymd'); ?>
                <?php $argsEvents = array(
                    'post_type' => 'event',
                    'posts_per_page' => 5,
                    'meta_key' => 'event_start',
                    'orderby' => 'meta_value_num',
                    'order' => 'ASC',
                    'meta_query' => array(
                        array(
                            'key' => 'event_start',
                            //'meta-value' => $value,
                            'value' => $today,
                            'compare' => '>=',
                            'type' => 'datetime'
                        )
                    )
                );
                $events = new WP_Query( $argsEvents ); ?>
                    <h2><a href="<?php echo get_post_type_archive_link( 'event' ); ?>">Events</a></h2>
                    <?php if ( have_posts() ) :
                        while ( $events->have_posts() ) : $events->the_post();?>
                            <?php if ($counter == 0) { ?>
                                <article class="featured-event col-md-10 col-md-offset-1 ">
                                    <div class="row">
                                        <figure class="col-md-4 col-md-offset-1 col-sm-4">
                                            <a href="<?php the_permalink();?>"><img class="img-responsive" src="<?php the_field( "event_featured_image"); ?>" alt="<? the_title(); ?>"></a>
                                        </figure>
                                        <div class="col-md-6 col-md-offset-1 col-sm-8">
                                            <h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
                                            <?php if( get_field( "event_end" ) ) { ?>
                                                <?php $startDate = DateTime::createFromFormat('Ymd',get_field('event_start'));?>
                                                <?php $endDate = DateTime::createFromFormat('Ymd',get_field('event_end'));?>
                                                <i><?php echo $startDate->format('M d');?> - <?php echo $endDate->format('M d, Y');?></i><br>
                                            <?php } else { ?>
                                                <?php $date = DateTime::createFromFormat('Ymd',get_field('event_start'));?>
                                                <i><?php echo $date->format('M d, Y');?></i><br>
                                            <?php } ?>
                                            <?php if( get_field( "event_excerpt" ) ) { ?>
                                                <p> <?php the_field( "event_excerpt" );?></p>
                                            <?php } else { ?>
                                                <?php echo custom_field_excerpt('event_description',8); ?>
                                            <?php }?>
                                            <a href="<?php the_permalink(); ?>">Learn More >></a>
                                        </div>
                                    </div>
                                </article>
                                <div class="clearfix"></div>
                                <ul class="row col-md-10 col-md-offset-1" id="events-bar">
                                <?php $counter++; ?>
                                <?php } else { ?>
                                    <li class="col-md-3">
                                        <a href="<?php the_permalink();?>">
                                            <h4><?php the_title();?></h4>
                                            <?php if( get_field( "event_end" ) ) { ?>
                                                <?php $startDate = DateTime::createFromFormat('Ymd',get_field('event_start'));?>
                                                <?php $endDate = DateTime::createFromFormat('Ymd',get_field('event_end'));?>
                                                <i><?php echo $startDate->format('M d');?> - <?php echo $endDate->format('M d, Y');?></i><br>
                                            <?php } else { ?>
                                                <?php $date = DateTime::createFromFormat('Ymd',get_field('event_start'));?>
                                                <i><?php echo $date->format('M d, Y');?></i><br>
                                            <?php } ?>
                                            <?php if( get_field( "event_excerpt" ) ) { ?>
                                                <p> <?php the_field( "event_excerpt" );?></p>
                                            <?php } else { ?>
                                                <?php echo custom_field_excerpt('event_description',10); ?>
                                            <?php }?>
                                        </a>
                                    </li>
                                <?php } ?>
                        <?php endwhile; ?>
                    <?php endif; wp_reset_query(); ?>
                                    <div class="clearfix"></div>
                                </ul>
            </div>
        </section>
    </div>



<?php get_footer(); ?>