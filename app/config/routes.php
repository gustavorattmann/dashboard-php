<?php

    $router->get('/', function() {
        echo "Página inicial";
    });
    
    $router->get('/contatos', function() {
        echo "Página de contatos";
        die();
    });

    $router->get('/teste/{teste}', function($teste) {
        echo "Agora foi recebido da URI o parâmetro: " . $teste;
    });
    
    $router->post('/contatos/store', "Controller@store");

?>