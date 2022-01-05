<?php

    # Definição dos diretórios
    define('DS', DIRECTORY_SEPARATOR);
    define('BASE_PATH', dirname(dirname(__DIR__)) . DS);
    define('APP_PATH', BASE_PATH . 'app' . DS);
    define('SRC_PATH', BASE_PATH . 'src' . DS);
    define('CONFIG_PATH', APP_PATH . 'config' . DS);
    define('VIEW_PATH', APP_PATH . 'view' . DS);

    # Configuração do banco de dados
    define('DB_DRIVER', $_ENV['DB_DRIVER'] ?? 'mysql');
    define('DB_HOST', $_ENV['DB_HOST'] ?? 'localhost');
    define('DB_PORT', $_ENV['DB_PORT'] ?? '3306');
    define('DB_USER', $_ENV['DB_USER'] ?? 'root');
    define('DB_PASSWORD', $_ENV['DB_PASSWORD'] ?? '');
    define('DB_DATABASE', $_ENV['DB_DATABASE'] ?? 'dashboard');

?>