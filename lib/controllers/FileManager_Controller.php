<?php
require_once 'include.inc'; 
inc_Class('controllers');
inc_Class('files');
inc_Class('database');

class FileManager_Controller extends absController {
    private $fileManager;
    
    public function __construct($newCon) {
        $this->setConnection($newCon);
        $this->fileManager = new FileManager();
    }
    
    public function setLocation($newLoc) {
        $this->fileManager->setLocation($newLoc);
    }
    
    public function setStartDate($newStart) {
        $this->fileManager->setStartDate($newStart);
    }
    
    public function setEndDate($newEnd) {
        $this->fileManager->setEndDate($newEnd);
    }   
    
    public function getFileList() {
        $fileArray = array();
        
        $this->setQuery("call proc_getUniqueDatesByLocation('" . $this->fileManager->getLocation() . "','" . $this->fileManager->getStartDate() . "','" . $this->fileManager->getEndDate() . "')");
        
        //echo $this->getQuery();
        
        $r = $this->getResult();
        
        
        while ($row = $r->fetch_assoc()) {
            array_push($fileArray, $row['filepath']);
        }
        
        var_dump($fileArray);
        
        
        
    }
    
    
}
