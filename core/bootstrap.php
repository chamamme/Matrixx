<?php
namespace App\Core;


use App\Core\Database\DB;

App::bind('config', require "../config.php");

$config = App::get('config');

$db = new DB($config['database']);

App::bind('db', $db);
