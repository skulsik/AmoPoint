<?php

namespace Controllers;

use services\File;

require_once 'modules/FileUpload/services/File.php';

/**
 * Контроллер модуля FileUpload
*/
class Controller
{
    public function index()
    {
        include 'modules/FileUpload/views/index.php';
    }

    public function upload()
    {
        // Сохранение файла
        $fileUpload = new File();
        $fileUpload->FileUpload();
        $message = $fileUpload->getUploadMessage();

        // Подключение представления и передача данных
        include 'modules/FileUpload/views/uploadConfirm.php';
    }

    // Просмотр списка файлов
    public function viewFiles()
    {
        // Чтение списка файлов
        $files_obj = new File();
        $files = $files_obj->readFiles();

        include 'modules/FileUpload/views/viewFiles.php';
    }

    // Удаление файла
    public function deleteFile()
    {
        $deleteFile = new File();
        $message = $deleteFile->deleteFile();

        include 'modules/FileUpload/views/deleteConfirm.php';
    }

    // Просмотр файла
    public function viewFile()
    {
        $file = new File();
        $textArray = $file->viewFile();

        include 'modules/FileUpload/views/viewFile.php';
    }
}