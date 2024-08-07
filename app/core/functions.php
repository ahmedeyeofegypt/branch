<?php

function show($val){
    echo "<pre>" ;
    print_r($val) ; 
    echo "</pre>" ;
}

function esc($str) {
    return htmlspecialchars($str) ;
}

