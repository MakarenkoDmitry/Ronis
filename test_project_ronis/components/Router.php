<?php

class Router
{
    private $routes;
    private $config;

    public function __construct()
    {
        $routesPath = ROOT.'/config/routes.php';
        $this->routes = include($routesPath);
    }

    /**
     * Return request string
     * @return string
     */
    private function getUrl(){
        $configPath = ROOT.'/config/config.php';
        $paramsPath = ROOT."/config/config.php";
        $params = include($paramsPath);
        if (!empty($_SERVER['REQUEST_URI'])){
            return trim($_SERVER['REQUEST_URI'],'/');
        }

    }

    public function run(){
        $uri = $this->getUrl();
        foreach ($this->routes as $uriTamplates=>$path){
            if (preg_match("~$uriTamplates~",$uri)){
                $parseRoute = preg_replace("~$uriTamplates~",$path,$uri);
                $segments = explode('/',$parseRoute);

                $contorolerName = ucfirst(array_shift($segments).'Controller');
                $actionName = 'action'.ucfirst(array_shift($segments));
                $parametr = $segments;

                $controllerFile=ROOT.'\\controllers\\'.$contorolerName.'.php';
                if(file_exists($controllerFile)){
                    include_once($controllerFile);
                }

                $controllerObject = new $contorolerName;
                $result = $controllerObject->$actionName($parametr);
                if ($result!=null){
                    break;
                }

                break;
            }
        }
    }
}

?>