<?php

    namespace Tests;

    use PHPUnit\Framework\TestCase;
    use Src\Router;

    class RouterTest extends TestCase
    {
        public function testCheckIfFindRoute()
        {
            // Instância da rota com método e parâmetro da URL
            $router = new Router('GET', '/ola-mundo');

            // Rota para teste, retornando true
            $router->add('GET', '/ola-mundo', function () {
                return true;
            });

            // Execução do método para encontrar a rota atual
            $result = $router->handler();

            // Execução da ação da rota encontrada para obter o valor 
            $actual = $result();

            // Valor verdadeiro esperado que seja retornado pela execução acima
            $expected = true;

            // Verifica se o valor da ação da rota é o mesmo esperado pela validação
            $this->assertEquals($expected, $actual);
        }

        public function testCheckIfNotFindRoute()
        {
            $router = new Router('GET', '/ola-mundo');

            $router->add('GET', '/ola-mundo', function () {
                return true;
            });

            $result = $router->handler();

            $actual = $result;
            $expected = true;

            $this->assertEquals($expected, $actual);
        }

        public function testCheckIfNotFindRouteWrongMethod()
        {
            $router = new Router('GET', '/ola-gustavo');

            $router->add('GET', '/ola-{name}', function () {
                return true;
            });

            $result = $router->handler();

            $actual = $result();
            $expected = true;

            $this->assertEquals($expected, $actual);
        }

        public function testCheckIfFindRouteVariable()
        {

        }
    }

?>