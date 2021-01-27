<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Styles -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,700&display=swap" rel="stylesheet">

    <!-- Ionic icons -->
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">

    <title>CLIENTE</title>
</head>

<body>
    <?php
        include '../../modelos/Local.php';
        //obtenemos los datos de sesion:
        session_start();
        $producto = $_SESSION['listadoloc'];
        ?>
    <div class="d-flex" id="content-wrapper">

        <!-- Sidebar -->
        <div id="sidebar-container" class="bg-primary">
            <div class="logo">
                <h4 class="text-light font-weight-bold mb-0">Cliente</h4>
            </div>
            <div class="menu">
                <a href="#" class="d-block text-light p-3 border-0"></i>
                    Inicio</a>

                <li class="<?php echo $pagina=='index' ? 'active':'' ;?>"<a href="?p=index" class="d-block text-light p-3 border-0"></i>
                    </a> </li>

                <a href="#" class="d-block text-light p-3 border-0"></i>
                    </a>
                <a href="#" class="d-block text-light p-3 border-0"></i>
                    </a>
                <a href="#" class="d-block text-light p-3 border-0"></i>
                    </a>
            </div>
        </div>
        <!-- Fin sidebar -->

        <div class="w-100">

         <!-- Navbar -->
         <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
            <div class="container">
    
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
    
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!--<form class="form-inline position-relative d-inline-block my-2">
                  <input class="form-control" type="search" placeholder="Buscar" aria-label="Buscar">
                  <button class="btn position-absolute btn-search" type="submit"><i class="icon ion-md-search"></i></button>
                </form>-->
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                  <li class="nav-item dropdown">
                    <a class="nav-link text-dark dropdown-toggle" href="#" id="navbarDropdown" role="button"
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <img src="img/user-1.png" class="img-fluid rounded-circle avatar mr-2"
                      alt="https://generated.photos/" />
                    cliente
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
<!--                      <a class="dropdown-item" href="#">Mi perfil</a>
                      <a class="dropdown-item" href="#">Suscripciones</a>
                      <div class="dropdown-divider"></div>-->
<a class="dropdown-item" href="../../login.php">Cerrar sesión</a>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
          <!-- Fin Navbar -->

        <!-- Page Content -->
        <div id="content" class="bg-grey w-100">

              <section class="bg-light py-3">
                  <div class="container">
                      <div class="row">
                          <div class="col-lg-9 col-md-8">
                            <h1 class="font-weight-bold mb-0">Seleccione un Local!</h1>
                            <p class="lead text-muted"></p>
                          </div>
                        <!-- <div class="col-lg-3 col-md-4 d-flex">
                            <button class="btn btn-primary w-100 align-self-center">Descargar reporte</button>
                          </div>-->
                      </div>
                  </div>
              </section>
              <section class="bg-light py-3">
                  <div class="container">
                      <div class="row">
                          <div class="col-lg-9 col-md-8">
                              <a href='../../controladores/controller.php?opcion=consultarLocCli' class="btn btn-primary" style="background-color: #E34B1B">Listar Locales</a>
                               <a href='../../controladores/controller.php?opcion=mostrarPedidos' class="btn btn-primary" style="background-color: #E34B1B">Pedidos Realizados</a>
                              <!--<a href='../Administrador/administrador.php' class="btn btn-warning">Volver</a>-->
                          </div>
                        <!-- <div class="col-lg-3 col-md-4 d-flex">
                            <button class="btn btn-primary w-100 align-self-center">Descargar reporte</button>
                          </div>-->
                      </div>
                  </div>
              </section>
            
              <section class="bg-mix py-3">
                  <div class="container" style="background-color: white">
              <!--<h1>Registro de Locales</h1>-->
                <table class="table">
                    <thead class="thead-dark">   
                        <tr>
                         <th>Id Local</th>
                         <th>Seccion</th>
                         <th>Nombre</th>
                         <th>Direccion</th>
                         <th>Telefono</th>
                         <th>Horario Atencion</th>
                         <th>Correo</th> 
                         <th>Opciones</th> 
                         <th></th> 
                        </tr>
                    </thead>
                  <tbody>
                <?php
//                session_start();
//                include_once '../../modelos/Local.php';
                if(isset($_SESSION['listadoloc'])){
                    $listadoloc= unserialize($_SESSION['listadoloc']);
                    foreach ($listadoloc as $fact){
                        echo '<tr>';
                        echo '<td>'.$fact->getIdLocal().'</td>';
                        echo '<td>'.$fact->getSeccion().'</td>';
                        echo '<td>'.$fact->getNombre().'</td>';
                         echo '<td>'.$fact->getDireccion().'</td>';
                        echo '<td>'.$fact->getTelefono().'</td>';
                        echo '<td>'.$fact->getHorario().'</td>';
                        echo '<td>'.$fact->getCorreo().'</td>';
//                        echo '<td>'.$fact->getRol().'</td>';
                        echo "<td><a href='../../controladores/controller.php?opcion=seleccionarLocal&idLocal=". $fact->getIdLocal() ."' class='btn btn-success'>Seleccionar</a></td>";
//                        echo "<td><a href='../../controladores/controller.php?opcion=cargarRep&correo=" . $fact->getCorreo() . "' class='btn btn-success'>actualizar</a></td>";
                        echo "</tr>";
                        
                    }
                }
                ?>
                  </tbody>
                </table>
          </div>
          
              </section>

        </div>

        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>
        <script>
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, { 
                type: 'bar',
                data: {
                    labels: ['Feb 2020', 'Mar 2020', 'Abr 2020', 'May 2020'],
                    datasets: [{
                        label: 'Nuevos usuarios',
                        data: [50, 100, 150, 200],
                        backgroundColor: [
                            '#12C9E5',  
                            '#12C9E5',
                            '#12C9E5',
                            '#111B54'
                        ],
                        maxBarThickness: 30,
                        maxBarLength: 2
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
            </script>
</body>

</html>
