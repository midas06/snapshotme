<?php

require_once 'include.inc'; 
inc_Class("credentials");

interface iCredentialManager {
    function setUsername($newUN);
    function setPassword($newPW);
    function setEmail($newEmail);
    function getUsername();
    function getPassword();
    function getEmail();
}
