<?php

    namespace Core;

    class View
    {
        public function render(string $view = null, $data = [])
        {
            $header = '';
            $content = '';
            $footer = '';
            
            if (isset($view) && !empty($view)) {
                if (strpos($view, 'partials') === false) {
                    $content = 'pages' . DS . $view . '.html.twig';
                } else {
                    if (strpos($view, 'header') === true)  {
                        $header = $view . '.html.twig';
                    } else  {
                        $footer = $view . '.html.twig';
                    }
                }
            }

            $loader = new \Twig\Loader\FilesystemLoader(VIEW_PATH);

            $twig = new \Twig\Environment($loader);

            echo $twig->render('layout' . DS . 'default.html.twig', [
                'header' => $header,
                'content' => $content,
                'footer' => $footer,
                'data' => $data
            ]);
        }
    }

?>