<?php

$app = new App(); 

class App {

    public static $config;
    
    public function __construct() {
        include('config/config.php');
        include('core/Controller.php');
        self::$config = $config;
        $this->route();
    }

    public static function show404()
    {
        header("HTTP/1.0 404 Not Found");
        exit();
    }
    
    private function route() {
        $params = explode('/', $_SERVER['REQUEST_URI']);
        $filePath = $this->parseURL($params);
        $class = $this->loadClass($filePath);
        $this->executeMethod($class, $params);
    }
    
    private function parseURL($params)
    {
        if (empty($params[1])) {
            $directory = self::$config['index_directory'];
            $controller = self::$config['index_controller'];
        } else {
            $directory = $params[1];
            $controller = $params[2];
        }
        $filePathArr = array(
            'controllers',
            $directory,
            $controller . '.php',
        );
        $filePath = implode('/', $filePathArr);
        if (!file_exists($filePath)) {
            $this->show404();
        } 
        return $filePath;
    }
    
    public static function loadClass($filePath)
    {
        include($filePath);
        $className = end(get_declared_classes());
        $class = new $className();
        return $class;
    }
    
    private function executeMethod($class, $params)
    {
        if (!isset($params[3])) {
            $class->index();
        } else {
            $this->runMethodWithParams($class, $params);
        }
    }
    
    private function runMethodWithParams($class, $params)
    {
        $methodParams = array_slice($params, 4);
        call_user_func_array(array($class, $params[3]), $methodParams);
    }
    
}
?>

