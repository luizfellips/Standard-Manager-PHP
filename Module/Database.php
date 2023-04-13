<?php 

namespace Module;
use \PDO;
use \PDOException;

include("config.php");

final class Database{

    //constants
    
    //private variables
    private $table;
    private $connection;
    private $dsn = 'mysql:host=' . HOST . ';dbname=' . DB_NAME . ';';
    //constructor
    public function __construct($table = null){
        $this->table = $table;
        $this->setConnection();
      }
    //connection setter
    private function setConnection(){
        try {

            $this->connection = new PDO($this->dsn,USER,PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            die('ERROR: '.$e->getMessage());
        }
    }
    
    //executes the built query, this method is called by the actual crud operations
    public function execute($query, $params = []){
        try {
            $stmt = $this->connection->prepare($query);
            $stmt->execute($params);
            return $stmt;

        } catch (PDOException $e) {
            die('ERROR: '.$e->getMessage());
        }
    }
    //inserts an object into the databasee
    public function insert($values){
        //query data
        $column_fields = array_keys($values);
        $bindings = array_pad([],count($column_fields),'?');
        //builds the query
        $query = 'INSERT INTO '. $this->table.' (' . implode(',',$column_fields) . ') VALUES (' . implode(',',$bindings) . ')';
        //executes the query
        $this->execute($query,array_values($values));
        //returns the inserted id
        return $this->connection->lastInsertId();
    }   

    public function select($where = null, $order = null, $limit = null,$fields = '*'){
        //query data
        $where = strlen($where) ? 'WHERE '.$where : '';
        $order = strlen($order) ? 'ORDER BY '.$order : '';
        $limit = strlen($limit) ? 'LIMIT '.$limit : '';

        //builds the query
        $query = "SELECT " . $fields . " FROM " . $this->table . ' '. $where . ' '. $order . ' ' . $limit;
        

        //executes the query
        return $this->execute($query);
    }

    public function update($where,$values){
        //query data
        $fields = array_keys($values);
    
        //builds the query
        $query = 'UPDATE '.$this->table.' SET '.implode('=?,',$fields).'=? WHERE '.$where;
    
        //executes the query
        $this->execute($query,array_values($values));
    
        //Returns success
        return true;
      }


      public function delete($where){
        //builds query
        $query = 'DELETE FROM '.$this->table.' WHERE '.$where;
    
        //executes the query
        $this->execute($query);
    
        //returns success
        return true;
      }
    
}