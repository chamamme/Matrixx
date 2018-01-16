<?php
/**
 * Created with PhpStorm.
 * User: Klaus
 * Date: 1/16/2018
 * Time: 10:56 AM
 * Validator class to handle all validations
 */

namespace App\Core;


use Illuminate\Container\Container;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Translation\FileLoader;
use Illuminate\Translation\Translator;
use Illuminate\Validation\Factory;

class Validator
{

    private static $validator;

    public function __construct()
    {
        $loader = new FileLoader(new Filesystem, 'lang');
        $translator = new Translator($loader, 'en');
        $validation = new Factory($translator, new Container);
        self::$validator = $validation;
    }

    public static function make(array $data,array $rules){
        return self::$validator->make($data, $rules);
    }

}