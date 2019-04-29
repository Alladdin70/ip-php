<?php
                            //echo '<option>localhost</option>';
$user ="SA";
$pass = "Alevtina17!";
$srv = "193.187.173.119";
$db = "ACCESSCONTROL";
$drv = "{ODBC Driver 17 for SQL Server}";
$connStr= "DRIVER=$drv;SERVER=$srv;DATABASE=$db;";
echo $connStr;
$conn = odbc_connect($connStr, $user, $pass);
var_dump($conn);
echo'<br>';
echo 'hui';
                            