<?php

trait Model  {

    use Database;

    /* protected $table  = 'tablename'; */
    
    protected $limit = 1000 ;
    protected $offset = 0  ;
    protected $order_column = 'id';
    protected $order_type = 'asc'; // 'desc'

    

    public function test(){

        $query = "SELECT * FROM $this->table order by $this->order_column  $this->order_type limit $this->limit offset $this->offset;" ;
        $result = $this->query($query);
        show($result);
        
    }

    private function queryString($data=[], $data_not=[]){
        $keys       = array_keys($data) ;
        $keysNot    = array_keys($data_not) ;
        $query = "SELECT * from $this->table WHERE " ;        
        foreach($keys as $key){
            $query .= $key . " = :" .$key ." && " ;
        }
        foreach($keysNot as $key){
            $query .= $key . " != :" .$key ." && " ;
        }
        $query = trim($query,' && ') ;
        $query .= " order by $this->order_column  $this->order_type limit $this->limit offset $this->offset ";
        return $query ;
    }
   
    public function getAll(){
        $QueryString = "SELECT * from $this->table order by $this->order_column  $this->order_type limit $this->limit offset $this->offset ;";
        $result = $this->query($QueryString);
        if($result) return $result ;
        return false ;
    }

    public function where($data, $data_not=[]){
        $QueryString = $this->queryString($data,$data_not);
        $data = array_merge($data,$data_not) ;
        $result = $this->query($QueryString,$data);
        if($result) return $result ;
        return false ;
    }

    public function first($data, $data_not=[]){
        $QueryString = $this->queryString($data,$data_not);
        $data = array_merge($data,$data_not) ;
        $result = $this->query($QueryString,$data);
        if($result) return $result[0] ;
        return false ;
    }

    public function insert($data){
        $keys  = array_keys($data) ;
        $query = "insert into $this->table (". implode(",",$keys) .") values (:". implode(",:",$keys) .") ;" ;
        $result = $this->query($query,$data) ;
        if($result) return $result ;
        return false ;
    }

    public function update($id, $data, $id_column='id'){

        if(!empty($data)){
            foreach($data as $key=>$value){
                if(!in_array($key,$this->allowed_columns)){
                    unset($data[$key]) ;
                }    
            }
        }

        $data[$id_column] = $id ;
        $keys = array_keys($data) ;
        $string = "";
        foreach($keys as $key){
            $string .= $key." = :".$key ." , ";
        }
        $string = trim($string,' , ') ;
        $query = "Update $this->table SET ". $string . " WHERE $id_column = :$id_column ;" ;       
        $result = $this->query($query,$data) ;
        if($result) return $result ;
        return false ;
    }

    public function delete($id,$id_column = 'id'){
        $data[$id_column] = $id ;
        $query = "delete from $this->table where $id_column = :$id_column ;" ;
        $this->query($query,$data) ;
    }

    public function create(){}
}

