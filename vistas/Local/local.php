<DOCTYPE html>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Local</title>
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
              integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
              crossorigin="anonymous">
         <link href="../Local/css/Administradordiseño.css" rel="stylesheet" type="text/css"/>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script>
            function obtenerFecha(e)
            {

                var fecha = moment(e.value);
                console.log("Fecha original:" + e.value);
                console.log("Fecha formateada es: " + fecha.format("YYYY/MM/DD"));
            }</script> 

    </head>
    <body>

        <header>

                
                <?php
            session_start();  
            include_once '../../modelos/SesionDTO.php';
            if (!isset($_SESSION['sesionDTO'])) {
                header('Location: ../../Login.php');
                die();
            }
            $sesionDTO = unserialize($_SESSION['sesionDTO']);
            if ($sesionDTO->getRol() != "local") {
                header('Location: ../../Login.php');
                die();
            }
             echo ' <div style="text-align: left">';
               echo ' <img name="imglogo" id="logo"src="https://previews.123rf.com/images/siiixth/siiixth1609/siiixth160900027/64450371-ir-de-compras-en-la-tienda-de-dibujos-animados-de-tel%C3%A9fonos-inteligentes.jpg" alt="" width="50" height="50"/>';
                echo '<label id="lblogo"for="imglogo">Bienvenido:  ' . $sesionDTO->getCorreo() .'</label>';
            echo '      </div>';
            echo '<div style="text-align: right">';
            echo '<img id="imguser"src="../../img/useradmi.png" alt="" width="60" height="60"/>';
            echo '<a href="../../login.php" class="btn btn-danger">Cerrar Sesion</a> <p>';      
//            echo '<label id="lblbienvenido">Bienvenido: ' . $sesionDTO->getCorreo() . '</label></p>';
//            echo '<label id="lblogo2"for="imglogo">'. $sesionDTO->getCorreo() .'</label>';
            echo '</div>';
  
              ?>
            
        </header>
         <div class="container">
             </p>
             <a href='../../controladores/controller.php?opcion=cargarLocalesC&correo=<?php echo $sesionDTO->getCorreo()?>' class="btn btn-primary" style="background-color: #E34B1B">Ingresar Productos</a>
             <a href='../../controladores/controller.php?opcion=cargarPagLocal&correo=<?php echo $sesionDTO->getCorreo()?>' class="btn btn-primary" style="background-color: #E34B1B">Inventario de Productos</a>
             <a href='../../controladores/controller.php?opcion=cargarLocal&correo=<?php echo $sesionDTO->getCorreo()?>' class="btn btn-primary" style="background-color: #E34B1B">Actualizar Datos Local</a>
             <a href='../../login.php' class="btn btn-primary" style="background-color: #E34B1B">Cerrar Sesion</a>
        </p>
         </div>

<!--        <div class="menu-lista">
            <ul class="nav">
                <li><a href="../Local/local.php">Inicio</a></li>
                <li><a href="#" onclick="ocultarinadmi(), mostrarinadmi()">Nuevo Administrador</a></li>
                <li><a href="#" onclick="ocultarinprod(), mostrarinprod()">Ingresar Productos</a>
                <li><a href="#" onclick="ocultarinprod(), mostrarinprod()">Ingresar Repartidores</a>
                    <ul>
                        <li><a href="#" onclick="ocultarinprod(), mostrarinprod()">Ingresar Producto</a></li>
                        <li><a href="#" onclick="ocultarmodpro(), mostrarmodpro()">Modificar Producto</a></li>
                        <li><a href="#" onclick="ocultarformeliminar(), mostrarformeliminar()">Eliminar Producto</a></li>

                    </ul>
                </li>
                <li><a href="#" onclick="mostrarinprov(), ocultarinprov()">Pedidos</a></li>
                <li><a href="#">Reportes</a>
                    <ul>
                        <li><a href="../Local/InventarioProductos.php">Inventario Productos</a></li>
                        <li><a href="../Administrador/ReporteRepartidores.php?opcion=consultarRep">Repartidores</a></li>
                        <li><a href="../Administrador/ReporteLocales.php?opcion=consultarLoc">Tiendas</a></li>
                        <li><a href="../Administrador/ReporteClientes.php?opcion=consultarCli">Clientes</a></li>
                        <li><a href="InventarioProductos.php">Inventario de Productos</a></li>
                    </ul>
                </li>
                <li><a href="../../controladores/controller.php?opcion=cargarLocal&correo=<?php echo $sesionDTO->getCorreo()?>">Actualizar Datos Local</a>
            </ul>
        </div>-->
<!--        <p></p>
        <div class="icon-img">
           <div class="ingresar-prod">
            <h2 id="h2">Datos del Producto</h2>
            <form name="forming" action="../../controladores/controller.php">
              <label for="local">Local</label>
              <?php
             echo '<input type="text" name="local" value="'.$sesionDTO->getCorreo().'"required>';
                     ?>
                      </p>
                 <label for="tipoProducto">Tipo de producto</label>
                <select name="tipoProducto" required>
                    <option value="Alimento">Alimento</option>
                    <option value="Bebida">Bebida</option>
                    <option value="Electrodomestico">Electrodomestico</option>
                    <option value="Prod. Primera Necesidad">Prod. de primera necesidad</option>
                    <option value="Confiteria">Confiteria</option>
                    <option value="Medicamentos">Medicamentos</option>
                    <option value="Otro">Otro</option>
                </select>
                </p>
                <label for="nombreProd">Nombre del Producto</label>
                <input type="text" name="nombreProd" required>
                </p>
                <label for="descripcionProd">Descripcion del Producto</label>
                <input type="text" name="descripcionProd" required>
                </p>
                <label for="precioVenta">Precio Venta</label>
                <input type="number" name="precioVenta" min="1.0" step="any" required>
                </p>
                <label for="cantidad">Cantidad</label>
                <input type="number" min="1" name="cantidad" required>
                </p>
                <input type="hidden" value="guardarProd" name="opcion"/>
                
                <input type="hidden" value="<?php echo $sesionDTO->getCorreo()?>" name="local"/>
                <input type="submit" name="btningresarprod" value="Ingresar Producto" onclick="mensajeIngArt()">

            </form>-->
       
<!--          <div class="modificar-prod">
            <h2 id="h2">Modificar Datos del Articulo</h2>
            <form name="formmod" action="index.php" method="post">
                Seleccione Articulo a Modificar: <select name="listaArticulos">
                    <%    
                    if (!m.obtenerArticulosName().isEmpty()) {
                    for (int i = 0; i < m.obtenerArticulosName().size(); i++) {
                    %>
                    <option value="<%=m.obtenerArticulosName().get(i)%>"><%= m.obtenerArticulosName().get(i)%></option>
                    <%
                    }
                    }else{
                    %>
                    <option value="0">NO TIENE ARTICULOS INGRESADOS</option> 
                    <%
                    }
                    %>
                </select>
                </p>
                <label for="precioProducto">Precio Unitario</label>
                <input type="text" name="precioProducto" required>
                </p>
                </p>
                <label for="cantidadProducto">Cantidad del Stock</label>
                <input type="text" name="cantidadProducto" required>
                </p>
                <label for="archivosubido">Sube una imagen</label>
                <input type="file" name="imagenProducto" required>
                <p/>


                <input type="submit" name="btnguardar" value="Guardar Cambios" onclick="mensajeModArt()">

            </form>
                 <%
                if (request.getParameter("btnguardar") != null) {
                    String descripcion=request.getParameter("listaArticulos");
                    System.out.println(""+descripcion);
                    double preciou = Double.parseDouble(request.getParameter("precioProducto"));
                    int stock = Integer.parseInt(request.getParameter("cantidadProducto"));
                    String imagen = request.getParameter("imagenProducto");
                    m.modificarArticulo(descripcion,preciou, stock, imagen);
    
                }
    
            %>

        </div>

        <div class="eliminar-prod">
            <h2 id="h2">Eliminar Articulo</h2>
            <p>SELECCIONE EL ARTICULO A ELIMINAR:</p>
            <form name="formeli" action="index.php" method="post">
                Seleccione Articulo a Eliminar: <select name="listaArticulos">
                    <%    
                    if (!m.obtenerArticulosName().isEmpty()) {
                    for (int i = 0; i < m.obtenerArticulosName().size(); i++) {
                    %>
                    <option value="<%=m.obtenerArticulosName().get(i)%>"><%= m.obtenerArticulosName().get(i)%></option>
                    <%
                    }
                    }else{
                    %>
                    <option value="0">NO TIENE ARTICULOS INGRESADOS</option> 
                    <%
                    }
                    %>
                </select>
                </p>
                <input type="submit" name="btneliminar" value="Eliminar Articulo" onclick="mensajeEliArt()">

            </form>
                <%
            if (request.getParameter("btneliminar") != null) {
                String descripcion= request.getParameter("listaArticulos");
                m.eliminarArticulo(descripcion);
    
            }
        %>-->
        <!--</div>-->
              
       <!--<div class="final">
          <footer>
               <label> @2021</label>
            </footer>
        </div>-->

       <script src="../Local/javascript/togle.js" type="text/javascript"></script>
<script src="../Local/javascript/jquery.min.js" type="text/javascript"></script>
<script src="../Local/javascript/mensajes.js" type="text/javascript"></script>
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