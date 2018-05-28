<?php 
 /* session_start();
  if($_SESSION['TIPO']=='2'){

  }else{
    session_destroy();
    header('location: ../../index.php');
  }
*/
  require_once '../../controller/RepartidorController.php'; ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Gestion de repartidores</title>
    
    
<!-- CSS -->
<link rel="stylesheet" type="text/css" href="../../pluggins/bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../../pluggins/dataTable/material.min.css">
<link rel="stylesheet" type="text/css" href="../../pluggins/dataTable/dataTables.material.min.css">
<link rel="stylesheet" type="text/css" href="../../pluggins/sweetalert-master/dist/sweetalert.css">

<!-- JS -->
<script type="text/javascript" src="../../pluggins//bootstrap/jquery/jquery.js"></script>
<script type="text/javascript" src="../../pluggins/pluginess/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../../pluggins/dataTable/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../../pluggins/dataTable/dataTables.material.min.js"></script>
<script type="text/javascript" src="../../pluggins/jQuery-Mask/src/jquery.mask.js"></script>
<script type="text/javascript" src="../../pluggins/sweetalert-master/dist/sweetalert.min.js"></script>  





    <script type="text/javascript" src="../../resources/js/Repartidores.js"></script>
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
        <a class="nav-link" href="dashboardRestaurante.php">Gestion</a>
      </li>
    
      <li class="nav-item">
        <a class="nav-link" href="perfilRestaurante.php">Perfil</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    <li></li>
    <a href="../../app/cerrarSesion.php"><button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Cerrar sesión</button></a>
  </div>
</nav>
    <div class="container">
      
        <div class="col-md-9" style="margin-top: 10px;">
                <p class="robo" style="font-weight: 300; margin-bottom: 0px; font-size: 30px;">Repartidores</p>
                <p class="robo" style="font-weight: 300; font-size: 14px; height: 40px;">Gesti&oacute;n  de repartidores</p>
            </div>
        <div class="col-md-3" style="margin-top: 10px;">
          <div class="btn-group pull-right">
                     <a href="#" class="admin-menu-navi">
                        <button class="btn btn-primary  btn-sm " style="margin-left: 5px;" id="nuevoRepartidor">Nuevo</button>
                     </a>
                    </div>
        </div>
        <div class="clearfix"></div>
         <div class="col-md-12" style="margin-top: 0px;">
          <table id="listadoRepartidores" class="mdl-data-table" cellspacing="1" width="100%">
            <thead>
              <th>ID</th>
              <th>Nombre del Repartidor</th>
              <th>DUI</th>
              <th>Fecha de Ingreso</th>
              <th>Acciones</th>
            </thead>
            <tbody>
            <?php 
              $objRepartidor = new Repartidor();
              $data = $objRepartidor->getAllRepartidor();
              if ($data!=false) {
                foreach ($data as  $value) {
                  
                  echo "<tr>
                      <td>".$value['idRepartidor']."</td>
                      <td>".$value['nombreRepartidor']."</td>
                      <td>".$value['estadoRepartidor']."</td>
                      <td>".$value['fechaCreacion']."</td>
                      <td>
                        <input type='button' class='btn-success btn-sm editarRepartidor' id='".$value['idRepartidor']."' value='Editar'>
                        <input type='button' class='btn-danger btn-sm eliminarRepartidor' id='".$value['idRepartidor']."' value='Eliminar'>
                      </td>
                        </tr>";
                }
              }

             ?>
              
            </tbody>
          </table>
        </div>
      
    </div>  
  </body>
  <footer class="py-5 bg-dark">
      <div class="container">
         <p class="m-0 text-center text-white">Copyright &copy; MetroFood 2018</p>
      </div>
      <!-- /.container -->
    </footer>
</html>



<!-- Modal de unsercion de usuario -->
<div class="modal fade modal" id="modalIngresoUsuario" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header " Style="height:45px;">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                    <span class="robo" style="font-size: 20px;">Agregar Usuario</span>
                </div>
                <div class="modal-body" >
                  
                      <div class="row" id="infoUsuario">
                          <div class="form-column col-md-4 col-sm-4 col-xs-4">
                                 <div class="form-group required">
                                     <label for="nombreCiclo" class="control-label">Username</label>
                                     <input type="text" class="form-control requerido"  
                                            placeholder="Username" name="username"  required>
                                 </div>
                          </div>
                           <div class="form-column col-md-4 col-sm-4 col-xs-4">
                            <div class="form-group required">
                              <label for="password" class="control-label">Password</label>            
                              <input type="password"  name="password" class="form-control" id="password" required >
                            </div>
                          </div>
                          <div class="form-column col-md-4 col-sm-4 col-xs-4">
                            <div class="form-group required">
                              <label for="repassword" class="control-label">Re-Password</label>            
                              <input type="password"  name="repassword" class="form-control" id="repassword" required>
                            </div>
                          </div>
                          <div class="form-column col-md-4 col-sm-4 col-xs-4">
                            <div class="form-group required">
                              <label for="rol" class="control-label">Rol</label>            
                              <select name="rol" class="form-control">
                            
                                
                              </select>
                            </div>
                          </div>

            
                          <div class="clearfix"></div>

                    </div>
                    <div>
                    <button class="btn btn-primary  btn-sm " id="agregarUsuario" >Guardar</button>
                  </div>

              </div>         
               <div class="modal-footer" id="modalFooter" >
                  
               </div>
            </div>
        </div> 
</div>    
