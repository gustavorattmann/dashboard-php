<?php

    namespace Core;

    class Controller
    {
        protected function render(string $view, $data = [])
        {
            if (strpos($view, 'partials') === false) {
                $content = 'pages' . DS;
            } else {
                $content = '';
            }
            
            $loader = new \Twig\Loader\FilesystemLoader(VIEW_PATH);

            $twig = new \Twig\Environment($loader);

            echo $twig->render($content . $view . '.twig.php', $data);
        }
    }

?>