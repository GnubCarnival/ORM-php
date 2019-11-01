<?php

class DynamicModel {
  
    public $servername = "localhost";
    public $username = "root";
    public $password = "";
    public $dbname = "ORMtest";


    public $nameOfTable;
    public $datam = array();
    private $conex;

    function __construct($nameofthetable){
        $this->nameOfTable = $nameofthetable;
        $this->conex = new mysqli($this->servername,$this->username, $this->password,$this->dbname);
    }


    function getall($where){

        if($where ==null)
            $lesql = "SELECT * FROM " . $this->nameOfTable;
        else
            $lesql = "SELECT * FROM " . $this->nameOfTable . " WHERE " . $where;
        

        $lefield = $this->conex->query($lesql);
        while($row = $lefield->fetch_assoc()){
            array_push($this->datam,(object)$row);
        }
        return $this->datam;
    }
}
