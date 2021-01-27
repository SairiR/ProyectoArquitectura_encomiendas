<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>CRUD Productos</title>
        <link rel="stylesheet"
              href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
              integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
              crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <h1>Lista de productos</h1>
          <div class="container">
             </p>
             <a href='../../controladores/controller.php?opcion=comprar' class="btn btn-primary" style="background-color: #E34B1B">Listar Productos</a>
             <a href='../Local/local.php' class="btn btn-warning">Volver</a>
            </p>
         </div>
            <div>
                <div>
                    <table border="1">
                        <tr>
                            <th>CODIGO PRODUCTO</th>
                            <th>CODIGO LOCAL</th>
                            <th>NOMBRE</th>
                            <th>DESCRIPCION</th>
                            <th>PRECIO</th>
                            <th>CANTIDAD</th>
                            <th>OPCION</th>
                            <!--<th>COMPRAR</th>-->
                        </tr>
                        <?php
                        session_start();
                        include_once '../../modelos/Item.php';
                        //verificamos si existe en sesion el listado de productos:
                        if (isset($_SESSION['listadoitem'])) {
                            $listado = unserialize($_SESSION['listadoitem']);
                            foreach ($listado as $prod) {
                                echo "<tr>";
                                echo "<td>" . $prod->getIdProducto() . "</td>";
                                echo "<td>" . $prod->getIdLocal() . "</td>";
                                echo "<td>" . $prod->getNombreProd() . "</td>";
                                echo "<td>" . $prod->getDescripcionProd() . "</td>";
                                echo "<td>" . $prod->getPrecioVenta() . "</td>";
//                                echo "<td>" . $prod->getCantidad() . "</td>";
//                                echo "<td>" . $prod->getPrecioVenta() . "</td>";
                                echo '<td><input name="cantidad" type="number" min="1" max="100"/></td>';
                                //opciones para invocar al controlador indicando la opcion eliminar o cargar
//y la fila que selecciono el usuario (con el codigo del producto):
                                echo "<td><a class='btn btn-primary' href='../../controladores/controller.php?opcion=comprar&idProd=" . $prod->getIdProducto() . "&idLocal=" . $prod->getIdLocal() . "&nombreProd=" . $prod->getNombreProd() . "&descripcionProd=" . $prod->getDescripcionProd() . "&precioProd=" . $prod->getPrecioVenta() . "&cantidad=" . $prod->getCantidad() . "'>comprar</a></td>";
//                                echo "<td>";
//                                echo "<select name='pais'>";
//                                for($i=1;$i<=$prod->getCantidad();$i++){
//                                echo "<option value='".$i."'>".$i."</option>";
//                                }
//                                echo "</select>";
//                                echo "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "No se han cargado datos.";
                        }
                        ?>
                    </table>

                </div>
                
                <h2>Tabla de Pedidos</h2>
                <div>
                    <table border="1">
                        <tr>
                            <th>CODIGO PRODUCTO</th>
                            <th>CODIGO LOCAL</th>
                            <th>NOMBRE</th>
                            <th>PRECIO</th>
                            <th>CANTIDAD</th>
                            <th>COMPRAR</th>
                            <th>PRECIO TOTAL</th>
                            <!--<th>COMPRAR</th>-->
                        </tr>
                        <?php
                        session_start();
                        include_once '../../modelos/Producto.php';
                        //verificamos si existe en sesion el listado de productos:
                        if (isset($_SESSION['listadoprod'])) {
                            $listado = unserialize($_SESSION['listadoprod']);
                            foreach ($listado as $prod) {
                                echo "<tr>";
                                echo "<td>" . $prod->getIdProducto() . "</td>";
                                echo "<td>" . $prod->getNombreProd() . "</td>";
                                echo "<td>" . $prod->getPrecioVenta() . "</td>";
                                echo '<td><input name="cantidad" type="number" min="1" max="100"/></td>';
                                //opciones para invocar al controlador indicando la opcion eliminar o cargar
//y la fila que selecciono el usuario (con el codigo del producto):
                                echo "<td><a class='btn btn-primary' href='../../controladores/controller.php?opcion=comprar&codigo=" . $prod->getIdProducto() . "'>comprar</a></td>";
//                                echo "<td>";
//                                echo "<select name='pais'>";
//                                for($i=1;$i<=$prod->getCantidad();$i++){
//                                echo "<option value='".$i."'>".$i."</option>";
//                                }
//                                echo "</select>";
//                                echo "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "No se han cargado datos.";
                        }
                        ?>
                    </table>

                </div>
<!--                <div class="col">
                    <input name="cantidad" type="number" min="1" max="100"/>
                    <div class="card">
                        <div class="card-header">
                            CARRITO DE COMPRAS
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                <?php
//                                if (isset($_SESSION['carrito'])) {
//                                    include_once '../../modelos/Item.php';
//                                    $carrito = unserialize($_SESSION['carrito']);
//                                    foreach ($carrito as $p) {
//                                        if ($p->getTieneDescuento() == true) {
////                                            echo "<li class='list-group-item'>" . $p->getNombre() . "(*)</li>";
//                                            echo "<li class='list-group-item'>" . $p->getNombreProd() . " (*)  <a class='btn btn-danger' href='../../controladores/controller.php?opcion=eliminarProd&codigo=" .
//                                            $p->getIdProducto() . "'>eliminar</a></li>";
//                                        } else {
////                                            echo "<li class='list-group-item'>" . $p->getNombre() . "</li>";
//                                            echo "<li class='list-group-item'>" . $p->getNombreProd() . "  <a class='btn btn-danger' href='../../controladores/controller.php?opcion=eliminarProd&codigo=" .
//                                            $p->getIdProducto() . "'>eliminar</a> </li>";
//                                        }
//
////                                        echo "<li><a class='btn btn-danger' href='controller.php?opcion=eliminarProd&codigo=" .
////                                        $p->getCodigo() . "'>eliminar</a></li>";
//                                    }
//                                } else {
//                                    echo "Aun no compra.";
//                                }
                                ?>
                            </ul> 
                        </div>

                        <div class="card-footer">
                            Total:
                            <?php
                            if (isset($_SESSION['valor'])) {
                                $valor = $_SESSION['valor'];
                                echo '<p style="text-align: right; font-weight:bold">' . $valor . '</p>';
                            }
                            ?>
                        </div>
                    </div>
                </div>-->
            </div>
        </div>
    </body>
</html>
