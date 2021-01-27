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
        <link href="../../css/Administradordiseño.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
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
        include '../../modelos/Producto.php';
        //obtenemos los datos de sesion:
        session_start();
        $producto = $_SESSION['producto'];
        ?>
       
     <div class="ingresar-prod">
            <h2 id="h2">Datos del Producto</h2>
            <form name="forming" action="../../controladores/controller.php">
               <label for="nombreProd">Nombre del Producto</label>
                <input type="text" name="nombreProd" value="<?php echo $producto->getNombreProd(); ?>" required>
                </p>
                <label for="descripcionProd">Descripcion del Producto</label>
                <input type="text" name="descripcionProd" value="<?php echo $producto->getDescripcionProd(); ?>" required>
                </p>
                <label for="precioVenta">Precio Venta</label>
                <input type="text" name="precioVenta" value="<?php echo $producto->getPrecioVenta(); ?>" required>
                </p>
                </p>
                <label for="cantidad">Cantidad del Stock</label>
                <input type="text" name="cantidad" value="<?php echo $producto->getCantidad(); ?>" required>
                </p>
                <input type="hidden" value="actualizarProd" name="opcion"/>
                <input type="submit" name="btningresarprod" value="Actualizar Datos del Producto" onclick="mensajeIngArt()">
            </form>
        </div>
        <script src="../../javascript/togle.js" type="text/javascript"></script>
        <script src="../../javascript/jquery.min.js" type="text/javascript"></script>
        <script src="../../javascript/mensajes.js" type="text/javascript"></script>
    </body>
</html>
