<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<!--<html>
    <head>
        <meta charset="UTF-8">
        <title>LOGIN</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    <body style="background: #F9A825">

        <div id="login">

            <h3 class="text-center text-white pt-5"></h3>
       

            <div class="container" style="background: #F3F3F3; margin: auto;
    width: 50%;
    max-width: 500px;
    background: #F3F3F3;
    padding: 30px;
    border-radius: 5px;
    position: relative;
    border: 1px solid rgba(0,0,0,0.2);">
                <h3 style="color:#13B6C8; text-align: center">Login</h3>
                <label id="img1" style="display: block; margin-left: auto;
                       margin-right: auto;"><img src="https://lofrev.net/wp-content/photos/2017/03/user_blue_logo.png" style="display:block;
                       margin-left: auto;
                       margin-right: auto; width: 100px; height: 100px;"></img></label>
                <div id="login-row" class="row justify-content-center align-items-center">
                    <div id="login-column" class="col-md-6">
                        <div id="login-box" class="col-md-12">
                            <form id="login-form" class="form" action="./controladores/controller.php">
                                <h3 class="text-center text-info"></h3>
                              
                                <div class="form-group">
                                    <label for="email" class="text-info">Ingrese su Correo:</label><br>
                                    <input type="email" name="correo" id="correo" class="form-control" required maxlength="50" style="">
                                </div>
                                <div class="form-group">
                                    <label for="clave" class="text-info">Ingrese su clave:</label><br>
                                    <input type="password" name="clave" id="clave" class="form-control" maxlength="10">
                                </div>
                                <div class="form-group">
                                    <input type="hidden" value="login" name="opcion">
                                    <input type="submit" name="submit" class="btn btn-info btn-md" value="LOGIN">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>-->



<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Login</title>
        <link href="css/Logindiseño.css" rel="stylesheet" type="text/css"/>
    </head>

    <body>
            <!--<h2>SISTEMA DE ENCOMIENDAS</h2>-->
      <div class="form-general">
            <div class="toggle">
               <span> Crear Cuenta Cliente<span/> 
            </div>
            <div class="form">
                <h2 id="log">LOGIN</h2>
                <form action="controladores/controller.php" method="post" name="formcreateCli">
                    <label id="img1"><img src="https://cdn.icon-icons.com/icons2/212/PNG/256/User-blue256_25016.png"></img></label>
                    <label id="img2"><img src="http://www.habitatriverside.org/wp-content/uploads/2016/10/HFH_ICON_KEY_Blue.png"></img></label>
                    <label id="img3"><img src="http://itapuamonteverde.com.br/wp-content/uploads/2018/01/xtqwqiphehtgofvznyec.png"></img></label>
                    <input type="email" name="correo" placeholder="&#xf207; Correo Electronico" required>
                    <input type="password" name="clave" placeholder="&#xf191; Contraseña"  required>
                    <input type="hidden" value="login" name="opcion">
                    <input type="submit" name="submit" class="btn btn-info btn-md" value="Iniciar Sesion">
                </form>
            </div>

            <div class="form">
                <h2 id="crear">Crea cuenta Cliente</h2>
                <form action="controladores/controller.php">
                    <input type="text" name="nombre" placeholder="Nombre" required>
                    <input type="text" name="apellido" placeholder="Apellido" required>
                    <input type="text" name="telefono" placeholder="Telefono" maxlength="10" required>
                    <input type="text" name="direccion" placeholder="Direccion" required>
                    <input type="date" name="fechaNac" placeholder="Fecha de Nacimiento" required>
                    <input type="email" name="correoCli" placeholder="Correo Electronico" required>
                     <input type="password" name="claveCli" placeholder="Contraseña" required>
                    <!--<input type="text" name="nrotarjeta" placeholder="Nro. Tarjeta de Credito" maxlength="16" required pattern="[0-9]{1,16}">-->
                     <input type="hidden" value="guardarCli" name="opcion">
                     <input type="submit" name="btnregistrarcli" value="Registrar Cuenta" onclick="mensajeCrearCli()">
                </form>
            </div>
            
        </div>
      <script src="javascript/jquery.min.js" type="text/javascript"></script>
      <script src="javascript/main.js" type="text/javascript"></script>
      <script src="javascript/mensajes.js" type="text/javascript"></script>
       
      <!--out.println("<script type=\"text/javascript\">alert(\"VERIFIQUE SUS DATOS\");</script>");-->

               
    </body>
    
</html>
