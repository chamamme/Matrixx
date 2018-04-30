<?php

/**
 * Created by PhpStorm.
 * User: Andrew Chamamme
 * Date: 15/07/2017
 * Time: 3:26 PM
 */

//    $router->get('', 'admin::IndexController@home');
$router->get('', 'IndexController@home');
$router->get('home', 'IndexController@home');
$router->get('users', 'IndexController@index');
$router->get('about', 'IndexController@about');
$router->post('save', 'IndexController@store');

/**
 * Demo
 */
#Validation
$router->get('validate', 'IndexController@validate');





