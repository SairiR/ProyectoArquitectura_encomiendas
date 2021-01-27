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
        include '../../modelos/Producto.php';
        //obtenemos los datos de sesion:
        session_start();
        $producto = $_SESSION['producto'];
        ?>
       
     <div class="container">
            <h2 id="h2">Nuevos Datos del Producto</h2>
            <form name="forming" action="../../controladores/controller.php">
              <label for="idproducto">Id Producto</label>
               <input type="text" name="idproducto" value="<?php echo $producto->getIdProducto() ?>"required>
                      </p>
                <label for="nombreProd">Nombre del Producto</label>
                <input type="text" name="nombreProd" value="<?php echo $producto->getNombreProd() ?>" required>
                </p>
                <label for="descripcionProd">Descripcion del Producto</label>
                <input type="text" name="descripcionProd" value="<?php echo $producto->getDescripcionProd() ?>" required>
                </p>
                <label for="precioVenta">Precio Venta</label>
                <input type="number" name="precioVenta" min="1.0" step="any" value="<?php echo $producto->getPrecioVenta() ?>" required>
                </p>
                <label for="cantidad">Cantidad</label>
                <input type="number" min="1" name="cantidad" value="<?php echo $producto->getCantidad()?>" required>
                </p>
                <input type="hidden" value="actualizarProd" name="opcion"/>
                <input class="btn btn-danger" type="submit" name="btningresarprod" value="Actualizar Datos del Producto" onclick="mensajeIngArt()">

            </form>
        </div>
        <script src="../../javascript/togle.js" type="text/javascript"></script>
        <script src="../../javascript/jquery.min.js" type="text/javascript"></script>
        <script src="../../javascript/mensajes.js" type="text/javascript"></script>
    </body>
</html>
