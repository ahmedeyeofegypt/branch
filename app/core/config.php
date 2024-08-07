<?php 
define('FOLDER_CONTROLLER','./app/controllers/');
define('FOLDER_VIEW','./app/views/');

/* Database Definiations */
define('DB_SERVER','localhost');
define('DB_DATABASE','eoe_db') ;
define('DB_USERNAME','hany') ;
define('DB_PASSWORD','tigerisback') ;

if($_SERVER['SERVER_NAME'] == 'localhost'){
    define('ROOT','http://localhost/') ;
}else{
    define('ROOT','https://www.eyeofegypt.co/') ;
}

define('APP_NAME','Empty Project V0.1') ;
define('APP_DESC','My Description') ;

define('DEBUG',true ) ;



define('LOGOSRC','/assets/images/logo500x500_B.png') ;