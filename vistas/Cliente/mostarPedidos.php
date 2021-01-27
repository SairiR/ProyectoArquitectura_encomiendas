<!DOCTYPE html>

<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Repartidor</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
              integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
              crossorigin="anonymous">
        <!--<link href="../Repartidor/css/Repartidordiseño.css" rel="stylesheet" type="text/css"/>-->
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Styles -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,700&display=swap" rel="stylesheet">

    <!-- Ionic icons -->
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">

    </head>
      <!--<header>-->

                
                <?php
                 session_start();
//                $_SESSION['correo']=$correo;
//            session_start();  
//            include_once '../../modelos/SesionDTO.php';
//            if (!isset($_SESSION['sesionDTO'])) {
//                header('Location: ../../Login.php');
//                die();
//            }
//            $sesionDTO = unserialize($_SESSION['sesionDTO']);
//            if ($sesionDTO->getRol() != "repartidor") {
//                header('Location: ../../Login.php');
//                die();
//            }
//             echo ' <div style="text-align: left">';
//               echo ' <img name="imglogo" id="logo"src="https://previews.123rf.com/images/siiixth/siiixth1609/siiixth160900027/64450371-ir-de-compras-en-la-tienda-de-dibujos-animados-de-tel%C3%A9fonos-inteligentes.jpg" alt="" width="50" height="50"/>';
////                echo '<label id="lblogo"for="imglogo">Bienvenido:  ' . $sesionDTO->getCorreo() .'</label>';
//            echo '      </div>';
//            echo '<div style="text-align: right">';
//            echo '<img id="imguser"src="../../img/useradmi.png" alt="" width="60" height="60"/>';
//            echo '<a href="../../login.php" class="btn btn-danger">Cerrar Sesion</a> <p>';      
//            echo '<label id="lblbienvenido">Bienvenido: ' .'</label></p>';
////            echo '<label id="lblogo2"for="imglogo">'. $sesionDTO->getCorreo() .'</label>';
//            echo '</div>';
  
              ?>
            
        <!--</header>-->
    <body>
            <div class="d-flex" id="content-wrapper">

        <!-- Sidebar -->
        <div id="sidebar-container" class="bg-primary">
            <div class="logo">
                <h4 class="text-light font-weight-bold mb-0">Cliente</h4>
            </div>
            <div class="menu">
                <a href="#" class="d-block text-light p-3 border-0"></i>
                    Inicio</a>

                <li class="<?php echo $pagina=='index' ? 'active':'' ;?>"<a href="?p=index" class="d-block text-light p-3 border-0"></i>
                    </a> </li>

                <a href="#" class="d-block text-light p-3 border-0"></i>
                    </a>
                <a href="#" class="d-block text-light p-3 border-0"></i>
                    </a>
                <a href="#" class="d-block text-light p-3 border-0"></i>
                    </a>
            </div>
        </div>
        <!-- Fin sidebar -->

        <div class="w-100">

         <!-- Navbar -->
         <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
            <div class="container">
    
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
    
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!--<form class="form-inline position-relative d-inline-block my-2">
                  <input class="form-control" type="search" placeholder="Buscar" aria-label="Buscar">
                  <button class="btn position-absolute btn-search" type="submit"><i class="icon ion-md-search"></i></button>
                </form>-->
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                  <li class="nav-item dropdown">
                    <a class="nav-link text-dark dropdown-toggle" href="#" id="navbarDropdown" role="button"
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <img src="img/user-1.png" class="img-fluid rounded-circle avatar mr-2"
                      alt="https://generated.photos/" />
                   //<?php
//                   $correo=$_GET['correo'];
//                   echo $correo;
//                   ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
<!--                      <a class="dropdown-item" href="#">Mi perfil</a>
                      <a class="dropdown-item" href="#">Suscripciones</a>
                      <div class="dropdown-divider"></div>-->
<a class="dropdown-item" href="../../login.php">Cerrar sesión</a>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
          <!-- Fin Navbar -->

        <!-- Page Content -->
        <div id="content" class="bg-grey w-100">

              <section class="bg-light py-3">
                  <div class="container">
                      <div class="row">
                          <div class="col-lg-9 col-md-8">
                            <h1 class="font-weight-bold mb-0">Pedidos Realizados</h1>
                            <p class="lead text-muted"></p>
                          </div>
                        <!-- <div class="col-lg-3 col-md-4 d-flex">
                            <button class="btn btn-primary w-100 align-self-center">Descargar reporte</button>
                          </div>-->
                      </div>
                  </div>
              </section>
              <section class="bg-light py-3">
                  <div class="container">
                      <div class="row">
                          <div class="col-lg-9 col-md-8">
                              <a href='../Cliente/mostrarLocal.php' class="btn btn-warning">Volver</a>
                             <form action="../../controladores/controller.php">
                <input type="email" name="correo" placeholder="Confirme su correo electronico" required>
                <input type="hidden" value="mostrarPedidos" name="opcion">
                <input type="submit" name="btnregistrarcli" value="Confirmar">
            </form>     
                          </div>
                        <!-- <div class="col-lg-3 col-md-4 d-flex">
                            <button class="btn btn-primary w-100 align-self-center">Descargar reporte</button>
                          </div>-->
                      </div>
                  </div>
              </section>
       
<!--        <div class="container">
          
        
        </p>
             <a href='../../controladores/controller.php?opcion=mostrarPedidos' class="btn btn-primary" style="background-color: #E34B1B">Total Pedidos</a>
             <a href='../../controladores/controller.php?opcion=actualizarRep' class="btn btn-primary" style="background-color: #E34B1B">Modificar Datos Personales</a>
             
        </p>
         </div>-->
<!--       <div>
           <form action="../../controladores/controller.php">
                    <input type="hidden" value="consultarEmple" name="opcion"/>
                    <input type="submit" value="Listar Empeados" class="btn btn-primary" />
                </form>
        </div>
        </p>
        <div>
            <form action="../Administrador/administrador.php">
                    <input type="submit" value="Volver" class="btn btn-primary" />
                </form>
        </div>
        -->
          <div class="container" style="background-color: white">
              <!--<h1>Registro de Pedidos</h1>-->
                <table class="table">
                    <thead class="thead-dark">   
                        <tr>
                         <th>Id Pedido</th>
                         <th>Correo Cliente</th>
                         <th>Direccion de entrega</th>
                         <th>Codigo Prod</th>
                         <th>Local</th>
                         <th>Nombre Producto</th>
                         <th>Descripcion Producto</th>
                         <th>Precio Producto</th>
                         <th>Cantidad</th>
                         <th>Precio Total</th>
                         <th>Fecha Pedido</th>
                         <th>Opciones</th> 
                         <th></th> 
                        </tr>
                    </thead>
                  <tbody>
                <?php
               
                include_once '../../modelos/Pedido.php';
                $subTotal=0;
                if(isset($_SESSION['listadoped'])){
                    $listadoped= unserialize($_SESSION['listadoped']);
                    
                    foreach ($listadoped as $fact){
                        echo '<tr>';
                        echo '<td>'.$fact->getIdPedido().'</td>';
                        echo '<td>'.$fact->getCorreo().'</td>';
                        echo '<td>'.$fact->getDireccion().'</td>';
                        echo '<td>'.$fact->getIdProducto().'</td>';
                        echo '<td>'.$fact->getIdLocal().'</td>';
                        echo '<td>'.$fact->getNombreProd().'</td>';
                        echo '<td>'.$fact->getDescripcionProd().'</td>';
                        echo '<td>'.$fact->getPrecioVenta().'</td>';
                        echo '<td>'.$fact->getCantidad().'</td>';
                        echo '<td>'.$fact->getPrecioTotal().'</td>';
                        echo '<td>'.$fact->getFechaPedido().'</td>';
                        $subTotal+=$fact->getPrecioTotal();
//                        echo '<td>'.$fact->getPrecioTotal().'</td>';
                        echo "<td><a href='../../controladores/controller.php?opcion=eliminarPed&idpedido="  . $fact->getIdPedido() . "&correo=".$fact->getCorreo()."' class='btn btn-danger'>eliminar</a></td>";
//                        echo "<td><a href='../../controladores/controller.php?opcion=eliminarCliente&correo="  . $fact->getIdPedido() . "' class='btn btn-danger'>rechazar</a></td>";
//                        echo "<td><a href='../../controladores/controller.php?opcion=cargarAdmi&cedula=" . $fact->getCorreo() . "' class='btn btn-success'>actualizar</a></td>";
                        echo "</tr>";
                        
                    }
                }
                ?>
                      
                  </tbody>
                  <tfoot>
                      <tr>
                          <td> </td>
                          <td>  </td>
                          <td> </td>
                          <td> </td>
                          <td> </td>
                          <td> </td>
                          <td> </td>
                          <td> </td>
                          <td style="font-weight: 700;"> Total: </td>
                          <td style="font-weight: 700; color: red"><?php echo $subTotal?></td>
                         
                      </tr>
                  </tfoot>
                </table>
              <div>
                  <form action="../../controladores/controller.php">
                  <h2>Ingresar Pago</h2>
                  <input type="email" name="correo" placeholder="Confirme su Correo" required>
                  <select name="tipopago">
                      <option value="Efectivo">Efectivo</option>
                      <option value="TarjetaCred">Targeta de Credito</option>
                  </select>
                  <input type="text" name="targeta" placeholder="Nro. Targjeta Credito" minlength="16">
                  <input type="number" name="pago" placeholder="Monto a pagar" min="1.0" step="any" max="1000000" required>
                <input type="hidden" value="realizarPago" name="opcion">
                <input type="submit" name="btnregistrarPago" value="Realizar Pago">
            </form>    
              </div>
              
          </div>
        
          <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" 
integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" 
crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" 
integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" 
crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" 
integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" 
crossorigin="anonymous"></script>

    </body>
</html>
