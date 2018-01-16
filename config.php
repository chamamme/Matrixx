<?php
/**
 * Created by PhpStorm.
 * User: klaus
 * Date: 15/07/2017
 * Time: 2:49 PM
 */

return [
    'app' => [
        'name' => 'OMVC',
        'description' => 'A simple but robust  MVC structure',
        'author' => "Chamamme Andrew",
    ],
    'database' => [
        /**
         * Model
         * Specifies the database model to use
         * Current possible models are [eloquent,adodb];
         */
        'model' => '',#Eloquent/adodb

        'driver' =>'mysql',
        'host' =>'localhost',
        'database'=> 'omvc',
        'username'=> 'root',
        'password'=> '',
        'connection'=> 'mysql:host=127.0.0.1',
        'prefix'=> '',
        'charset'   => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
    ],
    'base_path' => 'omvc/public',
    'module' =>[
        'path' =>'app\\modules',
        'namespace' => 'App\\Modules',
        'modules' =>['Admin']
    ],
];