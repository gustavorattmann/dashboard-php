<?php

    namespace App\Controller;

    use Core\View;

    class UserController
    {
        public function index()
        {
            $view = new View();
            
            $data = [
                "nome" => "Gustavo",
                "sobrenome" => "Rattmann"
            ];

            $view->render('partials/header');
            $view->render('user/index', $data);
        }
    }

?>