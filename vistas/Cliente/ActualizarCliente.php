<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Actualizar Repartidor</title>
        <!--<link href="../../css/Administradordiseño.css" rel="stylesheet" type="text/css"/>-->
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
        <?php
        include '../../modelos/Cliente.php';
        //obtenemos los datos de sesion:
        session_start();
        $producto = $_SESSION['cliente'];
        ?>
       
     <div class="container">
              <h2 id="h2">Datos del Nuevo Cliente</h2>
            <form name="forming" action="../../controladores/controller.php">
                  <label for="idcliente">Id Cliente</label>
               <input type="text" name="idcliente" value="<?php echo $producto->getIdCliente() ?>"required>;
                      </p> 
                <label for="nombre">Nombre</label>
                 <input name="nombre" type="text" value="<?php echo $producto->getNombre() ?>"required/>
                </p>
                 <label for="apellido">Apellido</label>
                <input name="apellido" type="text" value="<?php echo $producto->getApellido() ?>" required/>
                 </p>
                <label for="telefono">Telefono</label>
                <input name="telefono" type="text" required maxlength="10" value="<?php echo $producto->getTelefono() ?>"/>
                </p>
                <label for="fechaNacimiento">FechaNacimiento</label>
                <input name="fechaNacimiento" type="date" id="date"  min="1960-01-01" max="2002-12-31" onchange="obtenerFecha(this)" value="<?php echo $producto->getFechaNac() ?>" required/>
                </p>
                 <label for="direccion">Direccion</label>
                <input name="direccion" type="text" value="<?php echo $producto->getDireccion() ?>" required/>
                </p>
                <label for="correo">Correo Electronico</label>
                <input name="correo" type="email" value="<?php echo $producto->getCorreo() ?>" required />
                </p>
                <label for="clave">Contraseña</label>
                <input name="clave" type="password" value="<?php echo $producto->getclave() ?>" required/>
                </p> 
                <input type="hidden" value="actualizarCliente" name="opcion"/>
                <input type="submit" name="btningresarcli" value="Actualizar Datos Cliente" onclick="mensajeIngArt()">

            </form>
        </div>
        <script src="../../javascript/togle.js" type="text/javascript"></script>
        <script src="../../javascript/jquery.min.js" type="text/javascript"></script>
        <script src="../../javascript/mensajes.js" type="text/javascript"></script>
    </body>
</html>
