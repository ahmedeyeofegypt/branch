<?php
trait Controller {
    public function view($name, $data=[]){

        $file = FOLDER_VIEW.$name.'.view.php';
        if(file_exists($file)) {
            require($file) ; 
        }else{
            require(FOLDER_VIEW.'404.view.php') ;
        }
    }
}