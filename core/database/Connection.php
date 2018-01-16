<?php
namespace App\Core\Database;

use Illuminate\Container\Container;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;
use PDO;
use PDOException;

class Connection{

    public static function make(array $config){
        $model = '';
        switch ($config['model']){
            case 'eloquent':
                $model = self::illuminateDB($config);
                break;
            case 'adodb':
                $model = self::adodb($config);
        }

        return $model ;
    }

    protected function local(array $config){
        try{

            return new PDO(
                "{$config['connection']};dbname={$config['database']}",
                $config['username'],
                $config['password'],
                $config['options']
            );

        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

    /**
     * @param array $config
     */
    protected function illuminateDB(array $config){
        try{
        $capsule = new Capsule();
        $configs = [
            'driver'    => $config['driver'],
            'host'      => $config['host'],
            'database'  => $config['database'],
            'username'  => $config['username'],
            'password'  => $config['password'],
            'charset'   => $config['charset'],
            'collation' => $config['collation'],
            'prefix'    => $config['prefix'],
        ];
            $capsule->addConnection($configs);
            $capsule->setEventDispatcher(new Dispatcher(new Container));

#Make this Capsule instance available globally via static methods... (optional)
            $capsule->setAsGlobal();

#Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
            $capsule->bootEloquent();

        }catch(PDOException $e){
            die($e->getMessage());
        }

        return $capsule;
    }

    protected function adodb(array $config){
        #For adodb
    }
}