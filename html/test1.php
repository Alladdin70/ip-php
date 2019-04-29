<?php
try {

    //connection params
    $dbCon = new PDO('sqlsrv:server=localhost;database=ACCESSCONTROL', 'SA', 'Alevtina17!');

    //test query
    $result = $dbCon->query('SELECT TOP 10 * FROM [master].[INFORMATION_SCHEMA].[TABLES]');

    //show the results
    foreach ($result as $row)
    {
        print_r( $row );
    }

    //close the connection
    $dbCon = null;

} catch (PDOException $e) {

    //show exception
    echo $e->getMessage();

}localhost
?>
