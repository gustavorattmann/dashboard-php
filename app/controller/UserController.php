<?php

    namespace App\Controller;

    use Core\Controller;

    class UserController extends Controller
    {
        public function index()
        {
            $data = [
                "nome" => "Gustavo",
                "sobrenome" => "Rattmann"
            ];

            $this->render('partials/header');
            $this->render('user/index', $data);
        }
    }

?>