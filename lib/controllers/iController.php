<?php
interface iController {
    function setConnection($newCon);
    function setQuery($newQuery);
    function getResult();
    function getOutput();
    function getQuery();
    function getDB();
}
