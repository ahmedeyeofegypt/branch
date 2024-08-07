<?php
session_start() ;

$phpversion = '7.4' ;
if(phpversion() < $phpversion) {
    die("Please Upgrade to PHP {$phpversion}.!") ;
}

define('ROOTPATH', __DIR__ . DIRECTORY_SEPARATOR ) ; 

require('./app/core/inti.php') ;


DEBUG ? ini_set('display_errors',1) : ini_set('display_errors',0) ;
    


$app = new App ;






