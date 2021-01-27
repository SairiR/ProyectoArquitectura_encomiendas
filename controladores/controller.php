<?php

include_once '../modelos/ModelUsuario.php';
include_once '../modelos/Cliente.php';
//include_once '../modelos/Usuario.php';
include_once '../modelos/Repartidor.php';
include_once '../modelos/Local.php';
include_once '../modelos/Producto.php';
include_once '../modelos/Pedido.php';
include_once '../modelos/Pedido_Repartidor.php';
include_once '../modelos/Pago.php';
//include_once './Proveedor.php';
//include_once './ProveedorDTO.php';
//include_once './Producto.php';
//include_once './ProductoDTO.php';
include_once '../modelos/SesionDTO.php';
//include_once '../vendedor/CrudModel.php';
//include_once '../vendedor/FacturaModel.php';
include_once '../modelos/ProductoModel.php';
include_once '../modelos/crudModel.php';

session_start();
$opcion = $_REQUEST['opcion'];
$modelUsuario = new ModelUsuario();
$productoModel = new ProductoModel();
$crudModel = new crudModel();
//$_POST['correo'];
//$opcion = $_REQUEST['opcion'];
//limpiamos cualquier mensaje previo:
unset($_SESSION['mensaje']);

switch ($opcion) {
   case 'login':
        $correo = $_REQUEST['correo'];
        $clave = $_REQUEST['clave'];
        $sesionDTO = $modelUsuario->login($correo, $clave);
        $_SESSION['sesionDTO'] = serialize($sesionDTO); //guardo en sesion.
        $print[$correo];
        //redireccion de navegacion dependiendo del resultado del login:
//         print_r($sesionDTO->getRuta());
        header('Location: ' . $sesionDTO->getRuta());
        
       
        break;
   case 'cargarInventario':
        $correo = $_REQUEST['correo'];
//        $_GET['correo'] = serialize($correo); //guardo en sesion.
        //redireccion de navegacion dependiendo del resultado del login:
//         print_r($sesionDTO->getRuta());
        header('Location: ../vistas/Local/InventarioProductos.php');
       
        break;
     case 'guardarProv';
        $id="";
        $seccion=$_REQUEST["seccion"];
        $nombre=$_REQUEST["nombre"];
        $direccion=$_REQUEST["direccion"];
        $telefono=$_REQUEST["telefono"];
        $horario=$_REQUEST["horario"];
        $correo=$_REQUEST["correo"];
        $clave=$_REQUEST["clave"];
        $rol="local";
        $proveedor=$modelUsuario->crearLocal($id,$seccion, $nombre, $direccion, $telefono, $correo, $clave, $horario, $rol);
        $usuario=$modelUsuario->crearUsuario($correo, $rol, $clave);
        $_SESSION['proveedor']= serialize($proveedor);
        $sesionDTO = unserialize($_SESSION['sesionDTO']);
        header('Location: ../vistas/Administrador/administrador.php');
        break;
    case 'guardarAdmi';
        $correo=$_REQUEST["correo"];
        $clave=$_REQUEST["clave"];
        $rol="administrador";
        $usuario=$modelUsuario->crearUsuario($correo, $rol, $clave);
        $_SESSION['usuario']= serialize($usuario);
        $sesionDTO = unserialize($_SESSION['sesionDTO']);
        header('Location: ../vistas/Administrador/administrador.php');
        break;
    case 'guardarRep';
        $idRepartidor="";
        $nombre=$_REQUEST["nombre"];
        $apellido=$_REQUEST["apellido"];
        $telefono=$_REQUEST["telefono"];
        $fechaNacimiento=$_REQUEST["fechaNacimiento"];
        $direccion=$_REQUEST["direccion"];
        $correo=$_REQUEST["correo"];
        $clave=$_REQUEST["clave"];
        $rol="repartidor";
        $repartidor=$modelUsuario->crearRepartidor($idRepartidor, $nombre, $apellido, $telefono, $fechaNacimiento, $direccion, $correo, $clave, $rol);
        $usuario=$modelUsuario->crearUsuario($correo, $rol, $clave);
        $_SESSION['repartidor']= serialize($repartidor);
        $sesionDTO = unserialize($_SESSION['sesionDTO']);
        header('Location: ../vistas/Administrador/administrador.php');
        break;
    case 'guardarCli';
        $idCliente="";
        $nombre=$_REQUEST["nombre"];
        $apellido=$_REQUEST["apellido"];
        $telefono=$_REQUEST["telefono"];
        $direccion=$_REQUEST["direccion"];
        $fechaNacimiento=$_REQUEST["fechaNac"];
        $correo=$_REQUEST["correoCli"];
        $clave=$_REQUEST["claveCli"];
        $rol="cliente";
        $cliente=$modelUsuario->crearCliente($idCliente, $nombre, $apellido, $telefono, $direccion, $fechaNacimiento, $correo, $clave, $rol);
        $usuario=$modelUsuario->crearUsuario($correo, $rol, $clave);
        $_SESSION['cliente']= serialize($cliente);
        $sesionDTO = unserialize($_SESSION['sesionDTO']);
        header('Location: ../login.php');
        break;
    case 'consultarAdmi';
        $listadoadmi=$modelUsuario->consultarAdministradores(true);
        $_SESSION['listadoadmi']= serialize($listadoadmi);
        header('Location: ../vistas/Administrador/ReporteAdministradores.php');
        break;
    case 'consultarCli';
        $listadocli=$modelUsuario->consultarClientes(true);
        $_SESSION['listadocli']= serialize($listadocli);
        header('Location: ../vistas/Administrador/ReporteClientes.php');
        break;
    case 'consultarPedG';
        $listadoped=$crudModel->consultarPedidosG(true);
        $_SESSION['listadoped']= serialize($listadoped);
        header('Location: ../vistas/Administrador/ReportePedidos.php');
        break;
    //nuevo
    case 'consultarPedGR';
        $idPedido=$_REQUEST["pedido"];
        $listadoped=$crudModel->consultarPedidosGR($idPedido);
        $_SESSION['listadoped']= serialize($listadoped);
        header('Location: ../vistas/Administrador/nuevo.php');
        break;
    case 'mostrarPedidos';
        $correo=$_REQUEST["correo"];
        $listadoped=$modelUsuario->consultarPedidosC($correo);
        $_SESSION['listadoped']= serialize($listadoped);
        header('Location: ../vistas/Cliente/mostarPedidos.php');
        break;
    //repartiodor
    case 'mostrarPedidos_Rep';
        $correo=$_REQUEST["correo"];
        $listadoped_rep=$modelUsuario->consultarPedidosRep($correo);
        $_SESSION['listadoped_rep']= serialize($listadoped_rep);
        header('Location: ../vistas/Repartidor/repartidor.php');
        break;
    case 'completarPed';
//        $correo=$_REQUEST["correo"];
        $idpedido=$_REQUEST["idpedido"];
        $estado="completado";
        $modelUsuario->actualizarPedido($estado, $idpedido);
//        $listadoped_rep=$modelUsuario->consultarPedidosRep($correo);
//        $_SESSION['listadoped_rep']= serialize($listadoped_rep);
        header('Location: ../vistas/Repartidor/repartidor.php');
        break;
    case 'consultarPedx';
        $listadoped=$modelUsuario->consultarPedidos(true);
        $_SESSION['listadoped']= serialize($listadoped);
        header('Location: ../vistas/Repartidor/repartidor.php');
        break;
    case 'consultarRep';
        $listadorep=$modelUsuario->consultarRepartidores(true);
        $_SESSION['listadorep']= serialize($listadorep);
        header('Location: ../vistas/Administrador/ReporteRepartidores.php');
        break;
    case 'consultarLoc';
        $listadoloc=$modelUsuario->consultarLocales(true);
        $_SESSION['listadoloc']= serialize($listadoloc);
        header('Location: ../vistas/Administrador/ReporteLocales.php');
        break;
    case 'consultarLocCli';
        $correo = $_REQUEST['correo'];
        $listadoloc=$modelUsuario->consultarLocales(true);
        $_SESSION['listadoloc']= serialize($listadoloc);
        header('Location: ../vistas/Cliente/mostrarLocal.php');
        break;
    case 'consultarLocs';
        $listadolocs=$modelUsuario->consultarLocales(true);
        $_SESSION['listadolocs']= serialize($listadolocs);
        header('Location: ../vistas/Local/ingresarProducto.php');
        break;
    case "cargarLoc":
        //para permitirle actualizar un producto al usuario primero
        //obtenemos los datos completos de ese producto:
        $correo = $_REQUEST['correo'];
        $listaloc = $modelUsuario->getLocales($correo);
        //guardamos en sesion el producto para posteriormente visualizarlo
        //en un formulario para permitirle al usuario editar los valores:
        $_SESSION['listaloc'] = $listaloc;
        header('Location: ../vistas/Local/local.php');
        break;
     case 'guardarProd';
        $idProducto="";
        $idProveedor=$_REQUEST["idLocal"];
        $nombreProd=$_REQUEST["nombreProd"];
        $descripcionProd=$_REQUEST["descripcionProd"];
        $precioVenta=$_REQUEST["precioVenta"];
        $cantidadProd=$_REQUEST["cantidad"];
        $producto=$modelUsuario->crearProducto($idProducto, $idProveedor, $nombreProd, $descripcionProd, $precioVenta, $cantidadProd);
        $_SESSION['producto']= serialize($producto);
        $sesionDTO = unserialize($_SESSION['sesionDTO']);
        header('Location: ../vistas/Local/local.php');
        break;
    //cambiado
     case 'consultarProd';
        $listadoprodl=$modelUsuario->consultarProductos();
        $_SESSION['listadoprodl']= serialize($listadoprodl);
        header('Location: ../vistas/Local/InventarioProductos.php');
        break;
     case 'consultarProdxId';
        $correo=$_REQUEST["correo"];
        $listadoprod=$modelUsuario->consultarProductosxId($correo);
        $_SESSION['listadoprod']= serialize($listadoprod);
        header('Location: ../vistas/Local/InventarioProductos.php');
        break;
     case 'consultarProv';
        $listadoprov=$modelUsuario->consultarProveedores();
        $_SESSION['listadoprov']= serialize($listadoprov);
        header('Location: administrador/RegistroProveedores.php');
        break;
     case "eliminarUser":
        //obtenemos el codigo del producto a eliminar:
        $correo = $_REQUEST['correo'];
        //eliminamos el producto:
        $modelUsuario->eliminarUsuario($correo);
        //actualizamos la lista de productos para grabar en sesion:
        $listadouser = $modelUsuario->consultarAdministradores();
        $_SESSION['listadouser'] = serialize($listadouser);
        header('Location: ../vistas/Administrador/ReporteAdministradores.php');
        break;
     case "eliminarRepartidor":
        //obtenemos el codigo del producto a eliminar:
        $correo = $_REQUEST['correo'];
        //eliminamos el producto:
        $modelUsuario->eliminarRepartidor($correo);
        //actualizamos la lista de productos para grabar en sesion:
        $modelUsuario->eliminarUsuario($correo);
        $listadorep = $modelUsuario->consultarRepartidores();
        $_SESSION['listadorep'] = serialize($listadorep);
        header('Location: ../vistas/Administrador/ReporteRepartidores.php');
        break;
     case "eliminarCliente":
        //obtenemos el codigo del producto a eliminar:
        $correo = $_REQUEST['correo'];
        //eliminamos el producto:
        $modelUsuario->eliminarCliente($correo);
        $modelUsuario->eliminarUsuario($correo);
        //actualizamos la lista de productos para grabar en sesion:
        $listadocli = $modelUsuario->consultarClientes();
        $_SESSION['listadocli'] = serialize($listadocli);
        header('Location: ../vistas/Administrador/ReporteClientes.php');
        break;
      case "eliminarLocal":
        //obtenemos el codigo del producto a eliminar:
        $correo = $_REQUEST['correo'];
        //eliminamos el producto:
        $modelUsuario->eliminarLocal($correo);
        $modelUsuario->eliminarUsuario($correo);
        //actualizamos la lista de productos para grabar en sesion:
        $listadoloc = $modelUsuario->consultarLocales();
        $_SESSION['listadoloc'] = serialize($listadoloc);
        header('Location: ../vistas/Administrador/ReporteLocales.php');
        break;
      case "eliminarProd":
        //obtenemos el codigo del producto a eliminar:
        $idProducto = $_REQUEST['idproducto'];
        //eliminamos el producto:
        $modelUsuario->eliminarProducto($idProducto);
        //actualizamos la lista de productos para grabar en sesion:
        $listadoprod = $modelUsuario->consultarProductos();
        $_SESSION['listadoprod'] = serialize($listadoprod);
        header('Location: ../vistas/Local/InventarioProductos.php');
        break;
      case "eliminarPed":
        //obtenemos el codigo del producto a eliminar:
        $idPedido = $_REQUEST['idpedido'];
        $correo=$_REQUEST["correo"];
        
        //eliminamos el producto:
        $modelUsuario->eliminarPedido($idPedido);
        //actualizamos la lista de productos para grabar en sesion:
        $listadoped=$modelUsuario->consultarPedidosC($correo);
        $_SESSION['listadoprod'] = serialize($listadoprod);
        header('Location: ../vistas/Cliente/mostarPedidos.php');
        break;
    
   case "realizarPago":
        $idPedio="";
        $correo = $_REQUEST['correo'];
        $pago = $_REQUEST['pago'];
        $tipopago=$_REQUEST["tipoPpago"];
        $targeta=$_REQUEST["targeta"];
        $listadopag=$modelUsuario->crearPago($idPedido, $correo, $tipopago, $monto);
        $_SESSION['listadopag'] = serialize($listadopag);
        header('Location: ../vistas/Cliente/mostarPedidos.php');
        
       
       break;
    
    case "cargarProd":
        //para permitirle actualizar un producto al usuario primero
        //obtenemos los datos completos de ese producto:
        $idProducto = $_REQUEST['idproducto'];
        $producto = $modelUsuario->getProducto($idProducto);
        //guardamos en sesion el producto para posteriormente visualizarlo
        //en un formulario para permitirle al usuario editar los valores:
        $_SESSION['producto'] = $producto;
        header('Location: ../vistas/Local/ActualizarProducto.php');
        break;
    case "cargarLocalesC":
        //para permitirle actualizar un producto al usuario primero
        //obtenemos los datos completos de ese producto:
        $correo = $_REQUEST['correo'];
        $local = $modelUsuario->getLocal($correo);
        //guardamos en sesion el producto para posteriormente visualizarlo
        //en un formulario para permitirle al usuario editar los valores:
        $_SESSION['local'] = $local;
        header('Location: ../vistas/Local/ingresarProductos.php');
        break;
    
    case "actualizarProd":
        //obtenemos los datos modificados por el usuario:
        $idProducto=$_REQUEST["idproducto"];
        $nombreProd=$_REQUEST["nombreProd"];
        $descripcionProd=$_REQUEST["descripcionProd"];
        $precioVenta=$_REQUEST["precioVenta"];
        $cantidadProd=$_REQUEST["cantidad"];
        //actualizamos los datos del producto:
        $modelUsuario->actualizarProducto($nombreProd, $descripcionProd, $precioVenta, $cantidadProd, $idProducto);
        //actualizamos la lista de productos para grabar en sesion:
        $listadoprod = $modelUsuario->consultarProductos();
        $_SESSION['listadoprod'] = serialize($listadoprod);
        header('Location: ../vistas/Local/InventarioProductos.php');
        break;
    case "cargarUser":
        //para permitirle actualizar un producto al usuario primero
        //obtenemos los datos completos de ese producto:
        $correo = $_REQUEST['correo'];
        $usuario = $modelUsuario->getUser($correo);
        //guardamos en sesion el producto para posteriormente visualizarlo
        //en un formulario para permitirle al usuario editar los valores:
        $_SESSION['usuario'] = $usuario;
        header('Location: ../vistas/Local/ActualizarUsuario.php');
        break;
    
    case "actualizarUser":
        //obtenemos los datos modificados por el usuario:
        $correo=$_REQUEST["correo"];
        $clave=$_REQUEST["clave"];
        //actualizamos los datos del producto:
        $modelUsuario->actualizarUser($correo, $clave);
        //actualizamos la lista de productos para grabar en sesion:
        $listadouser = $modelUsuario->consultarAdministradores();
        $_SESSION['listadouser'] = serialize($listadouser);
        header('Location: ../vistas/Administrador/administrador.php');
        break;
    case "cargarLocal":
        //para permitirle actualizar un producto al usuario primero
        //obtenemos los datos completos de ese producto:
        $correo = $_REQUEST['correo'];
        $local = $modelUsuario->getLocal($correo);
        //guardamos en sesion el producto para posteriormente visualizarlo
        //en un formulario para permitirle al usuario editar los valores:
        $_SESSION['local'] = $local;
        header('Location: ../vistas/Local/ActualizarLocal.php');
        break;
    
    case "actualizarLocal":
        //obtenemos los datos modificados por el usuario:
        $idLocal=$_REQUEST["idLocal"];
        $seccion=$_REQUEST["seccion"];
        $nombre=$_REQUEST["nombre"];
        $direccion=$_REQUEST["direccion"];
        $telefono=$_REQUEST["telefono"];
        $horario=$_REQUEST["horario"];
        $correo=$_REQUEST["correo"];
        $clave=$_REQUEST["clave"];
        //actualizamos los datos del producto:
        $modelUsuario->actualizarLocal($seccion, $nombre, $direccion, $telefono, $correo, $clave, $horario);
        //actualizamos la lista de productos para grabar en sesion:
        $listadoloc = $modelUsuario->consultarLocales();
        $_SESSION['listadoloc'] = serialize($listadoloc);
        header('Location: ../vistas/Local/local.php');
        break;
    case "cargarRepartidor":
        //para permitirle actualizar un producto al usuario primero
        //obtenemos los datos completos de ese producto:
        $correo = $_REQUEST['correo'];
        $local = $modelUsuario->getRepartidor($correo);
        //guardamos en sesion el producto para posteriormente visualizarlo
        //en un formulario para permitirle al usuario editar los valores:
        $_SESSION['repartidor'] = $repartidor;
        header('Location: ../vistas/Local/ActualizarRepartidor.php');
        break;
    
    case "actualizarRepartidor":
        //obtenemos los datos modificados por el usuario:
        $nombre=$_REQUEST["nombre"];
        $apellido=$_REQUEST["apellido"];
        $telefono=$_REQUEST["telefono"];
        $fechaNacimiento=$_REQUEST["fechaNacimiento"];
        $direccion=$_REQUEST["direccion"];
        $correo=$_REQUEST["correo"];
        $clave=$_REQUEST["clave"];
        //actualizamos los datos del producto:
        $modelUsuario->actualizarRepartidor($nombre, $apellido, $telefono, $fechaNac, $direccion, $correo, $clave);
        //actualizamos la lista de productos para grabar en sesion:
        $listadorep = $modelUsuario->consultarRepartidores();
        $_SESSION['listadorep'] = serialize($listadorep);
        header('Location: ../vistas/Repartidor/repartidor.php');
        break;
    case "cargarCliente":
        //para permitirle actualizar un producto al usuario primero
        //obtenemos los datos completos de ese producto:
        $correo = $_REQUEST['correo'];
        $cliente = $modelUsuario->getCliente($correo);
        //guardamos en sesion el producto para posteriormente visualizarlo
        //en un formulario para permitirle al usuario editar los valores:
        $_SESSION['cliente'] = $cliente;
        header('Location: ../vistas/Local/ActualizarCliente.php');
        break;
    
    case "actualizarCliente":
        //obtenemos los datos modificados por el usuario:
        $nombre=$_REQUEST["nombre"];
        $apellido=$_REQUEST["apellido"];
        $telefono=$_REQUEST["telefono"];
        $fechaNacimiento=$_REQUEST["fechaNacimiento"];
        $direccion=$_REQUEST["direccion"];
        $correo=$_REQUEST["correo"];
        $clave=$_REQUEST["clave"];
        //actualizamos los datos del producto:
        $modelUsuario->actualizarCliente($nombre, $apellido, $telefono, $direccion, $fechaNac, $correo, $clave);
        //actualizamos la lista de productos para grabar en sesion:
        $listadocli = $modelUsuario->consultarClientes();
        $_SESSION['listadocli'] = serialize($listadocli);
        header('Location: ../vistas/Cliente/cliente.php');
        break;
    
    /////////////////////////
    
    case "cargarPedido":
        //para permitirle actualizar un producto al usuario primero
        //obtenemos los datos completos de ese producto:
        $idProducto = $_REQUEST['idProducto'];
        $producto = $modelUsuario->getProducto($idProducto);
        //guardamos en sesion el producto para posteriormente visualizarlo
        //en un formulario para permitirle al usuario editar los valores:
        $_SESSION['producto'] = $producto;
        header('Location: ../vistas/Cliente/nuevo1.php');
        break;
    case "cargarPedidoR":
        //para permitirle actualizar un producto al usuario primero
        //obtenemos los datos completos de ese producto:
        $idPedido = $_REQUEST['idPedido'];
        $pedido = $modelUsuario->getPedido($idPedido);
        $repartidor = $modelUsuario->getRepartidores();
        //guardamos en sesion el producto para posteriormente visualizarlo
        //en un formulario para permitirle al usuario editar los valores:
        $_SESSION['pedido'] = $pedido;
        $_SESSION['repartidor'] = $repartidor;
        header('Location: ../vistas/Administrador/nuevo.php');
        break;
    
    case "registrarPedido":
        //obtenemos los datos modificados por el usuario:
        $idpedido="";
        $correo=$_REQUEST["correo"];
        $direccion=$_REQUEST["direccion"];
        $idProducto=$_REQUEST["idproducto"];
        $idLocal=$_REQUEST["idlocal"];
        $nombreProd=$_REQUEST["nombreProd"];
        $descripcionProd=$_REQUEST["descripcionProd"];
        $precioVenta=$_REQUEST["precioProd"];
        $cantidadProd=$_REQUEST["cantidadProd"];
        $precioTotal=$precioVenta*$cantidadProd;
        $fechaPedido=$_REQUEST["fechaPedido"];
        $estado="pendiente";
        //actualizamos los datos del producto:
        $modelUsuario->crearPedido($idpedido, $correo, $direccion, $idProducto, $idLocal, $nombreProd, $descripcionProd, $precioVenta, $cantidadProd, $precioTotal, $fechaPedido, $estado);
        //actualizamos la lista de productos para grabar en sesion:
//        $listadoprod = $modelUsuario->consultarProductos();
        $_SESSION['listadoped'] = serialize($listadoped);
        header('Location: ../vistas/Cliente/mostrarProductos.php');
        break;
    
    case "cargarAsignarP":
        //para permitirle actualizar un producto al usuario primero
        //obtenemos los datos completos de ese producto:
        $listadoped=$modelUsuario->consultarPedidos_RepG(true);
        $_SESSION['listadoped']= serialize($listadoped);
        header('Location: ../vistas/Administrador/ReportePedidos.php');
        break;
    
    case "registrarAsignarP":
        //obtenemos los datos modificados por el usuario:
        $idpedido="";
        $correo=$_REQUEST["correo"];
        $direccion=$_REQUEST["direccion"];
        $idProducto=$_REQUEST["idproducto"];
        $idLocal=$_REQUEST["idlocal"];
        $nombreProd=$_REQUEST["nombreProd"];
        $descripcionProd=$_REQUEST["descripcionProd"];
        $precioVenta=$_REQUEST["precio"];
        $cantidadProd=$_REQUEST["cantidad"];
        $precioTotal=$precioVenta*$cantidadProd;
        //actualizamos los datos del producto:
        $modelUsuario->crearPedido($idpedido, $correo, $direccion, $idProducto, $idLocal, $nombreProd, $descripcionProd, $precioVenta, $cantidadProd, $precioTotal);
        //actualizamos la lista de productos para grabar en sesion:
//        $listadoprod = $modelUsuario->consultarProductos();
        $_SESSION['listadoped'] = serialize($listadoped);
        header('Location: ../vistas/Cliente/mostrarProductos.php');
        break;
    
    
    
    //////CONTROLER PRODUCTOS
    case 'seleccionarLocal';
        $idlocal=$_REQUEST['idLocal'];
        $listadoprod=$modelUsuario->consultarProductosL($idlocal);
        $_SESSION['listadoprod']= serialize($listadoprod);
        header('Location: ../vistas/Cliente/mostrarProductos.php');
        break;
    case 'seleccionarRep';
//        $idlocal=$_REQUEST['idLocal'];
        $listadorep=$modelUsuario->getRepartidores();
        $_SESSION['listadorep']= serialize($listadorep);
        header('Location: ../vistas/Cliente/asignarRepartidor.php');
        break;
    case "cargarPed_Rep":
//        //para permitirle actualizar un producto al usuario primero
//        //obtenemos los datos completos de ese producto:
//        $idPedido = $_REQUEST['idpedido'];
//        $pedido = $modelUsuario->consultarPedidos_RepG($idPedido);
//        //guardamos en sesion el producto para posteriormente visualizarlo
//        //en un formulario para permitirle al usuario editar los valores:
//        $_SESSION['pedido'] = $pedido;
        header('Location: ../vistas/Administrador/asignarRepartidor.php');
        break;
    case 'registrarPedido_Rep';
        $idpedido_rep="";
        $idpedido=$_REQUEST["idPedido"];
        $idrepartidor=$_REQUEST["idRepartidor"];
        $correo=$_REQUEST["correo"];
        $direccion=$_REQUEST["direccion"];
        $idProducto=$_REQUEST["idProducto"];
        $idLocal=$_REQUEST["idLocal"];
        $nombreProd=$_REQUEST["nombreProd"];
        $descripcionProd=$_REQUEST["descripcionProd"];
        $precioVenta=$_REQUEST["precioProd"];
        $cantidadProd=$_REQUEST["cantidadProd"];
        $precioTotal=$_REQUEST["precioProd"];
        $fechaPedido=$_REQUEST["fechaPedido"];
        $estado="asignado";
        //actualizamos los datos del producto:
        $modelUsuario->crearPedido_Rep($idpedido_rep, $idpedido, $idrepartidor, $correo, $direccion, $idProducto, $idLocal, $nombreProd, $descripcionProd, $precioVenta, $cantidadProd, $precioTotal, $fechaPedido, $estado);
        $modelUsuario->actualizarPedido($estado, $idpedido);
//actualizamos la lista de productos para grabar en sesion:
//        $listadoprod = $modelUsuario->consultarProductos();
        $_SESSION['listadoped_rep'] = serialize($listadoped_rep);
        header('Location: ../vistas/Administrador/ReportePedidos.php');
//        header('Location: ../vistas/Cliente/asignarRepartidor.php');
        break;
    case 'productosLocal';
        $idlocal=$_REQUEST['idLocal'];
        $listadoprod=$modelUsuario->consultarProductosL($idlocal);
        $_SESSION['listadoprod']= serialize($listadoprod);
        header('Location: ../vistas/Local/InventarioProductos.php');
        break;
    case 'cargarPagLocal';
        $correo=$_REQUEST['correo'];
        $listadoprod=$modelUsuario->consultarProductosxL($correo);
        $_SESSION['listadoprodl']= serialize($listadoprodl);
        header('Location: ../vistas/Local/InventarioProductos.php');
        break;
    //cambiando
    case 'cargarPagPedido';
//        $correo=$_REQUEST['correo'];
        $listadoped=$modelUsuario->consultarPedidos();
        $listadopedg=$modelUsuario->consultarPedidosG(true);
        $_SESSION['listadopedg']= serialize($listadopedg);
        header('Location: ../vistas/Administrador/ReportePedidos.php');
        break;
//    case 'cargarPagPedidoRepartidor';
////        $correo=$_REQUEST['correo'];
//        $listadoped=$modelUsuario->consultarPedidos();
//        $listadopedg=$modelUsuario->consultarPedidosG(true);
//        $_SESSION['listadopedg']= serialize($listadopedg);
//        header('Location: ../vistas/Repartidor/repartidor.php');
//        break;
     case "listar":
        //obtenemos la lista de productos:
        $listado = $modelUsuario->consultarProductos();
        //y los guardamos en sesion: 
        $_SESSION['listado'] = serialize($listado);
        header('Location: ../vistas/Cliente/mostrarProductos.php');
        break;
    case "comprar":
        $idProducto=$_REQUEST['idProducto'];
        $idProveedor=$_REQUEST['idProveedor'];
        $nombreProd=$_REQUEST['nombreProd'];
        $descripcionProd=$_REQUEST['descripcionProd'];
        $precio=$_REQUEST['precioProd'];
        $cantidadProd=$_REQUEST['cantidadProd'];
        $precioTotal=$precio*$cantidadProd;;
        $item=$modelUsuario->crearItem($idProducto, $idProveedor, $nombre, $descripcionProd, $precio, $cantidadProd, $precioTotal);
         $listadoitem = $modelUsuario->consultarItems();
        $_SESSION['listadoitem']= serialize($listadoitem);
        header('Location: ../vistas/Cliente/mostrarProductos.php');
        break;
    case "eliminarProd":
         $codigo=$_REQUEST['codigo'];
//         $cantidad=$_REQUEST['cantidad'];
        if(isset($_SESSION['carrito'])){
            $carrito= unserialize($_SESSION['carrito']);
        }
         // $carrito=$productoModel->agregarCarrito($carrito, $codigo);
        $carrito=$productoModel->eliminarProductoCarrito($carrito, $codigo);
         $valor=$productoModel->valorCarrito($carrito);
         $_SESSION['carrito']=serialize($carrito);
        $_SESSION['valor']=$valor;
        header('Location: ../vistas/Cliente/mostrarProductos.php');
        break;
        
    case "salir":
        session_destroy();
        header('Location: ../../login.php');
        break;
    
    /////
    
//    case "cargar":
//        //para permitirle actualizar un producto al usuario primero
//        //obtenemos los datos completos de ese producto:
//        $cedula = $_REQUEST['cedula'];
//        $usuario = $modelUsuario->getEmpleado($cedula);
//        //guardamos en sesion el producto para posteriormente visualizarlo
//        //en un formulario para permitirle al usuario editar los valores:
//        $_SESSION['usuario'] = $usuario;
//        header('Location: administrador/ActualizarEmpleado.php');
//        break;
//    case "actualizarProd":
//        //obtenemos los datos modificados por el usuario:
//        $tipoProducto=$_REQUEST["tipoProducto"];
//        $tipoMadera=$_REQUEST["tipoMadera"];
//        $color=$_REQUEST["color"];
//        $precioCompra=$_REQUEST["precioCompra"];
//        $precioVenta=$_REQUEST["precioVenta"];
//        $cantidad=$_REQUEST["cantidad"];
//        //actualizamos los datos del producto:
////        $modelUsuario->actualizarProducto
//        //actualizamos la lista de productos para grabar en sesion:
////        $listadoprod = $modelUsuario->consultarProductos(); completar
////        $_SESSION['listadoprod'] = serialize($listadoprod);
////        header('Location: administrador/InventarioProductos.php');
//        break;
//    case "cargar":
//        //para permitirle actualizar un producto al usuario primero
//        //obtenemos los datos completos de ese producto:
//        $cedula = $_REQUEST['cedula'];
//        $usuario = $modelUsuario->getEmpleado($cedula);
//        //guardamos en sesion el producto para posteriormente visualizarlo
//        //en un formulario para permitirle al usuario editar los valores:
//        $_SESSION['usuario'] = $usuario;
//        header('Location: administrador/ActualizarEmpleado.php');
//        break;
//    case "actualizarEmple":
//        //obtenemos los datos modificados por el usuario:
//        $cedula=$_REQUEST["cedula"];
//        $nombre=$_REQUEST["nombre"];
//        $apellido=$_REQUEST["apellido"];
//        $fechaNacimiento=$_REQUEST["fechaNacimiento"];
//        $telefono=$_REQUEST["telefono"];
//        $direccion=$_REQUEST["direccion"];
//        $correo=$_REQUEST["correo"];
//        $rol=$_REQUEST["rol"];
//        //actualizamos los datos del producto:
//        $modelUsuario->actualizarEmpleado($cedula, $nombre, $apellido, $fechaNacimiento, $telefono, $direccion, $correo, $rol);
//        //actualizamos la lista de productos para grabar en sesion:
//        $listadoemple = $modelUsuario->consultarEmpleados();
//        $_SESSION['listadoemple'] = serialize($listadoemple);
//        header('Location: administrador/RegistroEmpleados.php');
//        break;
//    case "cargar":
//        //para permitirle actualizar un producto al usuario primero
//        //obtenemos los datos completos de ese producto:
//        $cedula = $_REQUEST['cedula'];
//        $usuario = $modelUsuario->getEmpleado($cedula);
//        //guardamos en sesion el producto para posteriormente visualizarlo
//        //en un formulario para permitirle al usuario editar los valores:
//        $_SESSION['usuario'] = $usuario;
//        header('Location: administrador/ActualizarEmpleado.php');
//        break;
//      case "crear_cliente":
//        //obtenemos los parametros del formulario:
//        $cedula = $_REQUEST['cedula'];
//        $apellidos = $_REQUEST['apellidos'];
//        $nombres = $_REQUEST['nombres'];
//        $direccion = $_REQUEST['direccion'];
//        //creamos el nuevo registro:
//        $crudModel->insertarCliente($cedula, $apellidos, $nombres, $direccion);
//        //actualizamos el listado:
//        $listaClientes = $crudModel->getClientes();
//        //y los guardamos en sesion:
//        $_SESSION['listaClientes'] = serialize($listaClientes);
//        //redireccionamos a una nueva pagina para visualizar:
//        header('Location: ../vendedor/clientes.php');
//        break;
//     case "listar_facturas":
//        //obtenemos la lista de facturas y subimos a sesion:
//        $_SESSION['listaFacturas'] = serialize($facturaModel->getFacturas());
//        header('Location: ../vendedor/facturas.php');
//        break;
//    case "nueva_factura":
//        unset($_SESSION['listaFacturaDet']);
//        header('Location: ../vendedor/factura.php');
//        break;
//    case "adicionar_detalle":
//        //obtenemos los parametros del formulario:
//        $idProducto = $_REQUEST['idProducto'];
//        $cantidad = $_REQUEST['cantidad'];
//        if (!isset($_SESSION['listaFacturaDet'])) {
//            $listaFacturaDet = array();
//        } else {
//            $listaFacturaDet = unserialize($_SESSION['listaFacturaDet']);
//        }
//        try {
//            $listaFacturaDet = $facturaModel->adicionarDetalle($listaFacturaDet, $idProducto, $cantidad);
//            $_SESSION['listaFacturaDet'] = serialize($listaFacturaDet);
//        } catch (Exception $e) {
//            $mensajeError = $e->getMessage();
//            $_SESSION['mensajeError'] = $mensajeError;
//        }
//        header('Location: ../vendedor/factura.php');
//        break;
//    case "eliminar_detalle":
//        //obtenemos los parametros del formulario:
//        $idProducto = $_REQUEST['idProducto'];
//        $listaFacturaDet = unserialize($_SESSION['listaFacturaDet']);
//        $listaFacturaDet = $facturaModel->eliminarDetalle($listaFacturaDet, $idProducto);
//        $_SESSION['listaFacturaDet'] = serialize($listaFacturaDet);
//        header('Location: ../vendedor/factura.php');
//        break;
//    case "guardar_factura":
//        //obtenemos los parametros del formulario:
//        $cedula = $_REQUEST['cedula'];
//        if (isset($_SESSION['listaFacturaDet'])) {
//            $listaFacturaDet = unserialize($_SESSION['listaFacturaDet']);
//            try {
//                $facturaCab = $facturaModel->guardarFactura($listaFacturaDet, $cedula);
//                $_SESSION['facturaCab'] = $facturaCab;
//                header('Location: ../vendedor/factura_reporte.php');
//                break;
//            } catch (Exception $e) {
//                $mensajeError = $e->getMessage();
//                $_SESSION['mensajeError'] = $mensajeError;
//            }
//        }
//        //actualizamos lista de facturas:
//        //$listado = $gastosModel->getFacturas();
//        //$_SESSION['listado'] = serialize($listado);
//        header('Location: ../vendedor/factura.php');
//        break;
//
    case "salir":
        session_destroy();
        header('Location: ../login.php');
        break;
}


