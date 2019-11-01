<?php

//IMPORT OF DynaMan, The Dynamic Class Manager
include("../../ASSET/Models/DynaMan.php");

//Tell DynaMan the database tables we want to work with in this page
$DynaMan->AddModel('');

//Query the database , FIRST param is the table, SECOND param is the where
$query = $DynaMan->GetTable('',"id > 100");

//Loop and Display
foreach($query as $q){
    echo $q->ID;
}
