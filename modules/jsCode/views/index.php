<div class="container">

    <p>Тип &nbsp; &nbsp;<select name="type_val"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select></p>

    <p>Поле 1&nbsp; &nbsp;<input name="input_1" type="text" /></p>

    <p>&nbsp;</p>

    <p>Поле 2&nbsp; &nbsp;<input name="input_2" type="text" /></p>

    <p>&nbsp;</p>

    <p>Поле 3&nbsp; &nbsp;<input name="input_3" type="text" /></p>

    <p>Поле 4&nbsp; &nbsp;<input name="input_4" type="text" /></p>

    <p>Поле 5&nbsp; &nbsp;<input name="input_5" type="text" /></p>

    <p>Поле 6&nbsp; &nbsp;<input name="input_6" type="text" /></p>

    <p>Поле 7&nbsp; &nbsp;<input name="input_7" type="text" /></p>

    <p><input name="button_12" type="button" value="Кнопка 1" /></p>

    <p><input name="button_28" type="button" value="Кнопка 2" /></p>

    <p><input name="button_88" type="button" value="Кнопка 4" /></p>

    <p><input name="button_33" type="button" value="Кнопка 3" /></p>

    <p><input name="button_1" type="button" value="Кнопка 8" /></p>

</div>
<hr>
<div class="container">
    <h4>Скрипт js для использования в консоли</h4>
</div>
<div class="code-js">
    <div class="code-container">
        // <span class="comment">Функция для фильтрации полей по выбранному значению</span>
        <span class="keyword">function</span> filterFields() {
        // <span class="comment">Получаем выбранное значение из поля "Тип"</span>
        <span class="keyword">const</span> typeSelect = <span class="keyword">document</span>.<span class="keyword">querySelector</span>(<span class="string">'select[name="type_val"]'</span>);
        <span class="keyword">const</span> selectedValue = typeSelect.<span class="keyword">value</span>;

        // <span class="comment">Получаем все элементы input на странице</span>
        <span class="keyword">const</span> fields = <span class="keyword">document</span>.<span class="keyword">querySelectorAll</span>(<span class="string">'input'</span>);

        fields.<span class="keyword">forEach</span>(field => {
        // <span class="comment">Проверяем, содержится ли выбранное значение в атрибуте name</span>
        <span class="keyword">if</span> (field.name.<span class="keyword">includes</span>(selectedValue)) {
        field.<span class="keyword">style</span>.<span class="keyword">display</span> = <span class="string">''</span>; // Показываем поле
        } <span class="keyword">else</span> {
        field.<span class="keyword">style</span>.<span class="keyword">display</span> = <span class="string">'none'</span>; // Скрываем поле
        }
        });
        }

        // <span class="comment">Добавляем обработчик события на изменение выбора в поле "Тип"</span>
        <span class="keyword">document</span>.<span class="keyword">querySelector</span>(<span class="string">'select[name="type_val"]'</span>).<span class="keyword">addEventListener</span>(<span class="string">'change'</span>, filterFields);

        // <span class="comment">Вызываем функцию при загрузке страницы для начальной настройки</span>
        <span class="keyword">window</span>.<span class="keyword">addEventListener</span>(<span class="string">'load'</span>, filterFields);
    </div>
</div>



