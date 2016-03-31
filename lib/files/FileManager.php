<?php
require_once 'include.inc';
inc_Class('files');

class FileManager implements iFileManager {
    private $location;
    private $start;
    private $end;

    
    public function setLocation($newLoc) {
        $this->location = $newLoc;
    }
    
    public function setStartDate($newStart) {
        $this->start = $newStart;
    }
    
    public function setEndDate($newEnd) {
        $this->end = $newEnd;
    }
    
    public function getLocation() {
        return $this->location;
    }
    
    public function getStartDate() {
        if (is_null($this->start)) {
            return '2014-01-01 00:00:00';
        } else {
            return $this->start;
        }        
    }
    
    public function getEndDate() {
        if (is_null($this->end)) {
            $now = new DateTime();
            return $now->format('Y-m-d H:i:s');            
        } else {
            return $this->end;
        }
    }
}
