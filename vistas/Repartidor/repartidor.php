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
        <link href="../Repartidor/css/Repartidordiseño.css" rel="stylesheet" type="text/css"/>

    </head>
      <header>

                
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
             echo ' <div style="text-align: left">';
               echo ' <img name="imglogo" id="logo"src="https://previews.123rf.com/images/siiixth/siiixth1609/siiixth160900027/64450371-ir-de-compras-en-la-tienda-de-dibujos-animados-de-tel%C3%A9fonos-inteligentes.jpg" alt="" width="50" height="50"/>';
//                echo '<label id="lblogo"for="imglogo">Bienvenido:  ' . $sesionDTO->getCorreo() .'</label>';
            echo '      </div>';
            echo '<div style="text-align: right">';
            echo '<img id="imguser"src="../../img/useradmi.png" alt="" width="60" height="60"/>';
            echo '<a href="../../login.php" class="btn btn-danger">Cerrar Sesion</a> <p>';      
            echo '<label id="lblbienvenido">Bienvenido: ' .'</label></p>';
//            echo '<label id="lblogo2"for="imglogo">'. $sesionDTO->getCorreo() .'</label>';
            echo '</div>';
  
              ?>
            
        </header>
    <body style="background: url(../../img/dely2.jpg)">
       
        <div class="container">
            <form action="../../controladores/controller.php">
                <input type="email" name="correo" placeholder="Confirme su correo electronico" required>
                <input type="hidden" value="mostrarPedidos_Rep" name="opcion">
                <input type="submit" name="btnregistrarcli" value="Confirmar" class="btn btn-warning">
            </form>     
        
        </p>
             <!--<a href='../../controladores/controller.php?opcion=mostrarPedidos' class="btn btn-primary" style="background-color: #E34B1B">Total Pedidos</a>-->
             <!--<a href='../../controladores/controller.php?opcion=actualizarRep' class="btn btn-primary" style="background-color: #E34B1B">Modificar Datos Personales</a>-->
             <!--<a href='../Repartidor/repartidor.php' class="btn btn-warning">Volver</a>-->
        </p>
         </div>
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
              <h1>Listar Pedidos Asignados</h1>
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
                         <th>Opcion</th> 
                        </tr>
                    </thead>
                  <tbody>
                <?php
               
                include_once '../../modelos/Pedido.php';
//                $subTotal=0;
                if(isset($_SESSION['listadoped_rep'])){
                    $listadoped= unserialize($_SESSION['listadoped_rep']);
                    
                    foreach ($listadoped as $fact){
                        if($fact->getEstado()=='asignado'){
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
//                        $subTotal+=$fact->getPrecioTotal();
//                        echo '<td>'.$fact->getPrecioTotal().'</td>';
                        echo "<td><a href='../../controladores/controller.php?opcion=completarPed&idpedido="  . $fact->getIdPedido() . "&correo=".$fact->getCorreo()."' class='btn btn-danger'>Completar Pedido</a></td>";
//                        echo "<td><a href='../../controladores/controller.php?opcion=eliminarCliente&correo="  . $fact->getIdPedido() . "' class='btn btn-danger'>rechazar</a></td>";
//                        echo "<td><a href='../../controladores/controller.php?opcion=cargarAdmi&cedula=" . $fact->getCorreo() . "' class='btn btn-success'>actualizar</a></td>";
                        echo "</tr>";
                        }else{
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
//                        $subTotal+=$fact->getPrecioTotal();
//                        echo '<td>'.$fact->getPrecioTotal().'</td>';
                        echo "<td><a href='#' class='btn btn-success'>Completado</a></td>";
//                        echo "<td><a href='../../controladores/controller.php?opcion=eliminarCliente&correo="  . $fact->getIdPedido() . "' class='btn btn-danger'>rechazar</a></td>";
//                        echo "<td><a href='../../controladores/controller.php?opcion=cargarAdmi&cedula=" . $fact->getCorreo() . "' class='btn btn-success'>actualizar</a></td>";
                        echo "</tr>";
                        }
                        
                        
                    }
                }
                ?>
                      
                  </tbody>
<!--                  <tfoot>
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
                          <td style="font-weight: 700; color: red"><?php // echo $subTotal?></td>
                         
                      </tr>
                  </tfoot>-->
                </table>
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
