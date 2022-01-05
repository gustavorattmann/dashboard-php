<?php

    use CoffeeCode\Router\Router;

    $router = new Router("http://localhost/treinamento/dashboard");

    $router->namespace("App\Controller");
    $router->get('/', "UserController:index");

    $router->dispatch();

?>