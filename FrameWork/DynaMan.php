<?php
include("DynamicModel.php");

class DynamoMan{
    private $modelsToImport = array();
    public $modelsImported = array();

    function AddModel($model){
        $this->modelsToImport = explode(", ", $model);
        $this->ModelsImport();
    }

    public function ModelsImport(){
        foreach ($this->modelsToImport as $model) {
            $tempo = new DynamicModel($model);
            array_push($this->modelsImported, $tempo);
        }
    }

    //FIRST PARAM : table to import . SECOND PARAM : where clause (Optional)
    public function GetTable($nameoftable,$where = null){
        foreach ($this->modelsImported as $model) {
            if($model->nameOfTable == $nameoftable){
                return $model->getall($where);
            }
        }
    }
}


global $DynaMan;
$DynaMan = new DynamoMan();
