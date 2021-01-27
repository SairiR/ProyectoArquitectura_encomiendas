<DOCTYPE html>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Administrador</title>
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
              integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
              crossorigin="anonymous">
        <link href="../../css/Administradordiseño.css" rel="stylesheet" type="text/css"/>
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

                  <div style="text-align: left">
                <!--<img name="imglogo" id="logo"src="img/admi.jpg" alt="" width="50" height="50"/>    -->
                <label id="lblogo"for="imglogo">Bienvenido: Administrador</label>
                
                  </div>
                <?php
            session_start();  
            include_once '../../modelos/SesionDTO.php';
            if (!isset($_SESSION['sesionDTO'])) {
                header('Location: ../../Login.php');
                die();
            }
            $sesionDTO = unserialize($_SESSION['sesionDTO']);
            if ($sesionDTO->getRol() != "administrador") {
                header('Location: ../../Login.php');
                die();
            }
            
            echo '<div style="text-align: right">';
            echo '<img id="imguser"src="../../img/useradmi.png" alt="" width="60" height="60"/>';
            echo '<a href="../../login.php" class="btn btn-danger">Cerrar Sesion</a> <p>';      
//            echo '<label id="lblbienvenido">Bienvenido: ' . $sesionDTO->getCorreo() . '</label></p>';
            echo '<label id="lblogo2"for="imglogo">'. $sesionDTO->getCorreo() .'</label>';
            echo '</div>';
  
              ?>
            
        </header>

        <div class="menu-lista">
            <ul class="nav">
                <li><a href="index.php">Inicio</a></li>
                <li><a href="#" onclick="ocultarinadmi(), mostrarinadmi()">Nuevo Administrador</a></li>
                <li><a href="#" onclick="mostrarinprov(), ocultarinprov()">Ingresar Tiendas</a></li>
                <li><a href="#" onclick="ocultarinprod(), mostrarinprod()">Ingresar Repartidores</a>
<!--                    <ul>
                        <li><a href="#" onclick="ocultarinprod(), mostrarinprod()">Ingresar Producto</a></li>
                        <li><a href="#" onclick="ocultarmodpro(), mostrarmodpro()">Modificar Producto</a></li>
                        <li><a href="#" onclick="ocultarformeliminar(), mostrarformeliminar()">Eliminar Producto</a></li>

                    </ul>-->
                </li>
                <li><a href="../../controladores/controller.php?opcion=cargarPagPedido" onclick="mostrarinprov(), ocultarinprov()">Pedidos</a></li>
                <li><a href="#">Reportes</a>
                    <ul>
                        <li><a href="../Administrador/ReporteAdministradores.php?opcion=consultarAdmi">Usuarios Administradores</a></li>
                        <li><a href="../Administrador/ReporteRepartidores.php?opcion=consultarRep">Repartidores</a></li>
                        <li><a href="../Administrador/ReporteLocales.php?opcion=consultarLoc">Tiendas</a></li>
                        <li><a href="../Administrador/ReporteClientes.php?opcion=consultarCli">Clientes</a></li>
                        <li><a href="../Administrador/nuevo.php">Nuevo</a></li>
                        <!--<li><a href="InventarioProductos.php">Inventario de Productos</a></li>-->
                    </ul>
                </li>
                <!--<li><a href="registroVentas.jsp">Reporte Caja</a></li>-->
            </ul>
        </div>
        <p></p>
        <div class="icon-img">

            
            
        <div class="crear-admi">

            <h2 id="h2">Datos del Nuevo Administrador</h2>
            <form name="forming" action="../../controladores/controller.php" >
                <label for="correo">Correo Electronico</label>
                <input type="email" name="correo"  required>
                </p>
                <label for="clave">Clave</label>
                <input type="password" name="clave"  required maxlength="10">
                </p>
                <!--<label for="rol">Rol</label>
                <select name="rol" required>
                    <option value="A">Administrador</option>
                    <option value="V">Vendedor</option>
                </select>
                <p/>-->
                <input type="hidden" value="guardarAdmi" name="opcion"/>
                <input type="submit" name="btningresaadmi" value="Crear Administrador" onclick="mensajeIngArt()">

            </form>

        </div>
        <div class="ingresar-prov">

            <h2 id="h2">Datos del Local</h2>
            <form name="forming" action="../../controladores/controller.php" >
                 <label for="seccion">Seccion</label>
                <select name="seccion" required>
                    <option value="Restaurant">Restaurant</option>
                    <option value="Electrodomesticos">Electrodomesticos</option>
                    <option value="Ferreteria">Ferreteria</option>
                    <option value="Medicamentos">Medicamentos</option>
                    <option value="Cosmeticos">Cosméticos</option>
                    <option value="Supermercado">Supermercado</option>
                    <option value="Bebidas">Bebidas</option>
                </select>
                <p/>
                <label for="nombre">Nombre del Local</label>
                <input name="nombre" type="text" required/>
                </p>
                 <label for="direccion">Direccion</label>
                <input name="direccion" type="text" required/>
                </p>
                <!--<label for="fechaNacimiento">FechaNacimiento</label>
                <input name="fechaNacimiento" type="date" id="date"  min="1960-01-01" max="2002-12-31" onchange="obtenerFecha(this)" required/>
                </p>-->
                <label for="telefono">Telefono</label>
                <input name="telefono" type="text" required maxlength="10"/>
                </p>
                <label for="horario">Horario Atencion</label>
                <select name="horario" required>
                    <option value="Lun-Dom 8am-17pm">Lun-Dom 8am-17pm</option>
                    <option value="Lun-Sab 8am-17pm">Lun-Sab 8am-17pm</option>
                    <option value="Lun-Vie 8am-17pm">Lun-Vie 8am-17pm</option>
                    <option value="Lun-Dom 8am-22pm">Lun-Dom 8am-22pm</option>
                    <option value="Lun-Dom 8am-22pm">Lun-Dom 8am-22pm</option>
                    <option value="Lun-Dom 8am-17pm">Lun-Dom 8am-17pm</option>
                </select>
                <!--<input name="horario" type="text" required/>-->
                </p>
                <label for="correo">Correo Electronico</label>
                <input name="correo" type="email" required />
                </p>
                <label for="clave">Contraseña</label>
                <input name="clave" type="password" required/>
                </p>
          
                <input type="hidden" value="guardarProv" name="opcion"/>
                <input type="submit" name="btningresProv" value="Registrar Local" onclick="mensajeIngArt()">

            </form>

     </div>

        <div class="ingresar-rep">
            <h2 id="h2">Datos del Nuevo Repartidor</h2>
            <form name="forming" action="../../controladores/controller.php">
                 <label for="nombre">Nombre</label>
                <input name="nombre" type="text" required/>
                </p>
                 <label for="apellido">Apellido</label>
                <input name="apellido" type="text" required/>
                 </p>
                <label for="telefono">Telefono</label>
                <input name="telefono" type="text" required maxlength="10"/>
                </p>
                <label for="fechaNacimiento">FechaNacimiento</label>
                <input name="fechaNacimiento" type="date" id="date"  min="1960-01-01" max="2002-12-31" onchange="obtenerFecha(this)" required/>
                </p>
                 <label for="direccion">Direccion</label>
                <input name="direccion" type="text" required/>
                </p>
                <label for="correo">Correo Electronico</label>
                <input name="correo" type="email" required />
                </p>
                <label for="clave">Contraseña</label>
                <input name="clave" type="password" required/>
                </p> 
                <input type="hidden" value="guardarRep" name="opcion"/>
                <input type="submit" name="btningresarrep" value="Ingresar Repartidor" onclick="mensajeIngArt()">

            </form>
        </div>
       
<!--        <div class="modificar-prod">
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
        %>
        </div>-->
              
       <!--<div class="final">
          <footer>
               <label> @2021</label>
            </footer>
        </div>-->

<script src="../../javascript/togle.js" type="text/javascript"></script>
<script src="../../javascript/jquery.min.js" type="text/javascript"></script>
<script src="../../javascript/mensajes.js" type="text/javascript"></script>
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