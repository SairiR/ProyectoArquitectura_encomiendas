<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
//include_once '../../modelos/Repartidor.php';
//include_once '../../modelos/Pedido.php';
//require_once '../model/Producto.php';
//require_once '../model/FacturaDet.php';
//require_once '../../modelos/ModelUsuario.php';
//include_once '../../modelos/crudModel.php';
//require_once '../model/FacturaModel.php';
//session_start();
//$crudModel = new CrudModel();
//$facturaModel = new FacturaModel();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Asignacion Repartidor</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
              integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
              crossorigin="anonymous">
        <link href="../../css/Administradordiseño.css" rel="stylesheet" type="text/css"/>

    </head>
      <header>

                
                <?php
//                 session_start();
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
//            echo '<a href="../../login.php" class="btn btn-danger">Cerrar Sesion</a> <p>';      
            echo '<label id="lblbienvenido">Bienvenido: ' .'</label></p>';
//            echo '<label id="lblogo2"for="imglogo">'. $sesionDTO->getCorreo() .'</label>';
            echo '</div>';
  
              ?>
            
        </header>
    <body>
             <?php
        include '../../modelos/Pedido.php';
        include '../../modelos/Repartidor.php';
        //obtenemos los datos de sesion:
        session_start();
        $pedido = $_SESSION['pedido'];
        ?>
        <div class="container">
             </p>
             <!--<a href='../../controladores/controller.php?opcion=seleccionarLocal' class="btn btn-primary" style="background-color: #E34B1B">Listar Productos</a>-->
             <a href='../Administrador/ReportePedidos.php' class="btn btn-warning">Volver</a>
        </p>
         </div>
      <div class="container" style="background-color: white">
           <h1>Confirmacion de Asignacion de Repartidor</h1>
           <!--<input name="b" value="<?php // echo $pedido->getIdPedido()?>"/>hola-->
           <form action="../../controladores/controller.php">
               <table class="table">
                   <thead class="thead-dark">
                       <tr>
                         <th>Repartidor</th>
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
                       </tr>
                   </thead>
                   <tbody>
                       <tr>
                        
                           <td> <select name="idRepartidor">
                    <?php
                    $repartidor = $_SESSION['repartidor'];
                    foreach ($repartidor as $fact) {
                        echo "<option value='" . $fact->getIdRepartidor() . "'>" . $fact->getNombre() . "</option>";
                    }
                    ?>
                </select></td>
                           <td><input type="text" name="idPedido" value="<?php echo $pedido->getIdPedido()?>"required></td>
                           <td><input type="text" name="correo" value="<?php echo $pedido->getCorreo() ?>"required></td>
                           <td><input type="text" name="direccion" value="<?php echo $pedido->getDireccion()?>"required></td>
                           <td><input type="text" name="idProducto" value="<?php echo $pedido->getIdProducto()?>" required></td>
                           <td><input type="text" name="idLocal" value="<?php echo $pedido->getIdLocal()?>"required></td>
                           <td><input type="text" name="nombreProd" value="<?php echo $pedido->getNombreProd()?>"required></td>
                           <td><input type="text" name="descripcionProd" value="<?php echo $pedido->getDescripcionProd()?>"required></td>
                           <td><input type="text" name="precioProd" value="<?php echo $pedido->getPrecioVenta()?>"required></td>
                           <td><input type="text" name="cantidadProd" value="<?php echo $pedido->getCantidad() ?>"required></td>
                           <td><input type="text" name="precioTotal" value="<?php echo $pedido->getPrecioTotal() ?>"required></td>
                           <td><input type="text" name="fechaPedido" value="<?php echo $pedido->getFechaPedido()?>"required></td>
                           <!--<td><label for="fechaPedido">Fecha Pedido</label>--> 
                           <!--<td><input type="date" name="fechaPedido"  value="<?php // echo date("Y/m/d")?>"></td>-->
                       </tr>
                   </tbody>
               </table>
                </div>
<!--                <h2 id="h2">Nombre de Repartidor</h2>
                     Seleccione el Repartidor:
                <select name="cedula">
                    <?php
//                    $repartidor = $_SESSION['repartidor'];
//                    foreach ($repartidor as $fact) {
//                        echo "<option value='" . $fact->getIdRepartidor() . "'>" . $fact->getNombre() . "</option>";
//                    }
                    ?>
                </select>-->
                
                </p>
                <input type="hidden" value="registrarPedido_Rep" name="opcion"/>
                <!--<input type="submit" name="btnvolver" value="Volver" onclick="mensajeIngPed()">-->
                <input class="btn btn-success"type="submit" name="btningresPed" value="Asignar Pedido al Repartidor" onclick="mensajeIngPed()">
                    </form>

<!-- <div class="container">
            <h2 id="h2">Datos del Producto</h2>
            <form name="forming" action="../../controladores/controller.php">
               <label for="nombreProd">Nombre del Producto</label>
                <input type="text" name="nombreProd" value="<?php // echo $producto->getNombreProd(); ?>" required>
                </p>
                <label for="descripcionProd">Descripcion del Producto</label>
                <input type="text" name="descripcionProd" value="<?php // echo $producto->getDescripcionProd(); ?>" required>
                </p>
                <label for="precioVenta">Precio Venta</label>
                <input type="text" name="precioVenta" value="<?php // echo $producto->getPrecioVenta(); ?>" required>
                </p>
                </p>
                <label for="cantidad">Cantidad del Stock</label>
                <input type="text" name="cantidad" value="<?php // echo $producto->getCantidad(); ?>" required>
                </p>
                <input type="hidden" value="actualizarProd" name="opcion"/>
                <input type="submit" name="btningresarprod" value="Actualizar Datos del Producto" onclick="mensajeIngArt()">
            </form>
        </div>-->
                <?php
           
              
               
//                session_start();
//                include_once '../../modelos/Producto.php';
//                if(isset($_SESSION['listadoprod'])){
//                    $listadoprod= unserialize($_SESSION['listadoprod']);
//                    foreach ($listadoprod as $fact){
//                        echo '<tr>';
//                        echo '<td>'.$fact->getIdProducto().'</td>';
//                        echo '<td>'.$fact->getIdLocal().'</td>';
//                        echo '<td>'.$fact->getNombreProd().'</td>';
//                        echo '<td>'.$fact->getDescripcionProd().'</td>';
//                        echo '<td>'.$fact->getPrecioVenta().'</td>';
//                        echo '<td>'.$fact->getCantidad().'</td>';
////                        echo "<td><a href='../../controladores/controller.php?opcion=eliminarProd&idproducto="  . $fact->getIdProducto() . "' class='btn btn-danger'>eliminar</a></td>";
//                        echo "<td><a href='../../controladores/controller.php?opcion=cargarProd&idproducto=" . $fact->getIdProducto() . "' class='btn btn-success' onclick='ocultarinprod(), mostrarinprod()'>actualizar</a></td>";
//                        echo '</tr>';
//                    }
//                }
                ?>
              
           
<!--    </div>-->
          
<!--        <div class="container">
             </p>
        <a href='../../controladores/controller.php?opcion=consultarPedG' class="btn btn-primary" style="background-color: #E34B1B">Listar Pedidos Pendientes</a>
             <a href='../../controladores/controller.php?opcion=actualizarRep' class="btn btn-primary" style="background-color: #E34B1B">Modificar Datos Personales</a>
        <a href='../Administrador/administrador.php' class="btn btn-warning">Volver</a>
        </p>
         </div>
        
         <select name="idProducto">
                    <?php
//                    $listaRepartidores = $crudModel->consultarRepartidores();
//                    echo $listaRepartidores->getIdRepartidor();
//                    foreach ($listaRepartidores as $repartidor) {
//                        echo "<option value='" . $repartidor->getIdRepartidor() . "'>" . $cliente->getIdRepartidor() . "</option>";
//                    }
                    ?>
                </select>
       <div>
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
        
          <div class="container" style="background-color: white">
              <h1>Registro de Pedidos</h1>
              <form>
                  
              </form>
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
                         <th>Seleccionar Repartidor</th> 
                         <th></th> 
                        </tr>
                    </thead>
                  <tbody>
                <?php
//                session_start();
//                include_once '../../modelos/Pedido.php';
//                if(isset($_SESSION['listadoped'])){
//                    $listadoped= unserialize($_SESSION['listadoped']);
//                    foreach ($listadoped as $fact){
//                        if($fact->getEstado()=='pendiente'){
//                        echo '<tr>';
//                        echo '<td>'.$fact->getIdPedido().'</td>';
//                        echo '<td>'.$fact->getCorreo().'</td>';
//                        echo '<td>'.$fact->getDireccion().'</td>';
//                        echo '<td>'.$fact->getIdProducto().'</td>';
//                        echo '<td>'.$fact->getIdLocal().'</td>';
//                        echo '<td>'.$fact->getNombreProd().'</td>';
//                        echo '<td>'.$fact->getDescripcionProd().'</td>';
//                        echo '<td>'.$fact->getPrecioVenta().'</td>';
//                        echo '<td>'.$fact->getCantidad().'</td>';
//                        echo '<td>'.$fact->getPrecioTotal().'</td>';
//                        echo '<td>'.$fact->getFechaPedido().'</td>';
////                        echo '<td><select name="idRepartidor" style="background-color: #29b8c4">';
//////                        include_once '../../modelos/Repartidor.php';
//////                        $listadorep= unserialize($_SESSION['listadorep']);
//////                        
//////                    echo $listaRepartidores->getIdRepartidor();
////                        echo "<option value='seleccione'>Seleccione...</option>";
////                        foreach ($listadorep as $facts) {
////                        echo "<option value='" . $facts->getIdRepartidor() . "'>" . $facts->getNombre() . "</option>";
////                        }
////                    
////                        echo '</select></td>';
//                        echo "<td><a href='../../controladores/controller.php?opcion=cargarPed_Rep&idPedido="  . $fact->getIdPedido() ."' class='btn btn-danger'>Asignar Repartidor</a></td>";
////                        echo "<td><a href='../../controladores/controller.php?opcion=eliminarCliente&correo="  . $fact->getIdPedido() . "' class='btn btn-danger'>rechazar</a></td>";
////                        echo "<td><a href='../../controladores/controller.php?opcion=cargarAdmi&cedula=" . $fact->getCorreo() . "' class='btn btn-success'>actualizar</a></td>";
//                        echo "</tr>";
//                        }
//                    }
//                }
                ?>
                  </tbody>
             
                </table>
          </div>
           <select name="idProducto">
                    <?php
//                    $listaRepartidores = $crudModel->consultarRepartidores();
//                    echo $listaRepartidores->getIdRepartidor();
//                    foreach ($listaRepartidores as $repartidor) {
//                        echo "<option value='" . $repartidor->getIdRepartidor() . "'>" . $cliente->getIdRepartidor() . "</option>";
//                    }
                    ?>
                </select>-->
    </body>
</html>
