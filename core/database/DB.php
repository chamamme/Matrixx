<?php
namespace App\Core\Database;

use Exception;
use Illuminate\Database\Capsule\Manager as Capsule;
use PDO;

class DB  extends Capsule {

    public  $model;
    //@TODO Add a table property
    //@TODO Add a table method that will take a table name and seet it to the table property

    /**
     * DB constructor.
     * @param $config
     */
    public function __construct($config)
    {
//        $this->pdo = $pdo;
//        dd(Connection::make($config));
        $this->model = Connection::make($config);
    }

    /**
     * Created for pdo model so dont use this function if you are using a different db model in config
     * @param $table
     * @return array
     */
    public function select($table){

        $statement = $this->model->prepare("SELECT * FROM {$table}");

        $statement->execute();

        //return an object instead
        return $statement->fetchAll(PDO::FETCH_CLASS);
    }

    /**
     * Dynamically inserts into database
     * @param $table
     * @param array $parameters
     * @return bool
     */
    public function insert($table, array $parameters){

        //get the keys
        $keys = array_keys($parameters);

        //get the columns from the keys
        $columns = implode(', ', $keys);

        //set the placeholders
        $placeholder = ':'.implode(', :', $keys);

        //make an sql query string
        $sql = "INSERT INTO {$table} ({$columns}) VALUES ({$placeholder})";

        try{
            //prepare the statement
            $statement = $this->model->prepare($sql);

            //Execute it
            return $statement->execute($parameters);

        }catch (Exception $e){
            die($e->getMessage());
        }
    }
}