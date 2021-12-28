<?php

    // registro as rotas
    $router->get('/', function () {
        return 'Olá mundo';
    });

    $router->get('/ola-{nome}', function ($params) {
        return 'Olá ' . $params[1];
    });

?>