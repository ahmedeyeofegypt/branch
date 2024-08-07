<?php
defined('ROOTPATH') OR exit('Access Denied!') ;


class App
{

    protected $controller = 'Home' ;
    protected $method     = 'index' ;
    function __construct()
    {
        $this->loadController();
    }

    private function loadController()
    {
        $URL = $_GET['url'] ?? 'Home';
        $URL = explode('/', trim($URL , '/') );
        $file = FOLDER_CONTROLLER . ucfirst($URL[0]) . '.php';

        if (file_exists($file)) 
        {
            require($file);
            $this->controller = ucfirst($URL[0]) ;
            unset($URL[0]) ;

        } else {
            require(FOLDER_CONTROLLER.'_404.php' );
            $this->controller = '_404';
        };
        
        $controller = new $this->controller ;
        if(!empty($URL[1])){
            if(method_exists($controller,$URL[1])){
                $this->method = $URL[1];
                unset($URL[1]) ;
            }
        }
        //show($URL) ;
        call_user_func_array([$controller,$this->method], $URL) ;

        
    }
}
