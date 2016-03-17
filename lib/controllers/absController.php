<?php
require_once 'include.inc'; 
inc_Class('database');
inc_Class('controllers');

abstract class absController implements iController {
    protected $connection;
    protected $query;
    protected $result;
    
    public function setConnection($newCon) {
        $this->connection = $newCon;
    }    
    public function setQuery($newQuery) {
        $this->query = $newQuery;
    }
    
    public function getDB() {
        return $this->connection;
    }
    
    public function getQuery() {
        return $this->query;
    }
    
    public function getResult() {
        return $this->connection->getResult($this->query);
    }
    
    public function getOutput() {
        $result = $this->getResult();

        while ($row = $result->fetch_assoc()) {
           var_dump($row); // $row['ID'] + " " + $row['Location'] + " " + $row['User'];
        }				
    }
}
