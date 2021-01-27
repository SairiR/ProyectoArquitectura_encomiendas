<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Nuevo Pedido</title>
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
              integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
              crossorigin="anonymous">
        <link href="../Cliente/css/Clientediseño.css" rel="stylesheet" type="text/css"/>
    </head>
    <header>
        <p>
        <p>
        <p>
        <p>
        <p>
        
        <p>
        <p>
        <p>
        <p>
        <p>
        <p>
        <p>
    </header>
    <body>
      <script>
            function obtenerFecha(e)
            {

                var fecha = moment(e.value);
                console.log("Fecha original:" + e.value);
                console.log("Fecha formateada es: " + fecha.format("YYYY/MM/DD"));
            }</script> 
        <?php
        include '../../modelos/Producto.php';
        //obtenemos los datos de sesion:
        session_start();
        $producto = $_SESSION['producto'];
        ?>
        <div class="container">
             </p>
             <!--<a href='../../controladores/controller.php?opcion=seleccionarLocal' class="btn btn-primary" style="background-color: #E34B1B">Listar Productos</a>-->
             <a href='../Cliente/mostrarProductos.php' class="btn btn-warning">Volver</a>
        </p>
         </div>
       <div class="container">
           <h1>Confirmacion de Pedido</h1>
           <form action="../../controladores/controller.php">
               <table class="table">
                   <thead class="thead-dark">
                       <tr>
                         <!--<th>Correo</th>-->
                         <th>IdProducto</th>
                         <th>Local/Tienda</th>
                         <th>Nombre de Producto</th>
                         <th>Descricion de Producto</th>
                         <th>Precio de Venta</th> 
                         <th>Cantidad</th> 
                         <th>Fecha Pedido</th> 
                         <!--<th>Opciones</th>--> 
                       </tr>
                   </thead>
                   <tbody>
                       <tr>
                           <!--<td><input type="text" name="correo" placeholder="Ingrese su correo"required></td>-->
                           <td><input type="text" name="idproducto" value="<?php echo $producto->getIdProducto()?>"required></td>
                           <td><input type="text" name="idlocal" value="<?php echo $producto->getIdLocal() ?>"required></td>
                           <td><input type="text" name="nombreProd" value="<?php echo $producto->getNombreProd()?>"required></td>
                           <td><input type="text" name="descripcionProd" value="<?php echo $producto->getDescripcionProd()?>" required></td>
                           <td><input type="text" name="precioProd" value="<?php echo $producto->getPrecioVenta()?>"required></td>
                           <td><input type="number" name="cantidadProd" value="<?php echo $producto->getCantidad() ?>"required></td>
                           <!--<td><label for="fechaPedido">Fecha Pedido</label>--> 
                           <td><input type="date" name="fechaPedido"  value="<?php echo date("Y-m-d")?>"></td>
                       </tr>
                   </tbody>
               </table>
                <h2 id="h2">Datos del Envio</h2>
                <label for="correo">Ingrese su Correo</label>
                <input type="text" name="correo" required>
                </p>
                <label for="direccion">Direccion Especifica</label>
                <input type="text" name="direccion" required>
                </p>
                
                </p>
                <input type="hidden" value="registrarPedido" name="opcion"/>
                <!--<input type="submit" name="btnvolver" value="Volver" onclick="mensajeIngPed()">-->
                <input class="btn btn-success" type="submit" name="btningresPed" value="Realizar Pedido" onclick="mensajeIngPed()">
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
              
           
    </div>
        <script src="../../javascript/togle.js" type="text/javascript"></script>
<script src="../../javascript/jquery.min.js" type="text/javascript"></script>
<script src="../Cliente/js/mensajes.js" type="text/javascript"></script>
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
