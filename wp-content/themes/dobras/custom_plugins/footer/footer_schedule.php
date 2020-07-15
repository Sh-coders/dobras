<?php
?>

<img src="<?php echo get_template_directory_uri() . '/img/sched.png' ?>" alt="company schedule icon">
<div class="info">
    <?php if ($theme_all_options['company_schedule_monday_start'] !== ''
        && $theme_all_options['company_schedule_monday_finish'] !== ''): ?>
        <p>
            <span>Пн.</span>
            <?php echo $theme_all_options['company_schedule_monday_start'] .
                " - " . $theme_all_options['company_schedule_monday_finish']; ?>
        </p>
    <?php endif; ?>
    <?php if ($theme_all_options['company_schedule_tuesday_start'] !== ''
        && $theme_all_options['company_schedule_tuesday_finish'] !== ''): ?>
        <p>
            <span>Вт.</span>
            <?php echo $theme_all_options['company_schedule_tuesday_start'] .
                " - " . $theme_all_options['company_schedule_tuesday_finish']; ?>
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
<?php
