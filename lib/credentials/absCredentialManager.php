<?php

require_once 'include.inc'; 
inc_Class("credentials");

abstract class absCredentialManager implements iCredentialManager{
    protected $un;
    protected $pw;
    protected $email;
    
    protected function cleanInput($theInput) {
        $i = htmlspecialchars($theInput);
        $i2 = strip_tags($i);
        return $i2;
    }
    
    public function validate($input, $config)
    {
        switch ($config)
        {
            case "username":
                if (!preg_match('/^[a-zA-Z0-9_]{1,60}$/', $input)) {
                    return false;
                } else { return true; }
                break;
            case "password":
                if (strlen($input) > 72) {
                    return false;
                } else { return true; }
                break;
            case "email":
                if (!preg_match('/^[a-zA-Z0-9_@.]{1,60}$/', $input)) {
                    return false;
                } else { return true; }
            default:
                break;
        }        
    }
    
    public function setUsername($newUN) {
        $this->un = $this->cleanInput($newUN);
    }
    
    public function setPassword($newPW) {  
        $password = $this->cleanInput($newPW);
        $this->pw = password_hash($password, PASSWORD_DEFAULT);
    }
    
    public function setEmail($newEmail) {
        $this->email = $this->cleanInput($newEmail);
    }

    
    public function getPassword() {
        return $this->pw;
    }

    public function getUsername() {
        return $this->un;
    }
    
    public function getEmail() {
        return $this->email;
    }
}
