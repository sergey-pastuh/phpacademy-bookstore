<?php
namespace Library;

class Router
{
    private $map;
    public $controller = null;
    public $action = null;
    

    public function __construct($routesFile)
    {
        $this->map = require(CONF_DIR . $routesFile);
    }
    
    private function isAdminUri($uri)
    {
        return strpos($uri, '/admin') === 0;
    }

    public function match(Request $request)
    {
        $uri = $request->getURI();

        if ($this->isAdminUri($uri)) {
            Controller::setAdminLayout();
        }
        
        foreach ($this->map as $route) {
            
            $regex = $route->pattern;
            
            foreach ($route->params as $k => $v) {
                $regex = str_replace('{' . $k . '}', '(' . $v . ')', $regex);
            }
            
            if (preg_match('@^' . $regex . '$@', $uri, $matches)) {
                array_shift($matches);
                if ($matches) {
                    $matches = array_combine(array_keys($route->params), $matches);
                    $request->mergeGet($matches);
                }
                $this->controller = 'Controller\\' . $route->controller;
                $this->action = $route->action . 'Action';
                break;
            }
        }
        

        if (is_null($this->controller) || is_null($this->action)) {
            throw new \Exception('Route not found: ' . $uri, 404);
        }
    }
    
    public static function redirect($to)
    {
        header('Location: ' . $to);
        die;
    }
    
    public function getRouteUri($routeName, array $params = array())
    {
    }
}