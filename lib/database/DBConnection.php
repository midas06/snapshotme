<?php

require_once "include.inc";
inc_Class("controllers");

class DBConnection
{
    private $conn;
    private $result;

    public function __construct($servName, $uName, $thePW, $theDB)
    {
        $this->conn = new mysqli($servName, $uName, $thePW, $theDB);

        if ($this->conn->connect_error) {
                die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function getConnection()
    {
        return $this->conn;
    }
    
       

    public function getResult($sql) 
    {
        if (mysqli_more_results($this->conn)) {
            mysqli_free_result($this->result);
            mysqli_next_result($this->conn);
        }
        
        $this->result=$this->conn->query ($sql);
        
        return $this->result;
    }
    
}
