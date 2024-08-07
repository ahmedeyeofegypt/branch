<?php 
Class _404 {
    use Controller ;
    public function index(){
        $data = "Data To Send to sub page" ;
        $this->view('404',$data) ;
    }
}
