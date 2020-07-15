<?php
/**
 * The template for displaying the footer
 *
 * @package Dobras
 */
$theme_all_options = get_option('theme_options');
?>
<footer id="footer">
    <div class="footer-main container">
        <div class="footer-content">
            <h2><?php echo $theme_all_options['company_footer_fields_title']; ?></h2>
            <div class="footer-contacts">
               <?php include 'custom_plugins/footer/footer_contacts.php' ?>
            </div>
            <div class="footer-address-street">
                <?php include 'custom_plugins/footer/footer_address.php' ?>
            </div>
            <div class="footer-schedule">
                <?php include 'custom_plugins/footer/footer_schedule.php' ?>
            </div>
        </div>
        <div class="footer-map">

        </div>
    </div>

    <div class="rights-reserved">
        БФ Час добра та милосердя © Copyright <?php echo date('Y') ?>. All Rights Reserved.
    </div>
</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
