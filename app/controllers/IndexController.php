<?php
/**
 * Created by PhpStorm.
 * User: klaus
 * Date: 15/07/2017
 * Time: 3:21 PM
 */

namespace App\Controllers;

use App\Core\App;
use App\Core\Response;
use App\Core\Router;

class IndexController{

    /**
     * Lists all users in the system
     * @return mixed
     */
    public function index(){

        $users = db()->select('users');

        return response($users,200);

//        return view("index",compact('users'));
    }

    /**
     * Home page actions
     * @return mixed
     */
    public function home(){

        return view("home");

    }

    /**
     * About action
     * @return mixed
     */
    public function about(){

        $users = App::get('db')->select('users');

        return view("about",compact('users'));
    }

    /**
     * Store entities
     */
    public function store(){
        $insert = db()->table('users')->insert($_POST);
        if($insert){
            $message = "Successfully inserted";
        }else{
            $message = "Not inserted";
        }

        return Router::direct('users');
//        return view('index',compact('message'));
    }
    
}