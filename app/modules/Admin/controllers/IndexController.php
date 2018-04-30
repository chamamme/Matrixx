<?php
/**
 * Created by PhpStorm.
 * User: Andrew Chamamme
 * Date: 15/07/2017
 * Time: 3:21 PM
 */

namespace App\Modules\Admin\Controllers;

use App\Core\App;

class IndexController{

    /**
     * Lists all users in the system
     * @return mixed
     */
    public function index(){

        $users = db()->select('users');

        return view("index",compact('users'));
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

        App::get('db')->insert('users',$_POST);

        return header("Location: users");
    }
    
}