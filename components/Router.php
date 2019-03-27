<?php

/**
 * Class Router
 */
class Router
{
    /**
     * @var mixed
     */
    private $routes;

    /**
     * Router constructor.
     */
    public function __construct()
    {
        $routesPath = ROOT.'/config/routes.php';
        $this->routes = include($routesPath);
    }

    /**
     * Возвращает текущий Url
     * @return string
     */
    private function checkURI() : string
    {
        if(!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    /**
     * В MVC системе по текущей строке запроса определяет соответсвующие контроллер (controller) и обработчик (action)
     */
    public function run() {
        $uri = $this->checkURI();

        foreach ($this->routes as $uriPattern => $path) {

            if(preg_match("~$uriPattern~", $uri)) {

                // получаем внутренний путь из внешнего
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

                // определение конторллера и action метода
                $segments = explode('/', $internalRoute);

                $controllerName = ucfirst(array_shift($segments).'Controller');
                $actionName = 'action'.ucfirst(array_shift($segments));

                $parametrs = $segments;

                // подключение файла класса-контроллера
                $controllerFile = ROOT.'/controllers/'.$controllerName.'.php';

                if(file_exists($controllerFile)) {
                    include_once($controllerFile);
                }

                // создание объекта, вызов action, реализация полиморфизма при созаднии и вызове
                $controllerObject = new $controllerName;

                // вызов action у controllerObject с передачей ему массива parameters в качестве отдельных переменных
                $result = call_user_func_array(array($controllerObject, $actionName), $parametrs);

                if($result !== null) {
                    break;
                }
            }
        }
    }
}