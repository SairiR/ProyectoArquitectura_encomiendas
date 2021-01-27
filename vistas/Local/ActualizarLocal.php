<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Actualizar Producto</title>
        <!--<link href="../../css/Administradordiseño.css" rel="stylesheet" type="text/css"/>-->
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
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    <header>
        <p></p>
        <p></p>
        <p></p>
        <p></p>
        <p></p>
        <p></p>
        <p></p>
        <p></p>
    </header>
    <body>
        <?php
        include '../../modelos/Local.php';
        //obtenemos los datos de sesion:
        session_start();
        $producto = $_SESSION['local'];
        ?>
       
     <div class="container">
             <h2 id="h2">Datos del Local</h2>
            <form name="forming" action="../../controladores/controller.php" >
                 <label for="idLocal">Id Local</label>
                <input name="idLocal" type="text" value="<?php echo $producto->getIdLocal(); ?>"required/>
                </p> 
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
                <input name="nombre" type="text" value="<?php echo $producto->getNombre(); ?>"required/>
                </p>
                 <label for="direccion">Direccion</label>
                <input name="direccion" type="text" value="<?php echo $producto->getDireccion(); ?>" required/>
                </p>
                <!--<label for="fechaNacimiento">FechaNacimiento</label>
                <input name="fechaNacimiento" type="date" id="date"  min="1960-01-01" max="2002-12-31" onchange="obtenerFecha(this)" required/>
                </p>-->
                <label for="telefono">Telefono</label>
                <input name="telefono" type="text" required maxlength="10"value="<?php echo $producto->getTelefono(); ?>" />
                </p>
                <label for="horario">Horario Atencion</label>
                <input name="horario" type="text" value="<?php echo $producto->getHorario(); ?>" required/>
                </p>
                <label for="correo">Correo Electronico</label>
                <input name="correo" type="email" value="<?php echo $producto->getCorreo(); ?>" required />
                </p>
                <label for="clave">Contraseña</label>
                <input name="clave" type="password" value="<?php echo $producto->getClave(); ?>" required/>
                </p>
          
                <input type="hidden" value="actualizarLocal" name="opcion"/>
                <input class="btn btn-danger" type="submit" name="btningresProv" value="Actualizar Datos Local" onclick="mensajeIngArt()">

            </form>
        </div>
        <script src="../../javascript/togle.js" type="text/javascript"></script>
        <script src="../../javascript/jquery.min.js" type="text/javascript"></script>
        <script src="../../javascript/mensajes.js" type="text/javascript"></script>
    </body>
</html>
