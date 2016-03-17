<?php

require_once 'lib/include.inc';
inc_All();
$db = (new DBConnection("127.0.0.1:3306", "snapshotadmin", "Sn4psh0t_!", "snapshotMe"));
$dbc = new DB_Controller($db);

//$dbc->setQuery('select * from view_allPhotos');
//$dbc->getOutput();
//
//$dbc->setQuery('call proc_getallbyuser("user1")');
//$dbc->getOutput();

//$dbc->setQuery('call proc_uniqueUser("user1")');
//$dbc->getOutput();


$cont = new Credential_Controller($db);

$cont->setUN("user8");
$cont->setPW("password123");
$cont->setEmail("abc@gmail.com");
//var_dump($cont->createUser());
$cont->createUser();
//$cont->isUsernameUnique();
//var_dump($cont->isUsernameUnique());

//var_dump( $cont->isUsernameUnique());
//var_dump($cont->confirmCreatedUser());
//$cont->setQuery("select * from user");
//$cont->getOutput();
