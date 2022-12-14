<?php

namespace App\Core;

class Router
{

    public $routes = [
        'GET' => [],
        'POST' => []
    ];

    public $authenticatedRoutes = [
        'GET' => [],
        'POST' => []
    ];

    public static function load($routesFile)
    {

        $router = new self;

        require $routesFile;

        return $router;
    }

    public function get($uri, $controller, $auth = false)
    {

        $this->routes['GET'][$uri] = $controller;

        if ($auth) {
            $this->authenticatedRoutes['GET'][$uri] = $controller;
        }

    }

    public function post($uri, $controller, $auth = false)
    {

        $this->routes['POST'][$uri] = $controller;

        if ($auth) {
            $this->authenticatedRoutes['POST'][$uri] = $controller;
        }

    }

    public function loadController($uri, $method)
    {
        if (array_key_exists($uri, $this->routes[$method])) {
            if (array_key_exists($uri, $this->authenticatedRoutes[$method]) && !$this->guard()) {
                return redirect('/login');
            }

            $value = $this->routes[$method][$uri];
            $value = explode('@', $value);
            $controller_name = "\\App\\Controllers\\" . $value[0];
            $controller = new $controller_name;
            $method = $value[1];
            return $controller->$method();

        }

        return $this->call('PagesController','error404');
    }

    public function guard()
    {
        return ($_SESSION['user']);
    }

    protected function call($controllerName, $methodName) {
        $controllerName= "App\\Controllers\\" .$controllerName;
        $controller = new $controllerName;
        if( !method_exists($controller, $methodName)) {
            throw new \Exception('This method does not exist on a controller');
        }
        return $controller->$methodName();

    }
}
