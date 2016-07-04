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
        
        $result = $this->getResult()->fetch_assoc();
        
        return $result['valid'] == "1";        
    }    
   
    public function createUser() {
        if ($this->isUsernameUnique()) {
 
            $this->setQuery('call proc_addUser("' . $this->credManager->getUsername() . '","' . $this->credManager->getPassword() . '","' . $this->credManager->getEmail() . '")');
            $this->getResult();

            $this->setQuery("Select * from user");
            $this->getOutput();
        }
    }
    
//    public function isUserValid() {
//        $this->setQuery('call proc_getPW("' . $this->credManager->getUsername() . '")');
//        
//        $r = $this->getResult()->fetch_assoc();
//        
//        $hashed = $r['user_password'];
//        return password_verify($this->credManager->getUnhashed(), $hashed);
//    }
    
    public function isUserValid() {
        $this->setQuery('call proc_getPW("' . $this->credManager->getEmail() . '")');
        
        $r = $this->getResult()->fetch_assoc();
        
        $hashed = $r['user_password'];
        if (password_verify($this->credManager->getUnhashed(), $hashed) == 1) {
            return 1;
        } else {
            return 0;
        }
    }
    
    public function validateUser() {
        //$this->setQuery
                echo('call proc_verifyUser("' . $this->credManager->getEmail() . '","' . $this->credManager->getPassword() . '")');
    }
    
}
