<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class DataBase{
    private $user ="SA";
    private $pass = "Alevtina17!";
    private $srv = "193.187.173.119";
    private $db = "ACCESSCONTROL";
    private $drv = "{ODBC Driver 17 for SQL Server}";
    public $sql = "";
    public $conn;
    public function dbConnection(){
        $connStr = "DRIVER=$this->drv;SERVER=$this->srv;DATABASE=$this->db;";
        $this->conn = odbc_connect($connStr, $this->user, $this->pass);
        return;
    }
    public function dbExec(){
        return odbc_exec($this->conn, $this->sql);
    }
}
class Requests{
    public function getEmployeesInsideReq($dept){
        return "SELECT lastname, firstname, midname FROM emp WHERE id IN(SELECT "
        . "empid FROM lastlocation WHERE empid IN (SELECT id FROM emp WHERE id "
                . "IN (SELECT id FROM udfemp WHERE division =2 AND dept = $dept)"
                . ") AND readerid IN (SELECT readerid FROM reader WHERE "
                . "areaenter =25));";
    }
    public function getNamesFromDeptReq(){
        return "SELECT id,name FROM dept WHERE id NOT IN(1,7,8,9,10,11,13,14,"
        . "19,23,24,25,27,29,31,32,33,34,97,182,192,203,36,37,38,40,42,43,44,"
                . "47,48,52,54,56,57,58,59,60,65,67,69,70,72,73,76,77,78,81,"
                . "83,84,85,88,90,91,93,95,96,98,99,101,102,103,104,105,106,"
                . "107,108,109,111,113,114,116,119,120,123,124,125,128,129,130,"
                . "134,135,142,143,144,145,151,152,153,155,157,160,161,163,166,"
                . "167,170,172,174,176,177,178,179,181,183,193,196,225,226,231,"
                . "232,235,246,247,260,263,267,268,270,275,278,280,285,288,289,"
                . "305,307,10006,10007,10008,10016,10021,10024,10051,10054,10055,"
                . "10059,10061,10063,10065,10068,10069,10090,10093,10094,10095,"
                . "10096,10101,10102,10103,10154,10156,10158,10184,10187,10188,"
                . "10189,10197, 10198,10203,10204,10222,10223,10229,10256,"
                . "10258,10262,10263)ORDER BY name;";
    }

    public function getNamesFromDivisionReq(){
        return "SELECT id,name FROM division WHERE id IN (1,12,13,23,27,42,54)"
        . "ORDER BY name;";
    }
    public function getDivEmployeesInsideReq($dept){
        return "SELECT lastname, firstname, midname FROM emp WHERE id IN(SELECT "
        . "empid FROM lastlocation WHERE empid IN (SELECT id FROM emp WHERE id "
                . "IN (SELECT id FROM udfemp WHERE division =$dept)"
                . ") AND readerid IN (SELECT readerid FROM reader WHERE "
                . "areaenter =25));";
    }
}


