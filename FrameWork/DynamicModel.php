<?php

$config = parse_ini_file("../db.ini");
$servername = $config["servername"];
$username = $config["username"];
$password = $config["password"];
$dbname = $config["dbname"];


class DynamicModel {

    public $nameOfTable;
    public $datam = array();
    private $conex;

    function __construct($nameofthetable){
        $this->nameOfTable = $nameofthetable;
        $this->conex = new mysqli($servername,$username, $password,$dbname);
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
