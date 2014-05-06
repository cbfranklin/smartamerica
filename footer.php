<div class="container">
    <footer class="section-block" id="footer">
        <nav role="navigation">
            <?php  $defaults = array(
            'theme_location'  => 'footer_nav',
            'container'       => false,
            'menu_class'      => false,
            'items_wrap'      => '<ul class="col-md-7 col-md-offset-3">%3$s</ul>'
            );  wp_nav_menu( $defaults ); ?>
        </nav>
        <aside>
            <i class="pull-left">Site built by &nbsp;</i><a class="pull-left" href="http://gsa.gov"
            target="_blank"><img
                    src="<?php bloginfo ('template_url'); ?>/images/gsa-logo.png" class="img-responsive"></a>
        </aside>
    </footer>
</div>


	<?php wp_footer(); ?>
</body>
</html>