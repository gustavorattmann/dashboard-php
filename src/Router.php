<?php

    namespace Src;

    use Src\Request;
    use Src\Dispatcher;
    use Src\RouteColletion;

    class Router
    {
        protected $route_collection;

        public function __construct()
        {
            $this->route_collection = new RouteCollection;
            $this->dispatcher = new Dispatcher;
        }

        public function get($pattern, $callback)
        {
            $this->route_collection->add('get', $pattern, $callback);

            return $this;
        }

        public function post($pattern, $callback)
        {
            $this->route_collection->add('post', $pattern, $callback);

            return $this;
        }

        public function put($pattern, $callback)
        {
            $this->route_collection->add('put', $pattern, $callback);

            return $this;
        }

        public function delete($pattern, $callback)
        {
            $this->route_collection->add('delete', $pattern, $callback);

            return $this;
        }

        public function find($request_type, $pattern)
        {
            return $this->route_collection->where($request_type, $pattern);
        }

        protected function getValues($pattern, $positions)
        {
            $result = [];

            $pattern = array_filter(explode('/', $pattern));

            foreach ($pattern as $key => $value) {
                if (in_array($key, $positions)) {
                    $result[array_search($key, $positions)] = $value;
                }
            }

            return $result;
        }

        protected function dispatch($route, $params, $namespace = "App\\")
        {
            return $this->dispatcher->dispatch($route->callback, $params, $namespace);
        }

        protected function notFound()
        {
            return header("HTTP/1.0 404 Not Found", true, 404);
        }

        public function resolve($request)
        {
            $route = $this->find($request->method(), $request->uri());

            if ($route) {
                $params = $route->callback['values'] ? $this->getValues($request->uri(), $route->callback['values']) : [];  

                return $this->dispatch($route, $params);
            } else {
                return $this->notFound();
            }
        }
    }

?>