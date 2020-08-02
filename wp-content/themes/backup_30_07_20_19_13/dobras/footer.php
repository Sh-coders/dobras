<?php
/**
 * The template for displaying the footer
 *
 * @package Dobras
 */
?>
<footer id="footer">
    <div class="footer-main container">
        <div class="footer-content">
            <h2><?php echo get_option('theme_options')['company_footer_fields_title']; ?>
            </h2>
            <div class="footer-contacts">
                <?php get_template_part('front/footer/footer_contacts'); ?>
            </div>
            <div class="footer-address-street">
                <?php get_template_part('front/footer/footer_address'); ?>
            </div>
            <div class="footer-schedule">
                <?php get_template_part('front/footer/footer_schedule'); ?>
            </div>
        </div>
        <div class="footer-map">
            <div id = "map"></div>
        </div>
    </div>

    <div class="rights-reserved">
        БФ Час добра та милосердя © Copyright <?php echo date('Y') ?>. All Rights Reserved.
    </div>
</footer>
</div><!-- #page -->

<?php
do_action('script_footer_map');
wp_footer();
?>

</body>
</html>