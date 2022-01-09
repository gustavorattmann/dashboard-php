<?php

    namespace App\Controller;

    use Core\Controller;
    use Core\View;

    class UserController extends Controller
    {
        public function index()
        {
            $view = new View();
            
            $data = [
                "nome" => "Gustavo",
                "sobrenome" => "Rattmann"
            ];

            $view->element('footer');
            $view->element('header');
            $view->content('user/index');
            $view->set($data);
            $view->render();
        }
    }

?>