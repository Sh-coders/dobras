<?php ?>
    <img src="<?php echo get_template_directory_uri() . '/img/sched.png' ?>" alt="company schedule icon">
    <div class="info">
        <?php
        $days_en = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];
        $days_uk = ['Пн.', 'Вт.', 'Ср.', 'Чт.', 'Пт.', 'Сб.', 'Нд.'];

        for ($i = 0; $i < count($days_en); $i++) {
            $day_start = 'company_schedule_' . $days_en[$i] . '_start';
            $day_finish = 'company_schedule_' . $days_en[$i] . '_finish';

            if ($theme_all_options[$day_start] && $theme_all_options[$day_finish]) {
                echo "<p><span>$days_uk[$i]</span>$theme_all_options[$day_start]";
                echo " - ";
                echo $theme_all_options[$day_finish] . "</p>";
            }
        }
        ?>
    </div>