<?php

class Router {
	
	private $routes;
	
	public function __construct () {
		$routesPatch = ROOT.'/config/routes.php';
		$this->routes = include($routesPatch);
		
	}
	/**
         * Returns request string
         * @return string
         */
	private function getURI () {
	
		if (!empty($_SERVER['REQUEST_URI'])) {
			return trim($_SERVER['REQUEST_URI'], '/');
		}
	}
	
	public function run () {
		
                //Получить строку запроса
		$uri = $this->getURI();
		
		//Наличие такого запроса в routes.php
		
		foreach ($this->routes as $uriPattern =>$path) {
			
			//Сравниваем "~$uriPattern~", $uri
			if (preg_match("~$uriPattern~", $uri)) {
				
				// Получаем внутренний путь из внешнего согласно правилу
				$internalRoute = preg_replace("~$uriPattern~", $path, $uri);

				//Определяем какой контролер и action обрабатывают запроса
				
				$segments = explode('/' , $internalRoute);
				//обрезка названия сайта
				//array_shift($segments);
				
				$controllerName = ucfirst(array_shift($segments).'Controller');
				
				$actionName = 'action'.ucfirst(array_shift($segments));
				$parameters = $segments;
				
				
				//Подключить file класса контроллера
				$controllerFile = ROOT. '/controllers/'.$controllerName.'.php';
				
				if (file_exists($controllerFile)) {
					include_once($controllerFile);
				}
				

				//Создаем объект вызыаем метод (action)
				$controllerObject = new $controllerName;
				$result = call_user_func_array(array($controllerObject, $actionName),$parameters);
				
				
				if ($result != null) {
					break;
				}

			}
		}
	}



}