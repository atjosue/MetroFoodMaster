<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../../contenido/vendor/bootstrap/css/bootstrap.css">
    <script src="../../pluggins/plugins/JQuery/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="../../pluggins/plugins/bootstrap/js/bootstrap.js"></script>
    <link rel="stylesheet" type="text/css" href="../../pluggins/sweetalert-master/dist/sweetalert.css">
    <script type="text/javascript" src=".././../pluggins/sweetalert-master/dist/sweetalert.min.js" ></script>

    <title>MetroFood(cliente)</title>

   

    <!-- Custom styles for this template -->


  </head>

 <body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">MetroFood</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Inicio <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
          <p class="lead"> <font color="white"><?php session_start(); echo "Bienvenido"; ?> </font></p>
      </li>
    
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    <li class="nav-item">
        <a class="nav-link disabled" href="#">   </a>
      </li>
    <a href="../../app/cerrarSesion.php"><button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Cerrar sesión</button></a>
  </div>
</nav>  

    <!-- Page Content -->

<!-- --------------------------------------------------------Para el header---------------------------------------------------------------->
      <?php 
            $id=$_POST['id'];

            require_once'../../model/Restaurante.php';

            $objRestaurante = new Restaurante();
            $con=$objRestaurante->conectar();
            $sql="SELECT * from restaurante WHERE estadoRestaurante = '1' && idRestaurante='".$id."'";

            $data=$con->query($sql);
            $info = $data->fetch_assoc();
           


        echo '<div class="container">

      <!-- Jumbotron Header -->
      <header class="jumbotron my-4">
        <h1 class="display-3"> <img src="../../imagenes/iconos/moto.png" width="100px" height="100px">'.$info['nombreRestaurante'].'</h1>
        <p class="lead">'.$info['informacionRestaurante'].'</p>
      </header>

      <!-- Page Features -->
      <div class="row text-center">


               <div class="row text-center">';
        ?>
<!-- -------------------------------------------------------- FIn  del header---------------------------------------------------------------->

<!-- -------------------------------------------------------- Mostrar COmbos---------------------------------------------------------------->

<?php 
              require_once'../../model/Producto.php';
              $id=$_POST['id'];

              $objProducto =  new Producto();
              $data = $objProducto->productoParametro($id);
              //$datos = $data->fetch_assoc();
              $br = 4;
              $cont=0;

//x
              foreach ($data as $value) {

                $inicio = "../../imagenes/img/";
                $nameIMG;
                $ima = $value['img'];

                if ($ima=="") {
                   $nameIMG="imagenNo";
                }else{
                  $nameIMG=$value['img'];
                }

                $fin = ".png";
                $link = $inicio.$nameIMG.$fin;

               echo '
                       <div class="col-lg-3 col-md-6 mb-4">
                          <div class="card">
                          <img class="card-img-top" src="'.$link.'" >
                            <div class="card-body" style:" overflow:hidden; text-overflow: ellipsis;">
                              <h4 class="card-title">"'.$value['nombreCombo'].'"</h4>
                              <p class="card-text"></p>
                            </div>
                            <div class="card-footer">
                              <a  class="btn btn-primary editarCombo" id="'.$value['img'].'" value="Editar">Editar</a>
                              <a  class="btn btn-primary eliminarCombo" id="'.$value['img'].'" value="Eliminar">Eliminar</a>
                            </div>
                          </div>
                        </div>';
                    $cont++;

                        if ($cont==$br) {
                          echo " <div class='clearfix'></div>";

                          $br++;
                          $br++;
                          $br++;
                          $br++;
                        }
                       
              }


             ?>
       

      </div>
        

      </div>
             

    </div>
       ?>

<!-- -------------------------------------------------------- FIn  de Mostrar COmbos---------------------------------------------------------------->
   

    <!-- /.container -->

   
    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container"> 
         <p class="m-0 text-center text-white">Copyright &copy; MetroFood 2018</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->

  </body>
</html>
