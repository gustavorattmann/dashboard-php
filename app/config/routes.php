<?php

    use CoffeeCode\Router\Router;

    $router = new Router("http://localhost/treinamento/dashboard");

    $router->namespace("App\Controller");
    $router->get('/', "UserController:index");

    $router->dispatch();

    // var_dump($router);
    // die();

    // if ($router->error()) {
    //     $router->
    // }

?>