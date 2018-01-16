<?php
use App\Core\Request;
use App\Core\Router;
use Illuminate\Container\Container;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Translation\FileLoader;
use Illuminate\Translation\Translator;
use Illuminate\Validation\Factory;

require "../vendor/autoload.php";
require "../core/bootstrap.php";
require "../core/helpers.php";
require "../vendor/illuminate/support/helpers.php";

/**
 * Get URI
 */
//$uri = trim($_SERVER['REQUEST_URI'],"/{$config['base_path']}");
$uri = Request::uri();
/**
 * Load the route file and direct to the the server uri
 * This at the end returns a controller method i.e SomethingController->action()
 */
$module = config('module');

//$exists = file_exists($module_json);
if($module){
    $module_path = $module['path'];
    $modules = $module['modules'];
//    dd(require "");
    foreach($modules as $module){
       $router= Router::load("../{$module_path}/{$module}/route.php");
    }
    #load main router
    $router= Router::load("../app/routes.php");
}


//dd(Router::$routes);
//Router::load("../app/modules/modules.php")->direct($uri);
$router->direct($uri);
