<?php

namespace App\Services\Router;

use App\Core\Request;
use App\Services\View\View;

class Router
{
    const baseControllers = "\\App\\Controllers\\";
    const baseMiddlewares = "\\App\\Middlewares\\";


    public static function start()
    {
        // echo "Router Starts!";
        //get all routes (load address book)
        //var_dump($this->routes);
        // check if route exist

        $current_uri = self::get_current_uri();
        // var_dump($current_uri);
        $current_route = self::get_current_route($current_uri)['name'];
        // dd($current_route);
        if (self::route_exists($current_route)) {
            $request = new Request;
            if (!empty(self::get_current_route($current_uri)['params'])) {
                $request->params = self::get_current_route($current_uri)['params'];
            }
            //var_dump($request);
            $allowed_methods = self::get_route_methods($current_route);
            if (!$request->is_in($allowed_methods)) {
                View::load("errors.403");
                die();
            }
            //check middleware
            if (self::has_middleware($current_uri)) {
                $middlewares = self::get_route_middlewares($current_route);
                foreach ($middlewares as  $middleware) {
                    $middlewareClass = self::baseMiddlewares . $middleware;
                    if (!class_exists($middlewareClass)) {
                        echo "Error: Class '$middlewareClass' was not found";
                        die();
                    }
                    //var_dump($middlewareClass);
                    $middlewareObject = new $middlewareClass;
                    $middlewareObject->handle($request);
                }
            }
            //call controller method
            //get rout target(Controller & Method)
            $targetStr = self::get_route_target($current_route);
            // echo $targetStr;
            list($controller, $method) = explode('@', $targetStr);
            $controller = self::baseControllers . $controller;
            if (!class_exists($controller)) {
                echo "Error: Class '$controller' was not found";
                die();
            }
            //create an object from target Controller and call the method
            $controllerObject = new $controller;
            if (!method_exists($controllerObject, $method) && (IS_DEV_MODE)) {
                echo "Error: Method '$method' was not found in '$controller'";
                die();
            }
            $controllerObject->$method($request);
        } else {
            //if rout not exist: 404.php
            header("HTTP/1.0 404 Not Found");
            View::load("errors.404");
            die();
        }
    }



    //Methods:
    public static function get_all_routes()
    {
        $route_files = glob(BASE_PATH . "routes/*.php");
        $all_routes = array();
        foreach ($route_files as $filepath) {
            $file_routes = include $filepath;
            if (!is_array($file_routes)) {
                continue;
            }
            $all_routes = array_merge($all_routes, $file_routes);
        }
        return  $all_routes;
    }



    public static function route_exists($route)
    {
        $routes = self::get_all_routes();
        //var_dump(array_keys($routes));
        return in_array($route, array_keys($routes));
    }


    public static function get_route_target($route)
    {
        $routes = self::get_all_routes();
        return $routes[$route]['target'];
    }


    public static function get_current_uri()
    {
        return urldecode($_SERVER['REQUEST_URI']);
    }


    public static function get_route_methods($route)
    {
        $routes = self::get_all_routes();
        $method_str = $routes[$route]['method'];
        return explode("|", $method_str);
    }



    public static function get_route_middlewares($route)
    {
        $routes = self::get_all_routes();
        $middlewareStr = GLOBAL_MIDDLEWARE . "|" . ($routes[$route]['middleware'] ?? "");
        return removeEmptyMembers(explode("|", $middlewareStr));
    }


    public static function has_middleware($route)
    {
        $routes = self::get_all_routes();
        return isset($routes[$route]['middleware']) or !empty(GLOBAL_MIDDLEWARE);
    }


    public static function get_current_route($uri)
    {
        $current_route = [];
        $routes = array_keys(self::get_all_routes());
        foreach ($routes as $route) {
            $patternAsRegex = self::getRegex($route);
            if (preg_match($patternAsRegex, $uri, $matches)) {
                $params = array_intersect_key(
                    $matches,
                    array_flip(array_filter(array_keys($matches), 'is_string'))

                );
                $current_route['name'] = $route;
                $current_route['params'] = $params;
            }
            if (empty($current_route['name'])) {
                $current_route['name'] = strtok($uri, "?");
            }
        }
        return $current_route;
    }

    public static function getRegex($route)
    {
        if (!preg_match('/[^-:\/_{}()a-zA-Z\d]/', $route)) {
            $route = preg_replace('#\(/\)#', '/?', $route);
            $allowedParamChars = '[ا-یa-zA-Z0-9\_\-\s]+';
            $route = preg_replace(
                '/{(' . $allowedParamChars . ')}/',    # Replace "{parameter}"
                '(?<$1>' . $allowedParamChars . ')', # with "(?<parameter>[a-zA-Z0-9\_\-]+)"
                $route
            );

            $routeAsRegex = "@^" . $route . "$@u";
            // echo $routeAsRegex;
            return $routeAsRegex;
        }
        return false; // Invalid route
    }
}
