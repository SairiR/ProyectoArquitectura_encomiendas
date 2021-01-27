<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ingresar Productos</title>
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
      
    </head>
     <header>

                
                <?php
//            session_start();  
//            include_once '../../modelos/SesionDTO.php';
//            if (!isset($_SESSION['sesionDTO'])) {
//                header('Location: ../../Login.php');
//                die();
//            }
//            $sesionDTO = unserialize($_SESSION['sesionDTO']);
//            if ($sesionDTO->getRol() != "local") {
//                header('Location: ../../Login.php');
//                die();
//            }
//             echo ' <div style="text-align: left">';
//               echo ' <img name="imglogo" id="logo"src="https://previews.123rf.com/images/siiixth/siiixth1609/siiixth160900027/64450371-ir-de-compras-en-la-tienda-de-dibujos-animados-de-tel%C3%A9fonos-inteligentes.jpg" alt="" width="50" height="50"/>';
//                echo '<label id="lblogo"for="imglogo">Bienvenido:  ' . $sesionDTO->getCorreo() .'</label>';
//            echo '      </div>';
//            echo '<div style="text-align: right">';
//            echo '<img id="imguser"src="../../img/useradmi.png" alt="" width="60" height="60"/>';
//            echo '<a href="../../login.php" class="btn btn-danger">Cerrar Sesion</a> <p>';      
////            echo '<label id="lblbienvenido">Bienvenido: ' . $sesionDTO->getCorreo() . '</label></p>';
////            echo '<label id="lblogo2"for="imglogo">'. $sesionDTO->getCorreo() .'</label>';
//            echo '</div>';
  
              ?>
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
        $local = $_SESSION['local'];
        ?>
          <div class="container">
            <h2 id="h2">Datos del Producto</h2>
            <form name="forming" action="../../controladores/controller.php">
              <label for="idLocal">Id Local</label>
              <input type="text" name="idLocal" value="<?php echo $local->getIdLocal() ?>"required>
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
                
                <input type="hidden" value="<?php echo $local->getCorreo()?>" name="local"/>
                <input class="btn btn-success" type="submit" name="btningresarprod" value="Ingresar Producto" onclick="mensajeIngArt()">

            </form>
          </div>
    </body>
</html>
