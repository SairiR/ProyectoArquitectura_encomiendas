<?php

include_once '../modelos/Cliente.php';
include_once '../modelos/UsuarioDTO.php';
include_once '../modelos/Local.php';
//include_once './Producto.php';
//include_once './ProductoDTO.php';
//include_once './Proveedor.php';
//include_once './ProveedorDTO.php';
include_once '../modelos/Database.php';
include_once '../modelos/SesionDTO.php';
//include_once '../vistas/Administrador/administrador.php';

class ModelUsuario {

    public function consultarUsuario($correo) {
        $pdo = Database::connect();
        $sql = "select * from usuarios where correo=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($correo));
        $dato = $consulta->fetch();
        if (empty($dato)) {
            return null;
        }
        $usuario = new UsuarioDTO($dato['correo'], $dato['clave'], $dato['rol']);
//        print_r(($usuario->getClave()));
        database::disconnet();
        return $usuario;
    }

    public function login($correo, $clave) {
        $sesionDTO = new SesionDTO($correo, "", "");
        $usuario = $this->consultarUsuario($correo);
        if (is_null($usuario)) {
            $sesionDTO->setRuta("../../error.php");
            return $sesionDTO;
        }
        //verificar la clave que esta encripatada con algoritmo MD5:

        if ($usuario->getClave() == ($clave)) {
            //si el usuario esta inactivo, devuelve error:
//            if ($usuario->getActivo() == false) {
//                $sesionDTO->setRuta("error.php");
//                return $sesionDTO;
//            }
            //verificacion del rol:
            if ($usuario->getRol() == "administrador") {
                $sesionDTO->setRuta("../vistas/Administrador/administrador.php");
                $sesionDTO->setRol("administrador");
                return $sesionDTO;
            }
            if ($usuario->getRol() == "cliente") {
                $sesionDTO->setRuta("../vistas/Cliente/cliente.php");
                $sesionDTO->setRol("cliente");
                return $sesionDTO;
            }
            if ($usuario->getRol() == "local") {
                $sesionDTO->setRuta("../vistas/Local/local.php");
                $sesionDTO->setRol("local");
                return $sesionDTO;
            }
            if ($usuario->getRol() == "repartidor") {
                $sesionDTO->setRuta("../vistas/Repartidor/repartidor.php");
                $sesionDTO->setRol("repartidor");
                return $sesionDTO;
            }
        }

        //cualquier otro caso determina error:
        $sesionDTO->setRuta("error.php");
        return $sesionDTO;
    }
    
   
    public function crearUsuario($correo, $rol, $clave){
   
        $usuario=new UsuarioDTO($correo, $clave, $rol);
        $this->guardarUsuario($usuario);
        
        return $usuario;
    }

     public function guardarUsuario($usuario) {
        $pdo = database::connect();
        $sql = 'insert into usuarios values (?,?,?)';
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array(
        $usuario->getCorreo(),
        $usuario->getClave(),
        $usuario->getRol())
        );
        database::disconnet();
    }
    
     public function crearCliente($nombre, $apellido, $telefono, $direccion,$fechaNac, $correo, $clave, $rol){
        $cliente=new Cliente($nombre, $apellido, $telefono, $direccion, $fechaNac, $correo, $clave, $rol);
        $this->guardarCliente($cliente);
        return $cliente;
    }

    public function guardarCliente($cliente) {
        $pdo = database::connect();
        $sql = 'INSERT INTO cliente(nombre_Cliente, apellido_Cliente, telefono_Cliente, direccion_Cliente, fechaNac_Cliente, correo_Cliente, contrasena_Cliente) values (?,?,?,?,?,?,?)';
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array(
        $cliente->getNombre(),
        $cliente->getApellido(),
        $cliente->getTelefono(),
        $cliente->getDireccion(),    
        $cliente->getFechaNac(),
        $cliente->getCorreo(),
        $cliente->getClave())
        );
        database::disconnet();
    }
    
      public function crearRepartidor($nombre, $apellido, $telefono, $fechaNac, $direccion, $correo, $clave, $rol){
        $repartidor=new Repartidor($nombre, $apellido, $telefono, $fechaNac, $direccion, $correo, $clave, $rol);
        $this->guardarRepartidor($repartidor);
        
        return $repartidor;
    }

    public function guardarRepartidor($repartidor) {
        $pdo = database::connect();
        $sql = 'INSERT INTO `repartidor`(`nombreRepartidor`, `apellidoRepartidor`, `telefonoRepartidor`, `fechaNacRepartidor`, `direccion`, `correoRepartidor`, `contrasenaRepartidor`) values (?,?,?,?,?,?,?)';
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array(
        $repartidor->getNombre(),
        $repartidor->getApellido(),
        $repartidor->getTelefono(), 
        $repartidor->getFechaNac(),
        $repartidor->getDireccion(),
        $repartidor->getCorreo(),
        $repartidor->getClave())
        );
        database::disconnet();
    }
    
    public function crearLocal($seccion, $nombre, $direccion, $telefono, $correo, $clave, $horario, $rol){
        
        $proveedor=new Local($seccion, $nombre, $direccion, $telefono, $correo, $clave, $horario, $rol);

        $this->guardarLocal($proveedor);

        return $proveedor;
    }

    public function guardarLocal($proveedor) {
        $pdo = database::connect();
        $sql = 'insert into local(seccion, nombreLocal, direccionLocal, telefonoLocal, correoLocal, claveLocal, horarioLocal) values (?,?,?,?,?,?,?)';
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array(
        $proveedor->getSeccion(),
        $proveedor->getNombre(),
        $proveedor->getDireccion(),
        $proveedor->getTelefono(),
        $proveedor->getCorreo(),
        $proveedor->getClave(),
        $proveedor->getHorario())
        );
        database::disconnet();
    }
    
     public function consultarAdministradores() {
        $pdo= database::connect();
        $sql='select * from usuarios where rol="administrador"';
        $resultado=$pdo->query($sql);
        //transform de fil  a obj
        $listadoadmi=array();
        foreach ($resultado as $res){
            $admi=new UsuarioDTO(
                                 $res['correo'],
                                 $res['clave'],
                                 $res['rol']);
            array_push($listadoadmi, $admi);
        }
        database::disconnet();
        return $listadoadmi;
     }
     public function consultarClientes() {
        $pdo= database::connect();
        $sql='select * from cliente';
        $resultado=$pdo->query($sql);
        //transform de fil  a obj
        $listadocli=array();
        foreach ($resultado as $res){
            $cli=new Cliente(
                                 $res['nombre_Cliente'],
                                 $res['apellido_Cliente'],
                                 $res['telefono_Cliente'],
                                 $res['direccion_Cliente'],
                                 $res['fechaNac_Cliente'],
                                 $res['correo_Cliente'],
                                 $res['contrasena_Cliente'],
                                 "cliente");
            array_push($listadocli, $cli);
        }
        database::disconnet();
        return $listadocli;
     }
     public function consultarRepartidores() {
        $pdo= database::connect();
        $sql='select * from repartidor';
        $resultado=$pdo->query($sql);
        //transform de fil  a obj
        $listadorep=array();
        foreach ($resultado as $res){
            $rep=new Repartidor(
                                 $res['nombreRepartidor'],
                                 $res['apellidoRepartidor'],
                                 $res['telefonoRepartidor'],
                                 $res['fechaNacRepartidor'],
                                 $res['direccion'],
                                 $res['correoRepartidor'],
                                 $res['contrasenaRepartidor'],
                                 "repartidor");
            array_push($listadorep, $rep);
        }
        database::disconnet();
        return $listadorep;
     }
     public function consultarLocales() {
        $pdo= database::connect();
        $sql='select * from local';
        $resultado=$pdo->query($sql);
        //transform de fil  a obj
        $listadoloc=array();
        foreach ($resultado as $res){
            $loc=new Local(
                                 $res['seccion'],
                                 $res['nombreLocal'],
                                 $res['direccionLocal'],
                                 $res['telefonoLocal'],
                                 $res['correoLocal'],
                                 $res['contrasenaLocal'],
                                 $res['horarioLocal'],
                                 "local");
            array_push($listadoloc, $loc);
        }
        database::disconnet();
        return $listadoloc;
     }
    
//    public function crearProducto($idProveedor, $tipoProducto, $tipoMadera, $color, $precioCompra, $precioVenta, $cantidad){
//        
//        $producto=new ProductoDTO($idProveedor, $tipoProducto, $tipoMadera, $color, $precioCompra, $precioVenta, $cantidad);
//        $this->guardarProducto($producto);
//        return $producto;
//    }
//
//    public function guardarProducto($producto) {
//        $pdo = database::connect();
//        $sql = 'insert into productos(idProveedor,tipoProducto, tipoMadera, color, precioCompra, precioVenta,cantidad) values(?,?,?,?,?,?,?)';
//        $consulta = $pdo->prepare($sql);
//        $consulta->execute(array(
//        $producto->getIdProveedor(),
//        $producto->getTipoProducto(),
//        $producto->getTipoMadera(),
//        $producto->getColor(),
//        $producto->getPrecioCompra(),
//        $producto->getPrecioVenta(),
//        $producto->getCantidad())
//        );
//        database::disconnet();
//    }

//     public function consultarProductos() {
//        $pdo= database::connect();
//        $sql='select * from productos';
//        $resultado=$pdo->query($sql);
//        //transform de fil  a obj
//        $listadoprod=array();
//        foreach ($resultado as $res){
//            $prod=new Producto($res['idProducto'],
//                                 $res['idProveedor'],
//                                 $res['tipoProducto'],
//                                 $res['tipoMadera'],
//                                 $res['color'],
//                                 $res['precioCompra'],
//                                 $res['precioVenta'],
//                                 $res['cantidad']);
//            array_push($listadoprod, $prod);
//        }
//        database::disconnet();
//        return $listadoprod;
//    }
//     public function consultarProveedores() {
//        $pdo= database::connect();
//        $sql='select * from proveedor';
//        $resultado=$pdo->query($sql);
//        //transform de fil  a obj
//        $listadoprov=array();
//        foreach ($resultado as $res){
//            $prov=new Proveedor($res['idProveedor'],
//                                 $res['ruc'],
//                                 $res['nombre'],
//                                 $res['apellido'],
//                                 $res['fechaNacimiento'],
//                                 $res['telefono'],
//                                 $res['direccion']);
//            array_push($listadoprov, $prov);
//        }
//        database::disconnet();
//        return $listadoprov;
//    }
//     public function consultarEmpleados() {
//        $pdo= database::connect();
//        $sql='select * from usuario';
//        $resultado=$pdo->query($sql);
//        //transform de fil  a obj
//        $listadoemple=array();
//        foreach ($resultado as $res){
//            $emple=new Usuario($res['cedula'],
//                                 $res['nombre'],
//                                 $res['apellido'],
//                                 $res['fechaNacimiento'],
//                                 $res['telefono'],
//                                 $res['direccion'],
//                                 $res['correo'],
//                                 $res['rol']);
//            array_push($listadoemple, $emple);
//        }
//        database::disconnet();
//        return $listadoemple;
//    }
//    public function getEmpleados($orden) {
//        //obtenemos la informacion de la bdd:
//        $pdo = Database::connect();
//        //verificamos el ordenamiento asc o desc:
//        if ($orden == true){//asc
//            $sql = "select * from usuario order by nombre";
//        }else {//desc
//            $sql = "select * from usuario order by nombre desc";
//        }
//        $resultado = $pdo->query($sql);
//        //transformamos los registros en objetos de tipo Producto:
//        $listadoemple = array();
//        foreach ($resultado as $res) {
//            $empleado = new Usuario();
//            $empleado->setCedula($res['cedula']);
//            $empleado->setNombre($res['nombre']);
//            $empleado->setApellido($res['apellido']);
//            $empleado->setFechaNacimiento($res['fechaNacimiento']);
//            $empleado->setTelefono($res['telefono']);
//            $empleado->setDireccion($res['direccion']);
//            $empleado->setCorreo($res['correo']);
//            $empleado->setRol($res['rol']);
//            array_push($listadoemple, $empleado);
//        }
//        database::disconnet();
//        //retornamos el listado resultante:
//        return $listadoemple;
//    }
//    public function eliminarEmpleado($cedula) {
//        //Preparamos la conexion a la bdd:
//        $pdo = database::connect();
//        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//        $sql = "DELETE FROM usuario WHERE cedula=?";
//        $consulta = $pdo->prepare($sql);
//        //Ejecutamos la sentencia incluyendo a los parametros:
//        $consulta->execute(array($cedula));
//        database::disconnet();
//    }
//    public function eliminarProducto($idProducto) {
//        //Preparamos la conexion a la bdd:
//        $pdo = database::connect();
//        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//        $sql = "DELETE FROM productos WHERE idProducto=?";
//        $consulta = $pdo->prepare($sql);
//        //Ejecutamos la sentencia incluyendo a los parametros:
//        $consulta->execute(array($idProducto));
//        database::disconnet();
//    }
//    public function eliminarProveedor($idProveedor) {
//        //Preparamos la conexion a la bdd:
//        $pdo = database::connect();
//        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//        $sql = "DELETE FROM proveedor WHERE idProveedor=?";
//        $consulta = $pdo->prepare($sql);
//        //Ejecutamos la sentencia incluyendo a los parametros:
//        $consulta->execute(array($idProveedor));
//        database::disconnet();
//    }
//    
//     public function actualizarEmpleado($cedula,$nombre, $apellido, $fechaNacimiento, $telefono, $direccion, $correo, $rol) {
//        //Preparamos la conexión a la bdd:
//        $pdo = database::connect();
//        $sql = "update usuario set cedula=?,nombre=?,apellido=?,fechaNacimiento=?,telefono=?,direccion=?,correo=?,rol=? where cedula=?";
//        $consulta = $pdo->prepare($sql);
//        //Ejecutamos la sentencia incluyendo a los parametros:
//        $consulta->execute(array($cedula,$nombre, $apellido, $fechaNacimiento, $telefono, $direccion, $correo, $rol));
//        database::disconnet();
//    }
//    
//    public function getEmpleado($cedula) {
//        //Obtenemos la informacion del producto especifico:
//        $pdo = database::connect();
//
//        //Utilizamos parametros para la consulta:
//        $sql = "select * from usuario where cedula=?";
//        $consulta = $pdo->prepare($sql);
//        //Ejecutamos y pasamos los parametros para la consulta:
//        $consulta->execute(array($cedula));
//        //Extraemos el registro especifico:
//        $dato = $consulta->fetch(PDO::FETCH_ASSOC);
//        //Transformamos el registro obtenido a objeto:
//        $usuario = new Usuario($dato['cedula'],$dato['nombre'], $dato['apellido'],$dato['fechaNacimiento'], $dato['telefono'], 
//                $dato['direcion'], $dato['correo'], $dato['rol']);
//        database::disconnet();
//        return $usuario;
//    }
   
//
}
