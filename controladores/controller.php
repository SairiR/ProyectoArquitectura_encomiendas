<?php

include_once '../modelos/ModelUsuario.php';
include_once '../modelos/Cliente.php';
//include_once '../modelos/Usuario.php';
include_once '../modelos/Repartidor.php';
include_once '../modelos/Local.php';
//include_once './Proveedor.php';
//include_once './ProveedorDTO.php';
//include_once './Producto.php';
//include_once './ProductoDTO.php';
include_once '../modelos/SesionDTO.php';
//include_once '../vendedor/CrudModel.php';
//include_once '../vendedor/FacturaModel.php';
session_start();
$opcion = $_REQUEST['opcion'];
$modelUsuario = new ModelUsuario();

switch ($opcion) {
   case 'login':
        $correo = $_REQUEST['correo'];
        $clave = $_REQUEST['clave'];
        $sesionDTO = $modelUsuario->login($correo, $clave);
        $_SESSION['sesionDTO'] = serialize($sesionDTO); //guardo en sesion.
        //redireccion de navegacion dependiendo del resultado del login:
//         print_r($sesionDTO->getRuta());
        header('Location: ' . $sesionDTO->getRuta());
       
        break;
     case 'guardarProv';
        $seccion=$_REQUEST["seccion"];
        $nombre=$_REQUEST["nombre"];
        $direccion=$_REQUEST["direccion"];
        $telefono=$_REQUEST["telefono"];
        $horario=$_REQUEST["horario"];
        $correo=$_REQUEST["correo"];
        $clave=$_REQUEST["clave"];
        $rol="local";
        $proveedor=$modelUsuario->crearLocal($seccion, $nombre, $direccion, $telefono, $correo, $clave, $horario, $rol);
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
        $nombre=$_REQUEST["nombre"];
        $apellido=$_REQUEST["apellido"];
        $telefono=$_REQUEST["telefono"];
        $fechaNacimiento=$_REQUEST["fechaNacimiento"];
        $direccion=$_REQUEST["direccion"];
        $correo=$_REQUEST["correo"];
        $clave=$_REQUEST["clave"];
        $rol="repartidor";
        $repartidor=$modelUsuario->crearRepartidor($nombre, $apellido, $telefono, $fechaNacimiento, $direccion, $correo, $clave, $rol);
        $usuario=$modelUsuario->crearUsuario($correo, $rol, $clave);
        $_SESSION['repartidor']= serialize($repartidor);
        $sesionDTO = unserialize($_SESSION['sesionDTO']);
        header('Location: ../vistas/Administrador/administrador.php');
        break;
    case 'guardarCli';
        $nombre=$_REQUEST["nombre"];
        $apellido=$_REQUEST["apellido"];
        $telefono=$_REQUEST["telefono"];
        $direccion=$_REQUEST["direccion"];
        $fechaNacimiento=$_REQUEST["fechaNac"];
        $correo=$_REQUEST["correoCli"];
        $clave=$_REQUEST["claveCli"];
        $rol="cliente";
        $cliente=$modelUsuario->crearCliente($nombre, $apellido, $telefono, $direccion, $fechaNacimiento, $correo, $clave, $rol);
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
    
    
    
    
     case 'consultarProd';
        $listadoprod=$modelUsuario->consultarProductos();
        $_SESSION['listadoprod']= serialize($listadoprod);
        header('Location: administrador/InventarioProductos.php');
        break;
     case 'consultarEmple';
        $listadoemple=$modelUsuario->consultarEmpleados(true);
        $_SESSION['listadoemple']= serialize($listadoemple);
        header('Location: administrador/RegistroEmpleados.php');
        break;
     case 'consultarProv';
        $listadoprov=$modelUsuario->consultarProveedores();
        $_SESSION['listadoprov']= serialize($listadoprov);
        header('Location: administrador/RegistroProveedores.php');
        break;
     case "eliminarEmple":
        //obtenemos el codigo del producto a eliminar:
        $cedula = $_REQUEST['cedula'];
        //eliminamos el producto:
        $modelUsuario->eliminarEmpleado($cedula);
        //actualizamos la lista de productos para grabar en sesion:
        $listadoemple = $modelUsuario->consultarEmpleados();
        $_SESSION['listadoemple'] = serialize($listadoemple);
        header('Location: administrador/RegistroEmpleados.php');
        break;
      case "eliminarProd":
        //obtenemos el codigo del producto a eliminar:
        $idProducto = $_REQUEST['idProducto'];
        //eliminamos el producto:
        $modelUsuario->eliminarProducto($idProducto);
        //actualizamos la lista de productos para grabar en sesion:
        $listadoprod = $modelUsuario->consultarProductos();
        $_SESSION['listadoprod'] = serialize($listadoprod);
        header('Location: administrador/RegistroProductos.php');
        break;
      case "eliminarProv":
        //obtenemos el codigo del producto a eliminar:
        $idProveedor = $_REQUEST['idProveedor'];
        //eliminamos el producto:
        $modelUsuario->eliminarProveedor($idProveedor);
        //actualizamos la lista de productos para grabar en sesion:
        $listadoprov = $modelUsuario->consultarProveedores();
        $_SESSION['listadoprov'] = serialize($listadoprov);
        header('Location: administrador/InventrioProductos.php');
        break;
    case "actualizarEmple":
        //obtenemos los datos modificados por el usuario:
        $cedula=$_REQUEST["cedula"];
        $nombre=$_REQUEST["nombre"];
        $apellido=$_REQUEST["apellido"];
        $fechaNacimiento=$_REQUEST["fechaNacimiento"];
        $telefono=$_REQUEST["telefono"];
        $direccion=$_REQUEST["direccion"];
        $correo=$_REQUEST["correo"];
        $rol=$_REQUEST["rol"];
        //actualizamos los datos del producto:
        $modelUsuario->actualizarEmpleado($cedula, $nombre, $apellido, $fechaNacimiento, $telefono, $direccion, $correo, $rol);
        //actualizamos la lista de productos para grabar en sesion:
        $listadoemple = $modelUsuario->consultarEmpleados();
        $_SESSION['listadoemple'] = serialize($listadoemple);
        header('Location: administrador/RegistroEmpleados.php');
        break;
    case "cargar":
        //para permitirle actualizar un producto al usuario primero
        //obtenemos los datos completos de ese producto:
        $cedula = $_REQUEST['cedula'];
        $usuario = $modelUsuario->getEmpleado($cedula);
        //guardamos en sesion el producto para posteriormente visualizarlo
        //en un formulario para permitirle al usuario editar los valores:
        $_SESSION['usuario'] = $usuario;
        header('Location: administrador/ActualizarEmpleado.php');
        break;
    case "actualizarProd":
        //obtenemos los datos modificados por el usuario:
        $tipoProducto=$_REQUEST["tipoProducto"];
        $tipoMadera=$_REQUEST["tipoMadera"];
        $color=$_REQUEST["color"];
        $precioCompra=$_REQUEST["precioCompra"];
        $precioVenta=$_REQUEST["precioVenta"];
        $cantidad=$_REQUEST["cantidad"];
        //actualizamos los datos del producto:
//        $modelUsuario->actualizarProducto
        //actualizamos la lista de productos para grabar en sesion:
//        $listadoprod = $modelUsuario->consultarProductos(); completar
//        $_SESSION['listadoprod'] = serialize($listadoprod);
//        header('Location: administrador/InventarioProductos.php');
        break;
    case "cargar":
        //para permitirle actualizar un producto al usuario primero
        //obtenemos los datos completos de ese producto:
        $cedula = $_REQUEST['cedula'];
        $usuario = $modelUsuario->getEmpleado($cedula);
        //guardamos en sesion el producto para posteriormente visualizarlo
        //en un formulario para permitirle al usuario editar los valores:
        $_SESSION['usuario'] = $usuario;
        header('Location: administrador/ActualizarEmpleado.php');
        break;
    case "actualizarEmple":
        //obtenemos los datos modificados por el usuario:
        $cedula=$_REQUEST["cedula"];
        $nombre=$_REQUEST["nombre"];
        $apellido=$_REQUEST["apellido"];
        $fechaNacimiento=$_REQUEST["fechaNacimiento"];
        $telefono=$_REQUEST["telefono"];
        $direccion=$_REQUEST["direccion"];
        $correo=$_REQUEST["correo"];
        $rol=$_REQUEST["rol"];
        //actualizamos los datos del producto:
        $modelUsuario->actualizarEmpleado($cedula, $nombre, $apellido, $fechaNacimiento, $telefono, $direccion, $correo, $rol);
        //actualizamos la lista de productos para grabar en sesion:
        $listadoemple = $modelUsuario->consultarEmpleados();
        $_SESSION['listadoemple'] = serialize($listadoemple);
        header('Location: administrador/RegistroEmpleados.php');
        break;
    case "cargar":
        //para permitirle actualizar un producto al usuario primero
        //obtenemos los datos completos de ese producto:
        $cedula = $_REQUEST['cedula'];
        $usuario = $modelUsuario->getEmpleado($cedula);
        //guardamos en sesion el producto para posteriormente visualizarlo
        //en un formulario para permitirle al usuario editar los valores:
        $_SESSION['usuario'] = $usuario;
        header('Location: administrador/ActualizarEmpleado.php');
        break;
      case "crear_cliente":
        //obtenemos los parametros del formulario:
        $cedula = $_REQUEST['cedula'];
        $apellidos = $_REQUEST['apellidos'];
        $nombres = $_REQUEST['nombres'];
        $direccion = $_REQUEST['direccion'];
        //creamos el nuevo registro:
        $crudModel->insertarCliente($cedula, $apellidos, $nombres, $direccion);
        //actualizamos el listado:
        $listaClientes = $crudModel->getClientes();
        //y los guardamos en sesion:
        $_SESSION['listaClientes'] = serialize($listaClientes);
        //redireccionamos a una nueva pagina para visualizar:
        header('Location: ../vendedor/clientes.php');
        break;
     case "listar_facturas":
        //obtenemos la lista de facturas y subimos a sesion:
        $_SESSION['listaFacturas'] = serialize($facturaModel->getFacturas());
        header('Location: ../vendedor/facturas.php');
        break;
    case "nueva_factura":
        unset($_SESSION['listaFacturaDet']);
        header('Location: ../vendedor/factura.php');
        break;
    case "adicionar_detalle":
        //obtenemos los parametros del formulario:
        $idProducto = $_REQUEST['idProducto'];
        $cantidad = $_REQUEST['cantidad'];
        if (!isset($_SESSION['listaFacturaDet'])) {
            $listaFacturaDet = array();
        } else {
            $listaFacturaDet = unserialize($_SESSION['listaFacturaDet']);
        }
        try {
            $listaFacturaDet = $facturaModel->adicionarDetalle($listaFacturaDet, $idProducto, $cantidad);
            $_SESSION['listaFacturaDet'] = serialize($listaFacturaDet);
        } catch (Exception $e) {
            $mensajeError = $e->getMessage();
            $_SESSION['mensajeError'] = $mensajeError;
        }
        header('Location: ../vendedor/factura.php');
        break;
    case "eliminar_detalle":
        //obtenemos los parametros del formulario:
        $idProducto = $_REQUEST['idProducto'];
        $listaFacturaDet = unserialize($_SESSION['listaFacturaDet']);
        $listaFacturaDet = $facturaModel->eliminarDetalle($listaFacturaDet, $idProducto);
        $_SESSION['listaFacturaDet'] = serialize($listaFacturaDet);
        header('Location: ../vendedor/factura.php');
        break;
    case "guardar_factura":
        //obtenemos los parametros del formulario:
        $cedula = $_REQUEST['cedula'];
        if (isset($_SESSION['listaFacturaDet'])) {
            $listaFacturaDet = unserialize($_SESSION['listaFacturaDet']);
            try {
                $facturaCab = $facturaModel->guardarFactura($listaFacturaDet, $cedula);
                $_SESSION['facturaCab'] = $facturaCab;
                header('Location: ../vendedor/factura_reporte.php');
                break;
            } catch (Exception $e) {
                $mensajeError = $e->getMessage();
                $_SESSION['mensajeError'] = $mensajeError;
            }
        }
        //actualizamos lista de facturas:
        //$listado = $gastosModel->getFacturas();
        //$_SESSION['listado'] = serialize($listado);
        header('Location: ../vendedor/factura.php');
        break;
//
    case "salir":
        session_destroy();
        header('Location: ../login.php');
        break;
}


