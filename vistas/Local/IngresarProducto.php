<DOCTYPE html>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Local</title>
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
              integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
              crossorigin="anonymous">
         <!--<link href="../Local/css/Administradordiseño.css" rel="stylesheet" type="text/css"/>-->
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
       <?php
        include '../../modelos/Local.php';
        //obtenemos los datos de sesion:
        session_start();
        $local = $_SESSION['local'];
        ?>
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
             echo ' <div style="text-align: left">';
               echo ' <img name="imglogo" id="logo"src="https://previews.123rf.com/images/siiixth/siiixth1609/siiixth160900027/64450371-ir-de-compras-en-la-tienda-de-dibujos-animados-de-tel%C3%A9fonos-inteligentes.jpg" alt="" width="50" height="50"/>';
//                echo '<label id="lblogo"for="imglogo">Bienvenido:  ' . $sesionDTO->getCorreo() .'</label>';
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
             <a href='../../controladores/controller.php?opcion=consultarLocs' class="btn btn-primary" style="background-color: #E34B1B">Ingresar Productos</a>
             <a href='InventarioProductos.php' class="btn btn-primary" style="background-color: #E34B1B">Inventario de Productos</a>
             <a href='../../controladores/controller.php?opcion=cargarLocal&correo=<?php echo $sesionDTO->getCorreo()?>' class="btn btn-primary" style="background-color: #E34B1B">Actualizar Datos Local</a>
             <a href='../../login.php' class="btn btn-primary" style="background-color: #E34B1B">Cerrar Sesion</a>
        </p>
         </div>

           <div class="container">
            <h2 id="h2">Datos del Producto</h2>
            <form name="forming" action="../../controladores/controller.php">
              <label for="local">Local</label>
              <?php
             echo '<input type="text" name="local" value="'.$local->getIdLocal().'"required>';
                     ?>
                      </p>
<!--                 <label for="tipoProducto">Tipo de producto</label>
                <select name="tipoProducto" required>
                    <option value="Alimento">Alimento</option>
                    <option value="Bebida">Bebida</option>
                    <option value="Electrodomestico">Electrodomestico</option>
                    <option value="Prod. Primera Necesidad">Prod. de primera necesidad</option>
                    <option value="Confiteria">Confiteria</option>
                    <option value="Medicamentos">Medicamentos</option>
                    <option value="Otro">Otro</option>
                </select>-->
                <!--</p>-->
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

            </form>
      

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