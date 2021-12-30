<?php

    namespace App\Controller;

    use Core\Controller;
    
    // use App\View\Pages\User\Index;

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