<?php
namespace App\Core;

use App\Core\App;
use App\Core\Database\DB;
use Illuminate\Container\Container;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Translation\FileLoader;
use Illuminate\Translation\Translator;
use Illuminate\Validation\Factory;


App::bind('config', require "../config.php");

$config = App::get('config');

$db = new DB($config['database']);

App::bind('db', $db);
