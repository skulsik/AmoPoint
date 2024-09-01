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
        include 'modules/jsCode/views/index.php';
    }
}