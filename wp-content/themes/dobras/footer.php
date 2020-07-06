<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @package Dobras
 */
$theme_all_options = get_option('theme_options');
?>

<footer>
    <div class="footer-main container">
        <div class="footer-content">
            <h1><?php echo $theme_all_options['company_footer_fields_title']; ?></h1>
            <div class="footer-contacts">
                <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15.4375 1.78125C15.8333 1.86458 16.0312 2.10417 16.0312 2.5C16.0312 6.5 14.6146 9.91667 11.7812 12.75C8.94792 15.5833 5.53125 17 1.53125 17C1.13542 17 0.895833 16.8021 0.8125 16.4062L0.0625 13.1562C-0.0416667 12.7604 0.104167 12.4792 0.5 12.3125L4 10.8125C4.33333 10.6667 4.625 10.7396 4.875 11.0312L6.40625 12.9062C7.63542 12.3438 8.71875 11.5833 9.65625 10.625C10.6146 9.66667 11.375 8.58333 11.9375 7.375L10.0625 5.8125C9.77083 5.58333 9.69792 5.29167 9.84375 4.9375L11.3438 1.4375C11.5104 1.0625 11.7917 0.927083 12.1875 1.03125L15.4375 1.78125Z" fill="#D72E6D"/>
                </svg>
                <div class="info">
                    <p class="font-light">
                        <?php echo substr($theme_all_options['company_footer_phone1'], 0, 3); ?>
                        <span>
                            <?php echo substr($theme_all_options['company_footer_phone1'], 3); ?>
                        </span>
                    </p>
                    <p class="font-light">
                        <?php echo substr($theme_all_options['company_footer_phone2'], 0, 3); ?>
                        <span>
                            <?php echo substr($theme_all_options['company_footer_phone2'], 3); ?>
                        </span>
                    </p>
                    <p class="font-light">
                        <?php echo substr($theme_all_options['company_footer_phone3'], 0, 3); ?>
                        <span>
                            <?php echo substr($theme_all_options['company_footer_phone3'], 3); ?>
                        </span>
                    </p>
                </div>
            </div>
            <div class="footer-address-street">
                <svg width="12" height="16" viewBox="0 0 12 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5.375 15.6875C4.875 14.9583 4.30208 14.1354 3.65625 13.2188C3.03125 12.3021 2.58333 11.6562 2.3125 11.2812C2.04167 10.9062 1.72917 10.4479 1.375 9.90625C1.02083 9.34375 0.78125 8.94792 0.65625 8.71875C0.552083 8.48958 0.427083 8.19792 0.28125 7.84375C0.15625 7.48958 0.0729167 7.1875 0.03125 6.9375C0.0104167 6.66667 0 6.35417 0 6C0 4.33333 0.583333 2.91667 1.75 1.75C2.91667 0.583333 4.33333 0 6 0C7.66667 0 9.08333 0.583333 10.25 1.75C11.4167 2.91667 12 4.33333 12 6C12 6.35417 11.9792 6.66667 11.9375 6.9375C11.9167 7.1875 11.8333 7.48958 11.6875 7.84375C11.5625 8.19792 11.4375 8.48958 11.3125 8.71875C11.2083 8.94792 10.9792 9.34375 10.625 9.90625C10.2708 10.4479 9.95833 10.9062 9.6875 11.2812C9.41667 11.6562 8.95833 12.3021 8.3125 13.2188C7.6875 14.1354 7.125 14.9583 6.625 15.6875C6.47917 15.8958 6.27083 16 6 16C5.72917 16 5.52083 15.8958 5.375 15.6875ZM4.21875 7.78125C4.71875 8.26042 5.3125 8.5 6 8.5C6.6875 8.5 7.27083 8.26042 7.75 7.78125C8.25 7.28125 8.5 6.6875 8.5 6C8.5 5.3125 8.25 4.72917 7.75 4.25C7.27083 3.75 6.6875 3.5 6 3.5C5.3125 3.5 4.71875 3.75 4.21875 4.25C3.73958 4.72917 3.5 5.3125 3.5 6C3.5 6.6875 3.73958 7.28125 4.21875 7.78125Z" fill="#D72E6D"/>
                </svg>
                <div class="info">
                    <p class="font-light footer-address-country">
                        <?php echo $theme_all_options['company_country_town']; ?>
                    </p>
                    <p>
                        <?php echo $theme_all_options['company_street']; ?>
                    </p>
                    <p class="font-light">Як проїхати &rarr;</p>
                </div>
            </div>
            <div class="footer-schedule">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2.5 2.53125C4.02083 1.01042 5.85417 0.25 8 0.25C10.1458 0.25 11.9688 1.01042 13.4688 2.53125C14.9896 4.03125 15.75 5.85417 15.75 8C15.75 10.1458 14.9896 11.9792 13.4688 13.5C11.9688 15 10.1458 15.75 8 15.75C5.85417 15.75 4.02083 15 2.5 13.5C1 11.9792 0.25 10.1458 0.25 8C0.25 5.85417 1 4.03125 2.5 2.53125ZM9.78125 11.1875C9.98958 11.3333 10.1667 11.3125 10.3125 11.125L11.1875 9.90625C11.3333 9.69792 11.3125 9.52083 11.125 9.375L9.125 7.9375V3.625C9.125 3.375 9 3.25 8.75 3.25H7.25C7 3.25 6.875 3.375 6.875 3.625V8.875C6.875 9 6.92708 9.10417 7.03125 9.1875L9.78125 11.1875Z" fill="#D72E6D"/>
                </svg>
                <div class="info">
                    <?php if ($theme_all_options['company_schedule_monday_start'] !== ''
                        && $theme_all_options['company_schedule_monday_finish'] !== ''):?>
                        <p>
                            <span>Пн.</span>
                            <?php echo $theme_all_options['company_schedule_monday_start'] .
                                " - " . $theme_all_options['company_schedule_monday_finish'];?>
                        </p>
                    <?php endif; ?>
                    <?php if ($theme_all_options['company_schedule_tuesday_start'] !== ''
                        && $theme_all_options['company_schedule_tuesday_finish'] !== ''):?>
                        <p>
                            <span>Вт.</span>
                            <?php echo $theme_all_options['company_schedule_tuesday_start'] .
                                " - " . $theme_all_options['company_schedule_tuesday_finish'];?>
                        </p>
                    <?php endif; ?>
                    <?php if ($theme_all_options['company_schedule_wednesday_start'] !== ''
                        && $theme_all_options['company_schedule_wednesday_finish'] !== ''): ?>
                        <p>
                            <span>Ср.</span>
                            <?php echo $theme_all_options['company_schedule_wednesday_start'] .
                                " - " . $theme_all_options['company_schedule_wednesday_finish']; ?>
                        </p>
                    <?php endif; ?>
                    <?php if ($theme_all_options['company_schedule_thursday_start'] !== ''
                        && $theme_all_options['company_schedule_thursday_finish'] !== ''): ?>
                        <p>
                            <span>Чт.</span>
                            <?php echo $theme_all_options['company_schedule_thursday_start'] .
                                " - " . $theme_all_options['company_schedule_thursday_finish']; ?>
                        </p>
                    <?php endif; ?>
                    <?php if ($theme_all_options['company_schedule_friday_start'] !== ''
                        && $theme_all_options['company_schedule_friday_finish'] !== ''): ?>
                        <p>
                            <span>Пт.</span>
                            <?php echo $theme_all_options['company_schedule_friday_start'] .
                                " - " . $theme_all_options['company_schedule_friday_finish']; ?>
                        </p>
                    <?php endif; ?>
                    <?php if ($theme_all_options['company_schedule_saturday_start'] !== ''
                        && $theme_all_options['company_schedule_saturday_finish'] !== ''): ?>
                        <p>
                            <span>Сб.</span>
                            <?php echo $theme_all_options['company_schedule_saturday_start'] .
                                " - " . $theme_all_options['company_schedule_saturday_finish']; ?>
                        </p>
                    <?php endif; ?>
                    <?php if ($theme_all_options['company_schedule_sunday_start'] !== ''
                        && $theme_all_options['company_schedule_sunday_finish'] !== ''): ?>
                        <p>
                            <span>Нд.</span>
                            <?php echo $theme_all_options['company_schedule_sunday_start'] .
                                " - " . $theme_all_options['company_schedule_sunday_finish']; ?>
                        </p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="footer-map">
            Карта
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
