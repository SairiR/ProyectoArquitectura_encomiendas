<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Inventario Productos</title>
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
              integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
              crossorigin="anonymous">
    </head>
    <body>
      
          <div class="container">
             </p>
             <a href='../../controladores/controller.php?opcion=seleccionarLocal' class="btn btn-primary" style="background-color: #E34B1B">Listar Productos</a>
             <a href='../Local/local.php' class="btn btn-warning">Volver</a>
        </p>
         </div>
        
          <div class="container">
              <h1>Lista de Productos</h1>
                <table class="table table-striped table-bordered">
                    <thead>   
                        <tr>
                         <th>IdProducto</th>
                         <th>Local/Tienda</th>
                         <th>Nombre de Producto</th>
                         <th>Descricion de Producto</th>
                         <th>Precio de Venta</th> 
                         <th>Cantidad</th> 
                         <th>Opciones</th> 
                        </tr>
                    </thead>
              
                <?php
                session_start();
                include_once '../../modelos/Item.php';
                if(isset($_SESSION['listadoitem'])){
                    $listadoprod= unserialize($_SESSION['listadoitem']);
                    foreach ($listadoprod as $fact){
                        echo '<tr>';
                        echo '<td>'.$fact->getIdProducto().'</td>';
                        echo '<td>'.$fact->getIdLocal().'</td>';
                        echo '<td>'.$fact->getNombre().'</td>';
                        echo '<td>'.$fact->getDescripcion().'</td>';
                        echo '<td>'.$fact->getPrecio().'</td>';
                        echo '<td>'.$fact->getCantidad().'</td>';
                        echo '<td>'.$fact->getPrecioTotal().'</td>';
                        echo "<td><a href='../../controladores/controller.php?opcion=eliminarProd&idproducto="  . $fact->getIdProducto() . "' class='btn btn-danger'>eliminar</a></td>";
                        echo "<td><a href='../../controladores/controller.php?opcion=cargarProd&idproducto=" . $fact->getIdProducto() . "' class='btn btn-success' onclick='ocultarinprod(), mostrarinprod()'>actualizar</a></td>";
                        echo '</tr>';
                    }
                }
                ?>
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
