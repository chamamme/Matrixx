<?php

/**
 * Created by PhpStorm.
 * User: Andrew Chamamme
 * Date: 15/07/2017
 * Time: 6:53 PM
 */

namespace App\Core;

use Exception;

class App
{

    public static $registry = [];

//    public function __construct() {
//
//        $this->registry = ;
//
//    }

    /**
     * Sets/Adds a global variable to the app registry
     * @param $key
     * @param $value
     */
    public static function bind($key, $value) {

        static::$registry[$key] = $value;

    }

    /**
     * Returns an app registry variable value
     * @param $key
     * @return mixed
     * @throws Exception
     */
    public static function get($key){

        if (array_key_exists($key,static::$registry)){

            return static::$registry[$key];

        }

        throw new Exception("{$key} does not exist in app registry list");
    }

}