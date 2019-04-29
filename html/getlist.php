<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once ('database.php');
$list =array();
$request = new DataBase();
$reqSQL = new Requests();
$request->dbConnection();
$request->sql = $reqSQL->getNamesFromDeptReq();
$result = $request->dbExec();
while (odbc_fetch_row($result))
    {
        $id = odbc_result($result,"id");
        $name = odbc_result($result,"name");
        array_push($list,$name);
    }
$request->sql = $reqSQL->getNamesFromDivisionReq();
$result = $request->dbExec();
while (odbc_fetch_row($result))
    {   
        $id = odbc_result($result,"id")*1000000;
        $name = odbc_result($result,"name");
        array_push($list,$name);
    }
echo(json_encode($list,JSON_UNESCAPED_UNICODE));    
