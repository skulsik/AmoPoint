<?php

namespace services;

class File
{
    public function __construct()
    {
        $this->error = '';
        $this->uploadMessage = '';
        $this->targetDir = "modules/FileUpload/files/";
    }

    // Получение ошибки
    protected function getError()
    {
        return $this->error;
    }

    // Получение сообщения после загрузки файла
    public function getUploadMessage()
    {
        return $this->uploadMessage ? ['success' => $this->uploadMessage] : ['error' => $this->getError()];
    }

    // Загрузка файла
    public function FileUpload()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            // Оригинальное имя файла
            $originalFileName = basename($_FILES["fileToUpload"]["name"]);
            // Путь до файла
            $targetFile = $this->targetDir . $originalFileName;
            // Тип файла
            $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

            // Проверка, существует ли папка, если нет, создание
            if (!is_dir($this->targetDir)) {
                mkdir($this->targetDir, 0777, true);
            }

            // Проверка на ошибки при загрузке файла
            if ($_FILES["fileToUpload"]["error"] !== UPLOAD_ERR_OK) {
                $this->error = 'Произошла ошибка при загрузке файла.';
            }

            // Проверка размера файла (не более 10MB)
            if ($_FILES["fileToUpload"]["size"] > 10 * 1024 * 1024) {
                $this->error = 'Файл слишком большой.';
            }

            // Ограничение типов файлов (только txt)
            $allowedTypes = ['txt'];
            if (!in_array($fileType, $allowedTypes)) {
                $this->error = 'Разрешены только файлы типа: TXT.';
            }

            // Проверка наличия файла с таким же именем и добавление уникальных символов
            if (file_exists($targetFile)) {
                // Генерация уникального имени файла с добавлением времени и случайных символов
                $uniqueSuffix = '_' . time() . '_' . bin2hex(random_bytes(3)); // Пример: _1693416520_ab12cd
                $targetFile = $this->targetDir . pathinfo($originalFileName, PATHINFO_FILENAME) . $uniqueSuffix . '.' . $fileType;
            }

            // Если все проверки пройдены, загрузка файла
            if (!$this->error) {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
                    $this->uploadMessage = 'Файл успешно загружен: ' . htmlspecialchars(basename($targetFile));
                } else {
                    $this->error = 'Ошибка при загрузке файла в папку.';
                }
            }
        }
    }

    // Загрузка имен файлов
    public function readFiles()
    {
        // Проверка, существует ли папка
        if (is_dir($this->targetDir))
        {
            // Получение списка файлов и директорий
            $files = scandir($this->targetDir);

            // Фильтрация только файлов
            $targetDir = $this->targetDir;
            $fileList = array_filter($files, function($file) use ($targetDir) {
                return is_file($targetDir . $file);
            });

            // Проверка, есть ли файлы для отображения
            if (!empty($fileList)) {
                return ['success' => $fileList];
            } else {
                $this->error = "Файлы не найдены в папке.";
            }
        }
        else
        {
            $this->error = "Папка для загрузки файлов не существует.";
        }

        return ['error' => $this->getError()];
    }

    // Удаление файла
    public function deleteFile()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $fileToDelete = $this->targetDir . basename($_POST['fileName']);
            if (unlink($fileToDelete)) {
                return ['success' => 'Файл успешно удален.'];
            } else {
                $this->error = 'Не удалось удалить файл.';
            }
        }
        else $this->error = 'Нет POST запроса.';

        return ['error' => $this->getError()];
    }

    // Просмотр файла
    public function viewFile()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $filePath = $this->targetDir . basename($_POST['fileName']);
            $text = file_get_contents($filePath);

            $symbol = '=';
            if (isset($_POST['symbol'])) $symbol = $_POST['symbol'];

            // Разбиение текста по символу новой строки
            $textArray = explode($symbol, $text);

            // Массив для хранения строки и количества цифр
            $countDigits = [];

            // Регулярное выражение для поиска цифр
            $pattern = '/\d/';

            foreach ($textArray as $line) {
                // Подсчет количества цифр в строке
                preg_match_all($pattern, $line, $matches);
                $digitCount = count($matches[0]);

                // Добавление строки и количества цифр в массив
                $countDigits[$line] = $digitCount;
            }

            return ['text' => $text, 'countDigits' => $countDigits, 'symbol' => $symbol, 'fileName' => $_POST['fileName']];
        }

        return null;
    }
}