<?php
Class Products {
    use Controller ;
    public function index(){
        $this->view('products') ;
    }
}