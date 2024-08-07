<?php
Class About {
    use Controller ;
    public function index(){
        $data = [] ;
        $this->view('about', $data) ;
    }

    public function ceo(){
        $data = [] ;
        $this->view('about/ceo',$data) ;
    }
}