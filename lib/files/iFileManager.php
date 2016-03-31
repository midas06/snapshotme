<?php

interface iFileManager {
    function setLocation($newLoc);
    function setStartDate($newStart);
    function setEndDate($newEnd);
    function getLocation();
    function getStartDate();
    function getEndDate();
    
}
