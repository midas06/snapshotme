<?php

//function inc_Class($theClass)
//{  
//    foreach (glob("lib\\" . $theClass . "\*.inc") as $file)
//    {
//        include_once $file;
//    }
//}
//
//function inc_All()
//{
//    $folder = glob(__DIR__ . '/*' , GLOB_ONLYDIR);
//    set_include_path(__DIR__);
//    foreach($folder as $f)
//    {
//        foreach (glob($f . "\*.inc") as $file)
//        {
//            include_once $file;
//        }
//    }
//}

function inc_Class($theClass)
{  
    foreach (glob("lib\\" . $theClass . "\*.php") as $file)
    {
        include_once $file;
    }
}

function inc_All()
{
    $folder = glob(__DIR__ . '/*' , GLOB_ONLYDIR);
    set_include_path(__DIR__);
    foreach($folder as $f)
    {
        foreach (glob($f . "\*.php") as $file)
        {
            include_once $file;
        }
    }
}
