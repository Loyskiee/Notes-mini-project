<?php
namespace Core;

/*crate a Router class with 
    each method that accepts uri and controller path and
    stores it to a protected array of routes*/
class Router 
{

    protected $routes = [];

    public function add($method, $uri, $controller)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method
        ];
    }

    /* They are used when the user requests something from 
    * the uri, the router will give them
    * the specific route
    */
    public function get($uri, $controller)
    {
        $this->add('GET', $uri, $controller);
    }

    public function post($uri, $controller)
    {
       $this->add('POST', $uri, $controller);     
    }

     public function delete($uri, $controller)
    {
       $this->add('DELETE', $uri, $controller);     
    }

     public function patch($uri, $controller)
    {
       $this->add('PATCH', $uri, $controller);     
    }

      public function put($uri, $controller)
    {
       $this->add('PUT', $uri, $controller);     
    }
    
    /* add a route method()
    * It will check all routes for a matching URI and method
    */
    public function route($uri, $requestMethod)
    {
        foreach ($this->routes as $route) {
            if($route['uri'] === $uri && $route['method'] === strtoupper($requestMethod)){
            require basePath($route['controller']);
            }
        }
            $this->abort();
    }

    public function abort ($code = 404)
    {
        http_response_code($code);

        require basePath("views/{$code}.php");

        die();
    }
}