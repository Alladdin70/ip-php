<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <style>
        html{font-size: 100%;}
        body{background-color: grey}
        .siteWrap{max-width:80em;position: relative; margin: 0 auto;padding: 0;}
        .topHeader{height: 40px; background-color: darkcyan;}
        .bottomHeader {height: 100px; background-color: floralwhite; z-index: 5;}
        .mainArea{height: 700px; background-color: white;}
        .basementPage{height: 40px; background-color: darkcyan;}
        .menuIts{height: 100%; width: 20%; float: left; background-color: cadetblue;}
        .menuPic{width: 20%; float: left; background-color: bisque; z-index: 10;height: 100%}
        .imgBox{float: left; width: 70%; margin: 5%;}
        .formBox{float: left; width: 70%; margin: 5%;}
        img.displayed {display: block; margin-left: auto; margin-right: auto;}
        form.displayed {display: block; margin-left: auto; margin-right: auto; text-align: center;}
    </style>
    <head>
        <meta charset="UTF-8">
        <title>Reports maker</title>
    </head>
    <body>
        <div class="siteWrap"
        <header>
            <div class="topHeader"></div>
            <div class="bottomHeader">
                <div class="menuPic"></div>
            </div>
        </header>
        <div class="mainArea">
            <div class="menuIts" ></div>
            <div class="imgBox"><img class="displayed" src="lenel-logo.png" width="800"></div>
            <div class="formBox"><form class="displayed" action = "../report.php" method="GET">
                    <p>Выберите подрядную организзацию</p>
                    <select name="dept">
                        <?php
                            $user ="SA";
                            $pass = "Alevtina17!";
                            $srv = "193.187.173.119";
                            $db = "ACCESSCONTROL";
                            $drv = "{ODBC Driver 17 for SQL Server}";
                            $connStr= "DRIVER=$drv;SERVER=$srv;DATABASE=$db;";
                            echo $connStr;
                            $conn = odbc_connect($connStr, $user, $pass);
                            $sql ="SELECT id,name FROM dept;";
                            $result = odbc_exec($conn, $sql);
                            while (odbc_fetch_row($result))
                            {
                                $id = odbc_result($result,"id");
                                $name = odbc_result($result,"name");
                                echo "<option value = $id>", $name, "</option><br>";
                            }
                        ?>
                    </select>
                    <input type ="submit" name ="command" value="Сформировать">
                </form></div>
        </div>
        <div class="basementPage"></div>
        </div>
    </body>
</html>
