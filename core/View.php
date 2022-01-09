<?php

    namespace Core;

    class View
    {
        private $asset = [], $element = [], $content, $data = [];

        public function asset(string $name)
        {
            if (isset($name) && !empty($name)) {
                $css = [];
                $js = [];
                $img = [];

                if (strpos($name, 'css') == true) {
                    if (file_exists(CSS_PATH . $name)) {
                        array_push($css, $name);
                    } else {
                        echo "Arquivo $name não foi encontrado!";
                    }
                } else if (strpos($name, 'js') == true) {
                    if (file_exists(JS_PATH . $name)) {
                        array_push($js, $name);
                    } else {
                        echo "Arquivo $name não foi encontrado!";
                    }
                } else {
                    if (file_exists(IMG_PATH . $name)) {
                        array_push($img, $name);
                    } else {
                        echo "Arquivo $name não foi encontrado!";
                    }
                }

                $this->asset = [
                    'css' => $css,
                    'js' => $js,
                    'img' => $img
                ];
            }
        }

        public function element(string $name)
        {
            if (isset($name) && !empty($name)) {
                $verify = $name . '.html.twig';

                if (file_exists(VIEW_PATH . 'partials' . DS . $verify)) {
                    array_push($this->element, $verify);
                } else {
                    echo "Arquivo $name não foi encontrado!";
                }
            }
        }

        public function content(string $name)
        {
            if (isset($name) && !empty($name)) {
                $name = 'pages' . DS . $name . '.html.twig';

                if (file_exists(VIEW_PATH . $name)) {
                    $this->content = $name;
                } else {
                    echo "Arquivo $name não foi encontrado!";
                }
            }
        }

        public function set(array $data = [])
        {
            if (is_array($data)) {
                $this->data = $data;
            } else {
                $this->data = [];
            }
        }
        
        public function render()
        {
            if (!empty($this->asset)) {
                $asset = $this->asset;
            } else {
                $asset = '';
            }

            if (!empty($this->element)) {
                $element = $this->element;
            } else {
                $element = '';
            }

            if (!empty($this->content)) {
                $content = $this->content;
            } else {
                $content = '';
            }

            if (!empty($this->data)) {
                $data = $this->data;
            } else {
                $data = '';
            }
            
            $loader = new \Twig\Loader\FilesystemLoader(VIEW_PATH);

            $twig = new \Twig\Environment($loader, [
                'debug' => true,
                'auto_reload' => true,
                'cache' => CACHE_PATH
            ]);

            echo $twig->render('layout' . DS . 'default.html.twig', [
                'assets' => $asset,
                'elements' => $element,
                'content' => $content,
                'title' => NAME,
                'data' => $data
            ]);
        }
    }

?>