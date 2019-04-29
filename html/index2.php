<!doctype html>
<html lang="ru">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="css/style.css">

  <title></title>
</head>

<body>
  <div class="container main_container">
    <header>
      <div class="row">
        <div class="col-12 topHeader"></div>
        <div class="container container_header_bottom">
          <nav class="navbar navbar-collapse navbar-expand-lg bottomHeader col-12">
            <a class="navbar-brand" href="#"><img src="img/log.png"></a>
            <h1 class="navbar-text">Генератор отчетов</h1>
          </nav>
        </div>
      </div>
    </header>

    <div class="main_content">
      <div class="container form">
         <form class="displayed" action = "../report.php" method="GET">
                 
                <h2 class="text-center form header">Выберите подрядную организацию</h2>
                    <div class="form-group row text-center"><select name="dept">
                        <?php
                            require_once ('database.php');
                            $request = new DataBase();
                            $reqSQL = new Requests();
                            $request->dbConnection();
                            $request->sql = $reqSQL->getNamesFromDeptReq();
                            $result = $request->dbExec();
                            while (odbc_fetch_row($result))
                            {
                                $id = odbc_result($result,"id");
                                $name = odbc_result($result,"name");
                                echo "<option value = $id>", $name, "</option><br>";
                            }
                            $request->sql = $reqSQL->getNamesFromDivisionReq();
                            $result = $request->dbExec();
                            while (odbc_fetch_row($result))
                            {
                                $id = odbc_result($result,"id")*1000000;
                                $name = odbc_result($result,"name");
                                echo "<option value = $id>", $name, "</option><br>";
                            }
                        ?>
                    </select></div>
                    <div class="row text-center">
                    <div class="col-6"><button type="submit" class="btn btn-primary" name ="command" value="Сформировать">Сформировать</button></div>
                    <div class="col-6"><button type="button" class="btn btn-primary" onclick="javascript:window.location='index.html'">Назад</button></div>
                    </div>
            </form></div>
          
        </form>
        </div>
    </div>
  </div>

  <div class="container">
    <div class="footer">
    </div>
  </div>

</body>

</html>

