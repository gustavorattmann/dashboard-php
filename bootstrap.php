<?php

    require_once "vendor/autoload.php";
    require_once "app/config/config.php";

    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    if ($_ENV['APP_DEBUG'] == "true") {
        error_reporting(E_ALL);
        ini_set('display_errors', true);
    }

    use Src\Router;

    session_start();

    try {
        $router = new Router;

        require_once CONFIG_PATH . 'routes.php';
    } catch (\Exception $error) {
        echo $error->getMessage();
    }

?>