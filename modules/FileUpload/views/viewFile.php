<div class="container p-3">
    <h2>Просмотр файла</h2>
    <div class="card-body pt-5 pb-5">
        <h4>Текст файла:</h4>
        <?php echo $textArray['text'] ?>
    </div>
    <h4>Разбитый текст:</h4>
    <form method='POST' action='index.php?module=FileUpload&method=viewFile' class='d-inline'>
        <input type='hidden' name='fileName' value='<?php echo $textArray['fileName']; ?>'>
        <label>Введите свой разделитель: </label>
        <input name='symbol' value='<?php echo $textArray['symbol']; ?>'>
        <button type='submit' name='view' class='btn btn-primary btn-sm'>Применить</button>
    </form>
    <div class="card-body d-flex justify-content-center align-items-center file-upload">
        <table class="table table-striped">
            <thead>
            <tr class="text-center">
                <th scope="col">Строка</th>
                <th scope="col">Количество цифр в строке</th>
            </tr>
            </thead>
            <tbody>
            <?php
                foreach ($textArray['countDigits'] as $line => $digitCount) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($line) . "</td>";
                    echo "
                    <td class='text-end'>" . $digitCount . "</td>
                    ";
                    echo "</tr>";
                }
            ?>
            </tbody>
        </table>
    </div>
</div>