<?php

class Package {
    use Model ;
    protected $table  = 'packages';

    protected $allowed_columns = [
        'Name',
        'Overview',
        'Description',
    ];


}




