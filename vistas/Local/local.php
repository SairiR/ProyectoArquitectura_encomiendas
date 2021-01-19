<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Local</title>
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
           <div style="text-align: left">
                <!--<img name="imglogo" id="logo"src="img/admi.jpg" alt="" width="50" height="50"/>    -->
                <label id="lblogo"for="imglogo">Bienvenido: Local</label>
                
                  </div>
                <?php
            session_start();  
            include_once '../../modelos/SesionDTO.php';
//            include_once '../../modelos/Local.php';
//            include_once '../../modelos/ModelUsuario.php';
            if (!isset($_SESSION['sesionDTO'])) {
                header('Location: ../../Login.php');
                die();
            }
            $sesionDTO = unserialize($_SESSION['sesionDTO']);
//            $listadoloc=$modelUsuario->consultarLocales(true);
            if ($sesionDTO->getRol() != "local") {
                header('Location: ../../Login.php');
                die();
            }
//            echo ' <div style="text-align: left">';
//            echo '    <!--<img name="imglogo" id="logo"src="img/admi.jpg" alt="" width="50" height="50"/>    -->';
//            echo '<label id="lblogo"for="imglogo">Bienvenido: Local</label>';
                
            echo      '</div>';
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
                <li><a href="#" onclick="mostrarinprov(), ocultarinprov()">Pedidos</a></li>
                <li><a href="#">Reportes</a>
                    <ul>
                        <li><a href="../Administrador/ReporteAdministradores.php?opcion=consultarAdmi">Usuarios Administradores</a></li>
                        <li><a href="../Administrador/ReporteRepartidores.php?opcion=consultarRep">Repartidores</a></li>
                        <li><a href="../Administrador/ReporteLocales.php?opcion=consultarLoc">Tiendas</a></li>
                        <li><a href="../Administrador/ReporteClientes.php?opcion=consultarCli">Clientes</a></li>
                        <li><a href="InventarioProductos.php">Inventario de Productos</a></li>
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
                    <option value="Alimentos">Alimentos</option>
                    <option value="Electrodomesticos">Electrodomesticos</option>
                    <option value="Ferreteria">Ferreteria</option>
                    <option value="Medicamentos">Medicamentos</option>
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
                <input name="horario" type="text" required/>
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
