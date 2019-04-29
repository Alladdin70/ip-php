<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'database.php';
require_once 'templates.php';
require_once('PHPExcel/Writer/Excel5.php');
require_once 'employees.php';

$myReport = new ReportTypeOne();
$myReport ->openSheet();
$myReport->makeCols();
$myReport->makeHeader();

if(!empty($_GET["dept"])&& !empty($_GET["command"]))
{
    $dept = $_GET["dept"];
}
$request = new DataBase();
$reqSQL = new Requests();
$request->dbConnection();

if ($dept>=1000000){
    $dept = $dept/1000000;
    $request->sql = $reqSQL->getDivEmployeesInsideReq($dept);
    $table = "division";
    $myName = getName($table, $dept);
}
else {
    $request->sql = $reqSQL->getEmployeesInsideReq($dept);
    $table = "dept";
    $myName = getName($table, $dept);
}
$result = $request->dbExec();

$i = 2;

while (odbc_fetch_row($result))
{
    $emp = new Employee(); 
    $emp->fn = odbc_result($result,"firstname");
    $emp->ln = odbc_result($result,"lastname");
    $emp->mn = odbc_result($result,"midname");
    $myReport->sheet->setCellValueByColumnAndRow(2,$i,$emp->getFullName());
    $myReport->sheet->setCellValueByColumnAndRow(1,$i,$myName);
    $myReport->sheet->setCellValueByColumnAndRow(0,$i,$i-1);
    $i++;
    
                                          
}



header ( "Expires: Mon, 1 Apr 1974 05:00:00 GMT" );
header ( "Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT" );
header ( "Cache-Control: no-cache, must-revalidate" );
header ( "Pragma: no-cache" );
header ( "Content-type: application/vnd.ms-excel" );
header ( "Content-Disposition: attachment; filename=report.xls " );

$objWriter = new PHPExcel_Writer_Excel5($myReport->xls);
$objWriter->save('php://output');

function getName($table, $dept){
    $request = new DataBase();
    $request->dbConnection();
    $request->sql = "SELECT name FROM $table WHERE id=$dept;";
    $result = $request->dbExec();
    odbc_fetch_into($result);
    return odbc_result($result,"name");
}
