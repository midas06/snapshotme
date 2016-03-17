<?php
require_once 'include.inc'; 
inc_Class('controllers');
inc_Class('credentials');


class DB_Controller extends absController {

        
    public function __construct($newCon) {
        $this->setConnection($newCon);
    }    
    
    
           
}

