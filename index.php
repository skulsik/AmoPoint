<?php

// Определение страницы
$module = isset($_GET['module']) ? $_GET['module'] : 'FileUpload';
$method = isset($_GET['method']) ? $_GET['method'] : 'index';

// Подключение контроллера
require_once 'modules/'.$module.'/Controllers/Controller.php';

// Формирование страницы
include ('views/header.php');

// Создание экземпляра контроллера и вызов метода
if (class_exists(\Controllers\Controller::class)) {
    $controllerInstance = new \Controllers\Controller();
    if (method_exists($controllerInstance, $method)) {
        $controllerInstance->$method();
    } else {
        echo "Метод $method не существует в контроллере $module.";
    }
} else {
    echo "Контроллер $module не существует.";
}

include ('views/footer.php');