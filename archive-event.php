<?php get_header(); ?>

    <div class="container">
        <div class="page-content">
            <header>
                <h1>Events</h1>
            </header>
            <div id="main">
                <?php $today = date('Ymd');
                $argsEvents = array(
                    'post_type' => 'event',
                    'meta_key' => 'event_start',
                    'orderby' => 'meta_value_num',
                    'order' => 'ASC',
                    'meta_query' => array(
                        array(
                            'key' => 'event_start',
                            'value' => $today,
                            'compare' => '>=',
                            'type' => 'datetime'
                        )
                    )
                );
                $events = new WP_Query( $argsEvents ); ?>
                <?php if ( have_posts() ) :
                    while ( $events->have_posts() ) : $events->the_post();?>
                        <div class="entry">
                            <?php if( get_field( "event_featured_image" ) ) { ?>
                                <figure class="pull-left col-md-2">
                                    <img class="img-responsive" src="<?php the_field( "event_featured_image" ) ?>">
                                </figure>
                            <?php }?>
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
                                <?php echo custom_field_excerpt('event_description',50); ?>
                            <?php }?>
                            <div class="clearfix"></div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; wp_reset_query(); ?>
                <?php
                $argsPastEvents = array(
                    'post_type' => 'event',
                    'meta_key' => 'event_start',
                    'orderby' => 'meta_value_num',
                    'order' => 'ASC',
                    'meta_query' => array(
                        array(
                            'key' => 'event_start',
                            'value' => $today,
                            'compare' => '<',
                            'type' => 'datetime'
                        )
                    )
                );
                $pastEvents = new WP_Query( $argsPastEvents ); ?>
                <?php if ( have_posts() ) : ?>
                    <div class="divide-events">
                        <h3>Past Events</h3>
                    </div>
                    <?php while ( $pastEvents->have_posts() ) : $pastEvents->the_post();?>
                        <div class="entry">
                            <?php if( get_field( "event_featured_image" ) ) { ?>
                                <figure class="pull-left col-md-2">
                                    <img class="img-responsive" src="<?php the_field( "event_featured_image" ) ?>">
                                </figure>
                            <?php }?>
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
                                <?php echo custom_field_excerpt('event_description',50); ?>
                            <?php }?>
                            <div class="clearfix"></div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; wp_reset_query(); ?>
            </div>
        </div>
    </div>

<?php get_footer(); ?>