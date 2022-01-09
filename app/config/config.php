<?php

    # Definições globais
    define('NAME', $_ENV['APP_NAME']);
    define('DEBUG', $_ENV['APP_DEBUG']);
    define('URI', $_ENV['APP_URI']);

    # Definição dos diretórios
    define('DS', DIRECTORY_SEPARATOR);
    define('BASE_PATH', dirname(dirname(__DIR__)) . DS);
    define('APP_PATH', BASE_PATH . 'app' . DS);
    define('CORE_PATH', BASE_PATH . 'core' . DS);
    define('PUBLIC_PATH', BASE_PATH . 'public' . DS);
    // Sub diretórios de app
    define('CONFIG_PATH', APP_PATH . 'config' . DS);
    define('VIEW_PATH', APP_PATH . 'view' . DS);
    define('CACHE_PATH', VIEW_PATH . 'cache' . DS);
    // Sub diretórios de public
    define('CSS_PATH', PUBLIC_PATH . 'css' . DS);
    define('IMG_PATH', PUBLIC_PATH . 'img' . DS);
    define('JS_PATH', PUBLIC_PATH . 'js' . DS);

    # Configuração do banco de dados
    define('DB_DRIVER', $_ENV['DB_DRIVER'] ?? 'mysql');
    define('DB_HOST', $_ENV['DB_HOST'] ?? 'localhost');
    define('DB_PORT', $_ENV['DB_PORT'] ?? '3306');
    define('DB_USER', $_ENV['DB_USER'] ?? 'root');
    define('DB_PASSWORD', $_ENV['DB_PASSWORD'] ?? '');
    define('DB_DATABASE', $_ENV['DB_DATABASE'] ?? 'dashboard');

?>