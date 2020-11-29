<?php

use Library\Request;
use Library\Session;
use Library\Controller;
use Library\Router;
use Library\Container;
use Library\RepositoryManager;
use Library\DbConnection;
use Library\ImageUploader;
use Library\DbConnectionAwareTrait;
use Controller\ErrorController;
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', __DIR__ . DS . '..' . DS);
define('VIEW_DIR',ROOT .'View' . DS);
define('CONF_DIR',ROOT .'Config' . DS);
define('MODEL_DIR', ROOT .  'Model' . DS);


spl_autoload_register(function ($className) {
    $file = ROOT .  str_replace('\\', '/', "{$className}.php");
    
    if (!file_exists($file)) {
        throw new \Exception("{$className} not found", 500);
    }

   	require_once $file;
   });

try {
	Session::start();
	$container = new Container();
	$request = new Request();
	$router = new Router('routes.php');
	$container->set('router',$router);
	$dbConnection = new DbConnection('mysql:host=127.0.0.1:3307;dbname=id15532490_bookstore','root','');
	$container->set('db_connection', $dbConnection);
	$repositoryManager = new RepositoryManager();
	$repositoryManager->setDbConnection($dbConnection);
	$container->set('repo_manager',$repositoryManager);
	
	$router->match($request);
	$controller = $router->controller;
	$action = $router->action;
	$controller = new $controller();
	$controller->setContainer($container);
	if(!method_exists($controller, $action))
	{
		throw new \Exception("Method {$action} not found", 500);
	}
	$content = $controller->$action($request);
} catch(\Exception $e) {
	$controller = new ErrorController($e);
	$content = $controller->errorAction($request);
}
echo $content;
?>