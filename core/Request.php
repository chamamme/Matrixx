<?php

/**
 * Created by PhpStorm.
 * User: klaus
 * Date: 15/07/2017
 * Time: 5:53 PM
 */
namespace App\Core;

class Request {


    public function __construct()
    {

    }

    /**
     * Get URI but before lets trim it and take out the preceding folder name from it
     * leaving just the uri
     * @return string
     */

    public static function uri(){
        $config = require '../config.php';

        //get just the url without the parameters;
        $url = parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
        //remove base path from the url
        $url = str_replace("/{$config['base_path']}/","",$url);
        //trim out all preceding and proceeding forward slashes
        $url = trim($url,'/');
//        die($url);
        return $url;
    }

    /**
     * Returns the request method
     * @return mixed
     */
    public static function method(){
        return $_SERVER['REQUEST_METHOD'];
    }
}