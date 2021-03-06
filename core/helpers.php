<?php
/**
 * Created by PhpStorm.
 * User: Andrew Chamamme
 * Date: 16/07/2017
 * Time: 4:03 PM
 */
use App\Core\App;

use App\Core\Response;
use Illuminate\Container\Container;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\Request;
use Illuminate\Translation\FileLoader;
use Illuminate\Translation\Translator;
use Illuminate\Validation\Factory;

/**
 * return a view
 * @param $name
 * @param array $data
 * @return mixed
 */
function view($name, array $data = null){
    $file = "../app/views/{$name}.view.php";
    if($data){ extract($data);}
    $is_module = strpos('::',$name);
    if($is_module){
        $modules_path = config('module')['namespace'];
        $exp = explode('::',$name);
        $module = $exp[0];
        $view = $exp[1];
        $file = "../{$modules_path}/{$module}/views/{$view}.view.php";
//        $file = "../".config('module')['namespace'].'/'.$module.'/views/'.$view;
    }
    return require $file;
}

/**
 * @param $key
 * @return mixed
 * @throws Exception
 */
function config($key){
    return App::get('config')[$key];
}

/**
 * @return mixed
 * @throws Exception
 */
function db(){
    return App::get('db');
}

/**
 * Returns Request instance
 * @return Request
 */
function request(){
    return Request::capture();
}

function response($data, $status_code =200){
    Response::output($data,$status_code);
}

function validator(array $data=[],array $rules=[],$messages = null){
    $loader = new FileLoader(new Filesystem, 'lang');
    $translator = new Translator($loader, 'en');
    $validation = new Factory($translator, new Container);
    $result = $validation;

    #Set default messages if custom  messages are not set
    if(empty($messages)){
        $messages = require 'lang/en/validation.php';
    }
    if(!empty($data) && !empty($rules)){
        $result =  $validation->make($data,$rules,$messages);
    }

    return $result;
}


function capsule($table){
    return Capsule::table($table);
}