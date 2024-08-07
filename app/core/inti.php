<?php 
spl_autoload_register(function($className){
    
    $filename = "./app/models/". ucfirst($className) .".php"; 
    if(file_exists($filename)) { require $filename ; }
}) ;

require('config.php') ;
require('functions.php') ;
require('objects.php') ;
require('Database.php') ;
require('Model.php') ;
require('Controller.php') ;
require('App.php') ;

