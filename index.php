<?php
  include("./conf/conf.php");

  $query = "SELECT * FROM `secure_login`";
  $result = mysqli_query($link, $query);

?>

<!DOCTYPE html>
<html>
<head>
  <title>DASHBOARD - ADMIN</title>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="./js/script.js"></script>
  <meta http-equiv="refresh" content="5">
  <meta charset="utf-8">
  <style type="text/css">
    body{
      /*background-image:url(https://static.pexels.com/photos/371633/pexels-photo-371633.jpeg);*/
      background-color: gray;
      background-repeat:no-repeat;
      background-size: 100%;
    }

    footer{
      margin-top: 20px;
      padding-top: 20px;
    }
    .bg__card__navbar{
      background-color: #000000;
    }
    .bg__card__footer{
      background-color: #000000 !important;
    }
    #add__new__list{
        top: -38px;
        right: 0px;
    }

    #menu {
      border-radius: 20px;
    }

    .inputs {
      width: 100px;
    }
  </style>

    <div class="container bg-info p-5 " id="menu">
    <nav class="navbar navbar-expand-lg navbar-light bg-light" id="menu">
      <a class="navbar-brand" href="#">MENU</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
          <a class="nav-item nav-link" href="#">Features</a>
        </div>
      </div>
    </nav>
  </div>
</head>
<body>
  <!---->
  <main>
  <div class="container my-5">
         <div class="card-body text-center">
      <h4 class="card-title">Usuarios Online</h4>
      <p class="card-text">Controle</p>
    </div>
      <div class="card">
          <button id="add__new__list" type="button" class="btn btn-success position-absolute" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fas fa-plus"></i> Add a new List</button>
          <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Usuario</th>
                  <th scope="col">Comando Atual</th>
                  <th scope="col">Data info</th>
                  <th scope="col">Executar</th>
                </tr>
              </thead>
              <tbody>
                <?php
                    if($result){
                      while($row = mysqli_fetch_array($result)){
                        $ids = $row["id"];
                        $usuarios = $row["username"];
                        $dados = $row["dados"];
                        $comandos = $row["comando"];
                        $caminho = "./dados/".$usuarios.".html";
                        $fp = fopen($caminho, "w");
                        echo '
                            <tr>
                              <input type="hidden" name="user" value="'.$usuarios.'">
                              <input type="hidden" name="token" value="'.md5($usuarios).'">
                              <th scope="row">'.$ids.'</th>
                              <td>'.$usuarios.'</td>
                              <td>'.$comandos.'</td>
                              <td>
                                  <a class="btn btn-sm btn-primary" href="#" onclick="exec()"><i class="far fa-Executar"></i> Executar</a>
                                  <a class="btn btn-sm btn-danger" href="#" onclick="exec()"><i class="fas fa-trash-alt"></i> delete</a>
                              </td>
                              <td><a class="btn btn-sm btn-info" href="'.$caminho.'"><i class="fas fa-info-circle"></i> Details</a> </td>
                              <td><input type="text" name="command" class="inputs"></td>
                            </tr>';
                        fwrite($fp, $dados."<a href='../'><b>Voltar</b></a>");
                        fclose($fp);
                      }
                    }
                ?>
              </tbody>
            </table>
      </div>
      <!-- Large modal -->


  <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
            <div class="card-body text-center">
              <h4 class="card-title">Special title treatment</h4>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            </div>
              <div class=" card col-8 offset-2 my-2 p-3">
            <form>
              <div class="form-group">
                <label for="listname">List name</label>
                <input type="text" class="form-control" name="listname" id="listname" placeholder="Enter your listname">
              </div>
              <div class="form-group">
                <label for="datepicker">TOKEN</label>
                <input  type="text" class="form-control" name="datepicker" id="datepicker" placeholder="Pick up a date">
              </div>
              <div class="form-group">
                                      <label for="datepicker">Add a list item</label>
                  <div class="input-group">

                    <input type="text" class="form-control" placeholder="Add an item" aria-label="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-secondary" type="button">Go!</button>
                    </span>
                  </div>
                </div>
             <div class="form-group text-center">
               <button type="submit" class="btn btn-block btn-primary">Sign in</button>
            </div>
          </form>
      </div>
      </div>
    </div>
  </div>
  </div>
  </main>
  <!---->

  <!----
  <footer >
    <div class="container bg-info p-5">

    </div>
  </footer>--->
</body>
</html>