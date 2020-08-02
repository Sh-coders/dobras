<?php global $theme_uri; ?>
<img class="lazy" src="" data-src="<?php echo $theme_uri . '/img/sched.png' ?>"
     alt="company schedule icon">
<div class="info">
    <?php
    $days_en = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];
    $days_uk = ['Пн.', 'Вт.', 'Ср.', 'Чт.', 'Пт.', 'Сб.', 'Нд.'];

    foreach ($days_en as $index => $day) {
        $day_start = 'company_schedule_' . $day . '_start';
        $day_finish = 'company_schedule_' . $day . '_finish';
        global $theme_all_options;

        if ($theme_all_options[$day_start] && $theme_all_options[$day_finish]) {
            echo "<p><span>$days_uk[$index]</span>$theme_all_options[$day_start]";
            echo " - ";
            echo $theme_all_options[$day_finish] . "</p>";
        }
    }
    ?>
</div>