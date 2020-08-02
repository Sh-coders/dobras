// Поиск элементов в таблице админпанели и изменение их класса (корректировка отображения графика работы в Параметрах темы)
document.addEventListener('DOMContentLoaded', function(){
    let tbody = document.querySelectorAll("tbody");
    tbody.forEach(x => {
        if (x.querySelector("input[type=time]")) {
            x.classList.add("time-flex")
        }
    });
});