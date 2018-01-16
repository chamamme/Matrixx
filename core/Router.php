<?php
/**
 * Created by PhpStorm.
 * User: klaus
 * Date: 15/07/2017
 * Time: 3:28 PM
 */

namespace App\Core;

use Exception;

class Router {

    public static $routes = [
        "GET"   =>  [],
        "POST"  =>  []
    ];

    /**
     * @param $file
     * @return Router
     * @throws Exception
     */
    public static function load($file){

        $router = new self();
        //check if the file exists
        if(file_exists($file)){

            require $file;

            return $router;

        }

        throw new Exception("Router file does not exist");

    }

    /**
     * @param $uri
     * @param $controller
     */

    public function get($uri ,$controller){

        self::$routes['GET'][$uri] = $controller;

    }

    /**
     * Adds a POST request URI to the routes
     * @param $uri
     * @param $controller
     */
    public function post($uri ,$controller){

        self::$routes['POST'][$uri] = $controller;

    }
    /**
     * @param array $routes
     */

    public function define(array $routes){

        self::$routes = $routes;

    }


    /**
     * @param $uri
     * @return mixed
     * @throws Exception
     */
    public function direct($uri){

        $request_method = Request::method();

        //Check if the uri matches our list of routes
        //then get the controller file
        if(array_key_exists($uri,self::$routes[$request_method])){

            $destination = self::$routes[$request_method][$uri];//something@action

//            $array = explode("@", $destination);
//
//            $controller = $array[0];
//
//            $action = $array[1];
//
//            $this->callAction($controller,$action);

            return $this->callAction(...explode("@", $destination));

        }

        throw new Exception('404 not found! or Bad method');

    }

    /**
     * returns a controller/ function methods
     * @param $controller
     * @param $action
     * @return mixed
     * @throws Exception
     */
    protected function callAction($controller , $action){
        $namespace = 'App\\Controllers';
//        $controller =  "App\\Controllers\\{$controller}";
        //Check if its a module controller or normal controller
        if(strpos($controller,'::')){
            $exploded = explode('::',$controller);
            $module = ucwords($exploded[0]);
            $controller = ucwords($exploded[1]);
            $namespace = config('module')['namespace'].'\\'.$module.'\\Controllers';
        }
        $controller = "{$namespace}\\{$controller}";
        $controller =  new $controller;
//        dd($controller);
        if (! method_exists($controller, $action)){

            throw new Exception("Undefined method {$action} for {$controller} or class not found");

        }

        return (new $controller)->$action();

    }
}