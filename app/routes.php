<?php

/**
 * Created by PhpStorm.
 * User: klaus
 * Date: 15/07/2017
 * Time: 3:26 PM
 */
//$router->define();

$router->get('', 'admin::IndexController@home');
$router->get('home', 'IndexController@home');
$router->get('users', 'IndexController@index');
$router->get('about', 'IndexController@about');
$router->post('save', 'IndexController@store');

