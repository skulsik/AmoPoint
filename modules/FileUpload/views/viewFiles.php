<div class="container p-3">
    <h2>Список загруженных файлов</h2>
    <div class="card-body d-flex justify-content-center align-items-center file-upload">
    <?php
    if (isset($files['success']))
    {
        echo '
            <table class="table table-striped">
               <thead>
                   <tr class="text-center">
                       <th scope="col">Имя файла</th>
                       <th scope="col">Действие</th>
                   </tr>
               </thead>
               <tbody>
        ';
        foreach ($files['success'] as $file) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($file) . "</td>";
            echo "
                <td class='text-end'>
                    <form method='POST' action='index.php?module=FileUpload&method=viewFile' class='d-inline'>
                        <input type='hidden' name='fileName' value='" . htmlspecialchars($file) . "'>
                        <button type='submit' name='view' class='btn btn-primary btn-sm'>Посмотреть файл</button>
                    </form>
                    <form method='POST' action='index.php?module=FileUpload&method=deleteFile' class='d-inline'>
                        <input type='hidden' name='fileName' value='" . htmlspecialchars($file) . "'>
                        <button type='submit' name='delete' class='btn btn-danger btn-sm' onclick=\"return confirm('Вы уверены, что хотите удалить этот файл?');\">Удалить</button>
                    </form>
                </td>
            ";
            echo "</tr>";
        }
        echo '
               </tbody>
            </table>
        ';
    }
    else
    {
        echo '<div class="circle circle-red p-3">'.$files['error'].'</div>';
    }
    ?>
    </div>
</div>