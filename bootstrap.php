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

    $method = $_SERVER['REQUEST_METHOD'];
    $uri = $_SERVER['PATH_INFO'] ?? '/';

    try {
        $router = new Router($method, $uri);

        require_once CONFIG_PATH . 'routes.php';

        $result = $router->handler();

        if (!$result) {
            http_response_code(404);
            echo "Página não encontrada!";
            die();
        }

        echo $result($router->getParams());
    } catch (\Exception $error) {
        echo $error->getMessage();
    }

?>