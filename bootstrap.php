<?php

    require_once "vendor/autoload.php";

    use App\Controller\UserController;
    session_start();

    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    if ($_ENV['APP_DEBUG'] == "true") {
        error_reporting(E_ALL);
        ini_set('display_errors', true);
    }

    require_once "app/config/config.php";

    try {
        // echo "Teste bootstrap";
        // die();

        require_once CONFIG_PATH . 'routes.php';
    } catch (\Exception $error) {
        echo $error->getMessage();
    }

?>