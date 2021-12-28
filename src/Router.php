<?php

    namespace Src;

    class Router
    {
        // Variável responsável por armazenar as rotas registradas
        private $routes = [];
        // Variável responsável por armazenar o método atual
        private $method;
        // Variável responsável por armazenar a url atual
        private $uri;
        // Variável responsável por armazenar os parâmetros da url
        private $params;

        // Injeção do método e url atual na classe
        public function __construct($method, $uri)
        {
            $this->method = $method;
            $this->uri = $uri;
        }

        // Atalho para a função add para as rotas do método tipo get
        public function get(string $route, callable $action)
        {
            $this->add('GET', $route, $action);
        }

        // Atalho para a função add para as rotas do método tipo get
        public function post(string $route, callable $action)
        {
            $this->add('POST', $route, $action);
        }

        // Passa a ação da rota para um array com método e rota atual, para evitar duplicidade
        // Antes de passar a ação para o array, é verificado se a rota atual e método existem, se não existir é criado o array
        public function add(string $method, string $route, callable $action)
        {
            $this->routes[$method][$route] = $action;
        }

        public function getParams()
        {
            return $this->params;
        }

        // Função para encontrar a rota
        public function handler()
        {
            // Verifica se o método existe, se não existir, retorna falso
            if (empty($this->routes[$this->method])) {
                return false;
            }

            // Verifica se a url foi registrada para o método solicitado e retorna a ação
            if (isset($this->routes[$this->method][$this->uri])) {
                return $this->routes[$this->method][$this->uri];
            }

            foreach ($this->routes[$this->method] as $route => $action) {
                $result = $this->checkUrl($route, $this->uri);

                if ($result >= 1) {
                    return $action;
                }
            }

            // Se não achar a rota, retorna falso
            return false;
        }

        public function checkUrl(string $route, $uri)
        {
            preg_match_all('/\{([^\}]*)\}/', $route, $variables);

            $regex = str_replace('/', '\/', $route);

            foreach ($variables[0] as $key => $variable) {
                $replacement = '([a-zA-Z0-9\-\_\ ]+)';
                $regex = str_replace($variable, $replacement, $regex);
            }

            $regex = preg_replace('/{([a-zA-Z]+)}/', '([a-zA-Z0-9+])', $regex);

            $result = preg_match('/^' . $regex . '$/', $uri, $params);

            $this->params = $params;

            return $result;
        }
    }

?>