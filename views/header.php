<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Aleksey">
    <title>777</title>
    <!-- Bootstrap core CSS -->
    <link href="/node_modules/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    <link href="/node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/node_modules/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="/css/file-upload.css">
    <link rel="stylesheet" href="/css/js-code.css">
    <script src="/js/main.js"></script>
<body>

<header class="p-3 bg-dark text-white">
    <div class="container my-5">
        <div class="row">
            <div class="col-md-4">
                <a href="index.php?module=FileUpload" class="rectangle-link bg-light">
                    <h5>Работа с файлом</h5>
                    <p>Загрузка и сохранение файла. Чтение и разбиение файла заданным символом. Вывод массива построчно на страницу.</p>
                </a>
            </div>
            <div class="col-md-4">
                <a href="index.php?module=jsCode" class="rectangle-link bg-light">
                    <h5>JS скрипт</h5>
                    <p>В зависимости от выбранного значения поля "тип" отражает разный набор полей на странице.</p>
                </a>
            </div>
            <div class="col-md-4">
                <a href="#" class="rectangle-link bg-light">
                    <h5>Счетчик посещений страницы</h5>
                    <p>Скрипт собирает необходимые данные и записывает в бд для дальнейшего использования данных статистики.</p>
                </a>
            </div>
        </div>
    </div>
</header>

<?php
    if ($module == 'FileUpload') echo '
        <div class="container text-primary text-lg-start pt-3">
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 mb-md-0">
                <li><a href="index.php?module=FileUpload" class="nav-link px-2"><i class="bi bi-file-earmark-plus text-dark"></i> Загрузка файла</a></li>
                <li><a href="index.php?module=FileUpload&method=viewFiles" class="nav-link px-2"><i class="bi bi-files text-dark"></i> Просмотр всех файлов</a></li>
            </ul>
        </div>
    ';
?>

<hr>