<?php
$serverName = "localhost"; 
$connectionOptions = [
    "Database" => "ACCESSCONTROL",
    "Uid" => "SA",
    "PWD" => "Alevtina17!"
]; 
//Establishes the connection 
$conn = sqlsrv_connect($serverName, $connectionOptions);
//Executes a query 
$getResults= sqlsrv_query($conn, "SELECT @@Version as SQL_VERSION");

?>
