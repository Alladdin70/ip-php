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

$myReport = new ReportTypeTwo();
$myReport ->openSheet();
$myReport->makeCols();
$myReport->makeHeader();

header ( "Expires: Mon, 1 Apr 1974 05:00:00 GMT" );
header ( "Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT" );
header ( "Cache-Control: no-cache, must-revalidate" );
header ( "Pragma: no-cache" );
header ( "Content-type: application/vnd.ms-excel" );
header ( "Content-Disposition: attachment; filename=report.xls " );

$objWriter = new PHPExcel_Writer_Excel5($myReport->xls);
$objWriter->save('php://output');