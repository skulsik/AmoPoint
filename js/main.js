// Функция для фильтрации полей по выбранному значению
function filterFields() {
    // Получаем выбранное значение из поля "Тип"
    const typeSelect = document.querySelector('select[name="type_val"]');
    const selectedValue = typeSelect.value;

    // Получаем все элементы input на странице
    const fields = document.querySelectorAll('input');

    fields.forEach(field => {
        // Проверяем, содержится ли выбранное значение в атрибуте name
        if (field.name.includes(selectedValue)) {
            field.style.display = ''; // Показываем поле
        } else {
            field.style.display = 'none'; // Скрываем поле
        }
    });
}

// Добавляем обработчик события на изменение выбора в поле "Тип"
document.querySelector('select[name="type_val"]').addEventListener('change', filterFields);

// Вызываем функцию при загрузке страницы для начальной настройки
window.addEventListener('load', filterFields);