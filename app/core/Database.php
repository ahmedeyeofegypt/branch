<?php 
Trait Database {
    private function connect()
    {
        $dsn = "mysql:hostname=".DB_SERVER.";dbname=".DB_DATABASE ;
        $con = new PDO($dsn,DB_USERNAME,DB_PASSWORD) ;
        return $con ;
    }

    public function query($query, $data=[])
    {
        $con = $this->connect() ;
        $stm = $con->prepare($query) ;
        $check = $stm->execute($data);
        if($check){
            $result = $stm->fetchAll(PDO::FETCH_ASSOC); //FETCH_ASSOC \
            if(is_array($result) && count($result)) {
                return $result ;
            }
        }
        return false ;
    }


    public function get_row($query, $data=[])
    {
        $con = $this->connect() ;
        $stm = $con->prepare($query) ;
        $check = $stm->execute($data);
        if($check){
            $result = $stm->fetchAll(PDO::FETCH_ASSOC); //FETCH_ASSOC \
            if(is_array($result) && count($result)) {
                return $result[0] ;
            }
        }
        return false ;
    }
}




