<?php

    # Definição dos diretórios
    define('DS', DIRECTORY_SEPARATOR);
    define('BASE_PATH', dirname(dirname(__DIR__)) . DS);
    define('APP_PATH', BASE_PATH . 'app' . DS);
    define('SRC_PATH', BASE_PATH . 'src' . DS);
    define('CONFIG_PATH', APP_PATH . 'config' . DS);
    define('VIEW_PATH', APP_PATH . 'view' . DS);

    # Configuração do banco de dados

?>