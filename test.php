<?php

require_once 'lib/include.inc';
inc_All();
$db = (new DBConnection("127.0.0.1:8800", "snapshotadmin", "Sn4psh0t_!", "snapshotMe"));
//$db = (new DBConnection("127.0.0.1:3306", "snapshotadmin", "Sn4psh0t_!", "snapshotMe"));

//$cont = new Credential_Controller($db);

//$cont->setUN("testuser1");
//$cont->setPW("password1");
//echo $cont->isUserValid();
////$cont->setEmail("abc@gmail.com");
////var_dump($cont->createUser());
////$cont->createUser();

//
////$cont->validateUser();
//$cont->isUsernameUnique();
//var_dump($cont->isUsernameUnique());

//var_dump( $cont->isUsernameUnique());
//var_dump($cont->confirmCreatedUser());
//$cont->setQuery("select * from user");
//$cont->getOutput();

//$pw = "password";
////$hashed = password_hash($pw, PASSWORD_DEFAULT);
//$hashed = '$2y$10$qKwTpbjvKl8omLKqGAtuCuZkdJxV539Bljzd9iDneyMC2r8Tnw0vi';
//echo $hashed;
//var_dump(password_verify($pw, $hashed));


$fm = new FileManager_Controller($db);



$fm->setLocation("mtcook_1");
//$fm->setStartDate("2014-01-01");
//$fm->setEndDate("2016-01-01");




$fm->getFileList();