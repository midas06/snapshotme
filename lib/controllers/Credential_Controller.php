<?php
require_once 'include.inc'; 
inc_Class('controllers');
inc_Class('credentials');
inc_Class('database');

class Credential_Controller extends absController {
    private $credManager;
    
    public function __construct($newCon) {
        $this->setConnection($newCon);
        $this->credManager = new CredentialManager();
    }
    
    public function setUN($newUN) {
        if ($this->credManager->validate($newUN, "username")) {
            $this->credManager->setUsername($newUN);
            return true;
        } else {
            return false;
        }
    }
    
    public function setPW($newPW) {
        if ($this->credManager->validate($newPW, "password")) {
            $this->credManager->setPassword($newPW);
            return true;
        } else {
            return false;
        }
    }
    
    public function setEmail($newEmail) {
         if ($this->credManager->validate($newEmail, "email")) {
            $this->credManager->setEmail($newEmail);
            return true;
        } else {
            return false;
        }
    }   
    
    public function isUsernameUnique() {
        $this->setQuery('call proc_isUsernameUnique("' . $this->credManager->getUsername() . '")');
        //$c = $this->getDB()->getConnection();
//        if( $c->query($q)->fetch_assoc()['valid'][0] == "1") {
//            return true;
//        } else {
//            return false;
//        }
        
        
//        return $c->query($q)->fetch_assoc()['valid'][0] == "1";
       // return $this->getResult() == "1";
        $result = $this->getResult()->fetch_assoc();
        
        return $result['valid'] == "1";
        //return $this->getOutput()['valid'][0] == "1";
        
        
        
//            return true;
//        } else {
//            return false;
//        }
        //var_dump($c->query($q)->fetch_assoc()['valid'][0]);
        //echo $c->query($q)->fetch_assoc()['valid'][0];
        
    }    
   
    public function createUser() 
    {
        if ($this->isUsernameUnique()) {
            $thecon = $this->getDB()->getConnection();
 
            $this->setQuery('call proc_addUser("' . $this->credManager->getUsername() . '","' . $this->credManager->getPassword() . '","' . $this->credManager->getEmail() . '")');
            $this->getResult();//query($this->getQuery());

            $this->setQuery("Select * from user");
            $this->getOutput();
        }
//        if ($this->isUsernameUnique()) {
//            echo "unique";
//        }
       
    }
    
    
}
