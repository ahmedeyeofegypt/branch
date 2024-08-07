<?php
Class Home {
    use Controller ;
    public function index(){
        $this->view('home') ;
    }
}