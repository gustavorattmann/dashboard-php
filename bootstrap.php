<?php

    require_once "vendor/autoload.php";

    use App\Controller\UserController;
    session_start();

    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    require_once "app/config/config.php";

    if (DEBUG == "true") {
        error_reporting(E_ALL);
        ini_set('display_errors', true);
    } else {
        error_reporting(0);
        ini_set('display_errors', false);
    }

    try {
        require_once CONFIG_PATH . 'routes.php';
    } catch (\Exception $error) {
        echo $error->getMessage();
    }

?>