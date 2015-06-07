<?php
/**
 * @package rdt-rnr15
 * @subpackage footer
 * @since 0.0.0
 */
?>

<nav class="footer-link-outer">
    <div class="footer-link-toggler-outer">

    </div>
    <?php 
        // $footer_link_defaults = array(
        //     'theme_location'  => 'footer-link',
        //     'container'       => 'div',
        //     'container_class' => 'footer-link',
        //     'menu_class'      => 'nav',
        //     'menu_id'         => 'footer-link-list'
        // );

        // wp_nav_menu ( $footer_link_defaults );
    ?>
</nav>

</div><!-- #page -->

<?php
    printrr(get_current_template());
?>

<?php wp_footer(); ?>

</body>
</html>
