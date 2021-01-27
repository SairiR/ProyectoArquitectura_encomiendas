<?php

include_once '../../modelos/Cliente.php';
include_once '../../modelos/UsuarioDTO.php';
include_once '../../modelos/Local.php';
include_once '../../modelos/Producto.php';
include_once '../../modelos/Pedido.php';
//include_once './ProductoDTO.php';
//include_once './Proveedor.php';
//include_once './ProveedorDTO.php';
include_once '../../modelos/Database.php';
include_once '../../modelos/SesionDTO.php';
//include_once '../vistas/Administrador/administrador.php';

class crudModel {

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
    
     public function crearCliente($idCliente, $nombre, $apellido, $telefono, $direccion,$fechaNac, $correo, $clave, $rol){
        $cliente=new Cliente($idCliente, $nombre, $apellido, $telefono, $direccion, $fechaNac, $correo, $clave, $rol);
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
    
      public function crearRepartidor($idRepartidor, $nombre, $apellido, $telefono, $fechaNac, $direccion, $correo, $clave, $rol){
        $repartidor=new Repartidor($idRepartidor, $nombre, $apellido, $telefono, $fechaNac, $direccion, $correo, $clave, $rol);
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
    
    public function crearLocal($idlocal, $seccion, $nombre, $direccion, $telefono, $correo, $clave, $horario, $rol){
        
        $proveedor=new Local($idlocal, $seccion, $nombre, $direccion, $telefono, $correo, $clave, $horario, $rol);

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
                                 $res['id_Cliente'],
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
                                 $res['idRepartidor'],
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
                                 $res['idLocal'],
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
     public function getLocales($correo) {
        //Obtenemos la informacion del producto especifico:
        $pdo = database::connect();

        //Utilizamos parametros para la consulta:
        $sql = "select * from local where correoLocal=?";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos y pasamos los parametros para la consulta:
        $consulta->execute(array($correo));
        //Extraemos el registro especifico:
        $dato = $consulta->fetch(PDO::FETCH_ASSOC);
        //Transformamos el registro obtenido a objeto:
        $local = new Local($dato['idLocal'],$dato['seccion'], $dato['nombreLocal'],$dato['direccionLocal'], $dato['telefonoLocal'], 
                $dato['correoLocal'], $dato['claveLocal'], $dato['horarioLocal'],"local");
        database::disconnet();
        return $local;
    }
    
    
    public function crearProducto($idProducto, $idProveedor, $nombreProd, $descripcionProd, $precioVenta, $cantidadProd){
        
        $producto=new Producto($idProducto, $idProveedor, $nombreProd, $descripcionProd, $precioVenta, $cantidadProd);
        $this->guardarProducto($producto);
        return $producto;
    }

    public function guardarProducto($producto) {
        $pdo = database::connect();
        $sql = 'insert into producto(idproveedor, nombreProd, descripcionProd, precioProd, cantidadProd) values(?,?,?,?,?)';
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array(
        $producto->getIdLocal(),
        $producto->getNombreProd(),
        $producto->getDescripcionProd(),
        $producto->getPrecioVenta(),
        $producto->getCantidad())
        );
        database::disconnet();
    }

     public function consultarProductos() {
        $pdo= database::connect();
        $sql='select * from producto';
        $resultado=$pdo->query($sql);
        //transform de fil  a obj
        $listadoprod=array();
        foreach ($resultado as $res){
            $prod=new Producto($res['idproducto'],
                                 $res['idproveedor'],
                                 $res['nombreProd'],
                                 $res['descripcionProd'],
                                 $res['precioProd'],
                                 $res['cantidadProd']);
            array_push($listadoprod, $prod);
        }
        database::disconnet();
        return $listadoprod;
    }
     public function consultarPedidos() {
        $pdo= database::connect();
        $sql='select * from pedido';
        $resultado=$pdo->query($sql);
        //transform de fil  a obj
        $listadoped=array();
        foreach ($resultado as $res){
            $ped=new Pedido($res['idpedido'],
                                 $res['correo'],
                                 $res['direccion'],
                                 $res['idproducto'],
                                 $res['idproveedor'],
                                 $res['nombreProd'],
                                 $res['descripcionProd'],
                                 $res['precioProd'],
                                 $res['cantidadProd'],
                                 $res['precioTotal'],
                                 $res['fechaPedido']);
            array_push($listadoped, $ped);
        }
        database::disconnet();
        return $listadoped;
    }
     public function consultarPedidosG() {
        $pdo= database::connect();
        $sql='SELECT pedido.idpedido, pedido.correo, pedido.direccion, local.nombreLocal, pedido.idproducto, pedido.nombreProd, pedido.descripcionProd, pedido.precioProd, pedido.cantidadProd, pedido.precioTotal, pedido.fechaPedido, pedido.estado from pedido INNER JOIN local on pedido.idproveedor=local.idLocal';
        $resultado=$pdo->query($sql);
        //transform de fil  a obj
        $listadoped=array();
        foreach ($resultado as $res){
            $ped=new Pedido($res['idpedido'],
                                 $res['correo'],
                                 $res['direccion'],
                                 $res['idproducto'],
                                 $res['nombreLocal'],
                                 $res['nombreProd'],
                                 $res['descripcionProd'],
                                 $res['precioProd'],
                                 $res['cantidadProd'],
                                 $res['precioTotal'],
                                 $res['fechaPedido'],
                                 $res['estado']);
            array_push($listadoped, $ped);
        }
        database::disconnet();
        return $listadoped;
    }
     public function consultarPedidosGR($idPedido) {
//        $idPedido="dani@gmail.com";
         $pdo= database::connect();
        $sql='SELECT pedido.idpedido, pedido.correo, pedido.direccion, local.nombreLocal, pedido.idproducto, pedido.nombreProd, pedido.descripcionProd, pedido.precioProd, pedido.cantidadProd, pedido.precioTotal, pedido.fechaPedido, pedido.estado from pedido INNER JOIN local on pedido.idproveedor=local.idLocal and pedido.idpedido=$idPedido';
        $resultado=$pdo->query($sql);
        //transform de fil  a obj
        $listadoped=array();
        foreach ($resultado as $res){
            $ped=new Pedido($res['idpedido'],
                                 $res['correo'],
                                 $res['direccion'],
                                 $res['idproducto'],
                                 $res['nombreLocal'],
                                 $res['nombreProd'],
                                 $res['descripcionProd'],
                                 $res['precioProd'],
                                 $res['cantidadProd'],
                                 $res['precioTotal'],
                                 $res['fechaPedido'],
                                 $res['estado']);
            array_push($listadoped, $ped);
        }
        database::disconnet();
        return $listadoped;
    }
     public function consultarPedidosC($correo) {
        $pdo= database::connect();
        $sql='SELECT pedido.idpedido, pedido.correo, pedido.direccion, local.nombreLocal, pedido.idproducto, pedido.nombreProd, pedido.descripcionProd, pedido.precioProd, pedido.cantidadProd, pedido.precioTotal, pedido.fechaPedido from pedido INNER JOIN local on pedido.idproveedor=local.idLocal and pedido.correo="'.$correo.'"';
        $resultado=$pdo->query($sql);
        //transform de fil  a obj
        $listadoped=array();
        foreach ($resultado as $res){
            $ped=new Pedido($res['idpedido'],
                                 $res['correo'],
                                 $res['direccion'],
                                 $res['idproducto'],
                                 $res['nombreLocal'],
                                 $res['nombreProd'],
                                 $res['descripcionProd'],
                                 $res['precioProd'],
                                 $res['cantidadProd'],
                                 $res['precioTotal'],
                                 $res['fechaPedido']);
            array_push($listadoped, $ped);
        }
        database::disconnet();
        return $listadoped;
    }
     public function consultarProductosL($idLocal) {
         $pdo= database::connect();
        $sql='select * from producto where idproveedor="'.$idLocal.'"';
        $resultado=$pdo->query($sql);
        //transform de fil  a obj
        $listadoprod=array();
        foreach ($resultado as $res){
            $prod=new Producto($res['idproducto'],
                                 $res['idproveedor'],
                                 $res['nombreProd'],
                                 $res['descripcionProd'],
                                 $res['precioProd'],
                                 $res['cantidadProd']);
            array_push($listadoprod, $prod);
        }
        database::disconnet();
        return $listadoprod;
    }
     public function consultarProductosxL($correo) {
         $pdo= database::connect();
        $sql='select producto.idproducto, producto.idproveedor, producto.nombreProd, producto.descripcionProd, producto.precioProd, producto.cantidadProd from producto INNER JOIN local on producto.idproveedor=local.idLocal and local.correoLocal="'.$correo.'"';
        $resultado=$pdo->query($sql);
        //transform de fil  a obj
        $listadoprod=array();
        foreach ($resultado as $res){
            $prod=new Producto($res['idproducto'],
                                 $res['idproveedor'],
                                 $res['nombreProd'],
                                 $res['descripcionProd'],
                                 $res['precioProd'],
                                 $res['cantidadProd']);
            array_push($listadoprod, $prod);
        }
        database::disconnet();
        return $listadoprod;
    }
     public function consultarItems() {
        $pdo= database::connect();
        $sql="select * from item";
        $resultado=$pdo->query($sql);
        //transform de fil  a obj
        $listadoitem=array();
        foreach ($resultado as $res){
            $prod=new Item($res['idproducto'],
                                 $res['idproveedor'],
                                 $res['nombreProd'],
                                 $res['descripcionProd'],
                                 $res['precioProd'],
                                 $res['cantidadProd'],
                                 $res['precioTotal']);
            array_push($listadoitem, $prod);
        }
        database::disconnet();
        return $listadoitem;
    }
     public function getProductoxCod($codigo) {
        //Obtenemos la informacion del producto especifico:
        $pdo = Database::connect();
        //Utilizamos parametros para la consulta:
        $sql = "select * from producto where idproducto=?";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos y pasamos los parametros para la consulta:
        $consulta->execute(array($codigo));
        //Extraemos el registro especifico:
        $dato = $consulta->fetch(PDO::FETCH_ASSOC);
        //Transformamos el registro obtenido a objeto:
        $producto = new Producto();
            $producto->setCodigo($dato['idproducto']);
            $producto->setIdLocal($dato['idproveedor']);
            $producto->setNombre($dato['nombreProd']);
            $producto->setDescripcionProd($dato['descripcionProd']);
            $producto->setPrecioVenta($dato['precioProd']);
            $producto->setCantidad($dato['cantidadProd']);
        Database::disconnect();
        return $producto;
    }

     public function consultarProductosxId($correo) {
        $pdo= database::connect();
        $sql='select producto.idproducto, producto.idproveedor, producto.nombreProd, producto.descripcionProd, producto.precioProd, producto.cantidadProd from local inner join producto on local.idLocal=producto.idproveedor where correoLocal=?';
        $resultado=$pdo->query($sql);
        //transform de fil  a obj
        $listadoprod=array();
        foreach ($resultado as $res){
            $prod=new Producto($res['idproducto'],
                                 $res['idproveedor'],
                                 $res['nombreProd'],
                                 $res['descripcionProd'],
                                 $res['precioProd'],
                                 $res['cantidadProd']);
            array_push($listadoprod, $prod);
        }
        database::disconnet();
        return $listadoprod;
    }
    
     public function eliminarUsuario($correo) {
//        //Preparamos la conexion a la bdd:
        $pdo = database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM usuarios WHERE correo=?";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos la sentencia incluyendo a los parametros:
        $consulta->execute(array($correo));
        database::disconnet();
    }
     public function eliminarCliente($correo) {
//        //Preparamos la conexion a la bdd:
        $pdo = database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM cliente WHERE correo_Cliente=?";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos la sentencia incluyendo a los parametros:
        $consulta->execute(array($correo));
        database::disconnet();
    }
     public function eliminarRepartidor($correo) {
//        //Preparamos la conexion a la bdd:
        $pdo = database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM repartidor WHERE correoRepartidor=?";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos la sentencia incluyendo a los parametros:
        $consulta->execute(array($correo));
        database::disconnet();
    }
     public function eliminarLocal($correo) {
//        //Preparamos la conexion a la bdd:
        $pdo = database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM local WHERE correoLocal=?";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos la sentencia incluyendo a los parametros:
        $consulta->execute(array($correo));
        database::disconnet();
    }
     public function eliminarProducto($idProducto) {
        //Preparamos la conexion a la bdd:
        $pdo = database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM producto WHERE idproducto=?";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos la sentencia incluyendo a los parametros:
        $consulta->execute(array($idProducto));
        database::disconnet();
    }
     public function eliminarPedido($idPedido) {
        //Preparamos la conexion a la bdd:
        $pdo = database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM pedido WHERE idpedido=?";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos la sentencia incluyendo a los parametros:
        $consulta->execute(array($idPedido));
        database::disconnet();
    }
    
     public function getRepartidores() {
        //obtenemos la informacion de la bdd:
       $pdo= database::connect();
        $sql='select * from repartidor';
        $resultado=$pdo->query($sql);
        //transform de fil  a obj
        $listadorep=array();
        foreach ($resultado as $res){
            $rep=new Repartidor(
                                 $res['idRepartidor'],
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
    public function getPedido($idpedido) {
        //Obtenemos la informacion del producto especifico:
        $pdo = database::connect();

        //Utilizamos parametros para la consulta:
        $sql = "select * from pedido where idpedido=?";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos y pasamos los parametros para la consulta:
        $consulta->execute(array($idpedido));
        //Extraemos el registro especifico:
        $dato = $consulta->fetch(PDO::FETCH_ASSOC);
        //Transformamos el registro obtenido a objeto:
        $pedido = new Pedido($dato['idpedido'], $dato['correo'], $dato['direccion'], $dato['idproducto'], $dato['idproveedor'], $dato['nombreProd'], $dato['descripcionProd'], 
                $dato['precioProd'], $dato['cantidadProd'], $dato['precioTotal'], $dato['fechaPedido']);
        database::disconnet();
        return $pedido;
    }
    public function getProducto($idproducto) {
        //Obtenemos la informacion del producto especifico:
        $pdo = database::connect();

        //Utilizamos parametros para la consulta:
        $sql = "select * from producto where idproducto=?";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos y pasamos los parametros para la consulta:
        $consulta->execute(array($idproducto));
        //Extraemos el registro especifico:
        $dato = $consulta->fetch(PDO::FETCH_ASSOC);
        //Transformamos el registro obtenido a objeto:
        $producto = new Producto($dato['idproducto'], $dato['idproveedor'], $dato['nombreProd'], $dato['descripcionProd'], 
                $dato['precioProd'], $dato['cantidadProd']);
        database::disconnet();
        return $producto;
    }
    public function getProductoxIdLoc($idlocal) {
        //Obtenemos la informacion del producto especifico:
        $pdo = database::connect();

        //Utilizamos parametros para la consulta:
        $sql = "select * from producto where idproveedor=?";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos y pasamos los parametros para la consulta:
        $consulta->execute(array($idlocal));
        //Extraemos el registro especifico:
        $dato = $consulta->fetch(PDO::FETCH_ASSOC);
        //Transformamos el registro obtenido a objeto:
        $producto = new Producto($dato['idproducto'], $dato['idproveedor'], $dato['nombreProd'], $dato['descripcionProd'], 
                $dato['precioProd'], $dato['cantidadProd']);
        database::disconnet();
        return $producto;
    }
    public function getLocal($correo) {
        //Obtenemos la informacion del producto especifico:
        $pdo = database::connect();

        //Utilizamos parametros para la consulta:
        $sql = "select * from local where correoLocal=?";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos y pasamos los parametros para la consulta:
        $consulta->execute(array($correo));
        //Extraemos el registro especifico:
        $dato = $consulta->fetch(PDO::FETCH_ASSOC);
        //Transformamos el registro obtenido a objeto:
        $local = new Local($dato['idLocal'], $dato['seccion'], $dato['nombreLocal'], $dato['direccionLocal'], 
                $dato['telefonoLocal'], $dato['correoLocal'], $dato['claveLocal'],$dato['horarioLocal'],"local");
        database::disconnet();
        return $local;
    }
    public function getUser($correo) {
        //Obtenemos la informacion del producto especifico:
        $pdo = database::connect();

        //Utilizamos parametros para la consulta:
        $sql = "select * from usuarios where correo=?";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos y pasamos los parametros para la consulta:
        $consulta->execute(array($correo));
        //Extraemos el registro especifico:
        $dato = $consulta->fetch(PDO::FETCH_ASSOC);
        //Transformamos el registro obtenido a objeto:
        $usuario = new UsuarioDTO($dato['correo'], $dato['clave'], $dato['rol']);
        database::disconnet();
        return $usuario;
    }
    public function getRepartidor($correo) {
        //Obtenemos la informacion del producto especifico:
        $pdo = database::connect();

        //Utilizamos parametros para la consulta:
        $sql = "select * from repartidor where correoRepartidor=?";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos y pasamos los parametros para la consulta:
        $consulta->execute(array($correo));
        //Extraemos el registro especifico:
        $dato = $consulta->fetch(PDO::FETCH_ASSOC);
        //Transformamos el registro obtenido a objeto:
        $repartidor = new Repartidor($dato['idRepartidor'], $dato['nombreRepartidor'], $dato['apellidoRepartidor'], 
                $dato['telefonoRepartidor'], $dato['fechaNacRepartidor'], $dato['direccion'], $dato['correoRepartidor'], 
                $dato['contrasenaRepartidor'], "repartidor");
        database::disconnet();
        return $repartidor;
    }
    public function getCliente($correo) {
        //Obtenemos la informacion del producto especifico:
        $pdo = database::connect();

        //Utilizamos parametros para la consulta:
        $sql = "select * from cliente where correo_Cliente=?";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos y pasamos los parametros para la consulta:
        $consulta->execute(array($correo));
        //Extraemos el registro especifico:
        $dato = $consulta->fetch(PDO::FETCH_ASSOC);
        //Transformamos el registro obtenido a objeto:
        $repartidor = new Repartidor($dato['id_Cliente'], $dato['nombre_Cliente'], $dato['apellido_Cliente'], 
                $dato['telefono_Cliente'], $dato['fechaNac_Cliente'], $dato['direccion_Cliente'], $dato['correo_Cliente'], 
                $dato['contrasena_Cliente'], "cliente");
        database::disconnet();
        return $repartidor;
    }
    
    
     public function actualizarUser($correo, $clave){
        //Preparamos la conexión a la bdd:
        $pdo=Database::connect();
        $sql="update usuarios set correo=?, clave=? where correo=?";
        $consulta=$pdo->prepare($sql);
        //Ejecutamos la sentencia incluyendo a los parametros:
        $consulta->execute(array($correo, $clave));
         Database::disconnet();
    }
     public function actualizarProducto($nombreProd, $descripcionProd, $precioVenta, $cantidadProd, $idproducto){
        //Preparamos la conexión a la bdd:
        $pdo=Database::connect();
        $sql="update producto set nombreProd=?, descripcionProd=?, precioProd=?, cantidadProd=? where idproducto=?";
        $consulta=$pdo->prepare($sql);
        //Ejecutamos la sentencia incluyendo a los parametros:
        $consulta->execute(array($nombreProd, $descripcionProd, $precioVenta, $cantidadProd, $idproducto));
         Database::disconnet();
    }
     public function actualizarLocal($seccion, $nombre, $direccion, $telefono, $correo, $clave, $horario){
        //Preparamos la conexión a la bdd:
        $pdo=Database::connect();
        $sql="UPDATE
local
INNER JOIN
usuarios
ON
usuarios.correo = local.correoLocal
SET
local.seccion=?, local.nombreLocal=?, local.direccionLocal=?, local.telefonoLocal=?, local.correoLocal=?, local.claveLocal=?, local.horarioLocal=?, usuarios.correo=?, usuarios.clave=? WHERE
local.correoLocal=?";
        $consulta=$pdo->prepare($sql);
        //Ejecutamos la sentencia incluyendo a los parametros:
        $consulta->execute(array($seccion, $nombre, $direccion, $telefono, $correo, $clave, $horario, $correo, $clave, $correo));
         Database::disconnet();
    }
    
     public function actualizarRepartidor($nombre, $apellido, $telefono, $fechaNac, $direccion, $correo, $clave){
        //Preparamos la conexión a la bdd:
        $pdo=Database::connect();
        $sql=" UPDATE
repartidor
INNER JOIN
usuarios
ON
usuarios.correo = repartidor.correoRepartidor
SET
repartidor.nombreRepartidor=?, repartidor.apellidoRepartidor=?, repartidor.telefonoRepartidor=?, repartidor.fechaNacRepartidor=?, repartidor.direccion=?, repartidor.correoRepartidor=?, repartidor.contrasenaRepartidor=?, usuarios.correo=?, usuarios.clave=? WHERE
repartidor.correoRepartidor=?";
        $consulta=$pdo->prepare($sql);
        //Ejecutamos la sentencia incluyendo a los parametros:
        $consulta->execute(array($nombre, $apellido, $telefono, $fechaNac, $direccion, $correo, $clave, $correo, $clave. $correo));
         Database::disconnet();
    }
     public function actualizarCliente($nombre, $apellido, $telefono, $direccion,$fechaNac, $correo, $clave){
        //Preparamos la conexión a la bdd:
        $pdo=Database::connect();
        $sql=" UPDATE
cliente
INNER JOIN
usuarios
ON
usuarios.correo = cliente.correo_Cliente
SET
cliente.nombre_Cliente=?, cliente.apellido_Cliente=?, cliente.telefono_Cliente=?, cliente.fechaNac_Cliente=?, cliente.direccion_Cliente=?, cliente.correo_Cliente=?, cliente.contrasena_Cliente=?, usuarios.correo=?, usuarios.clave=? WHERE
cliente.correo_Cliente=?";
        $consulta=$pdo->prepare($sql);
        //Ejecutamos la sentencia incluyendo a los parametros:
        $consulta->execute(array($nombre, $apellido, $telefono, $direccion,$fechaNac, $correo, $clave, $correo, $clave, $correo));
         Database::disconnet();
    }
    
     public function crearPedido($idPedido, $correo, $direccion, $idProducto, $idProveedor, $nombreProd, $descripcionProd, $precioVenta, $cantidadProd, $precioTotal, $fechaPedido){
        
        $producto=new Pedido($idPedido, $correo, $direccion, $idProducto, $idProveedor, $nombreProd, $descripcionProd, $precioVenta, $cantidadProd, $precioTotal, $fechaPedido);
        $this->guardarPedido($producto);
        return $producto;
    }

    public function guardarPedido($producto) {
        $pdo = database::connect();
        $sql = 'insert into pedido(correo, direccion, idproducto, idproveedor, nombreProd, descripcionProd, precioProd, cantidadProd, precioTotal, fechaPedido) values(?,?,?,?,?,?,?,?,?,?)';
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array(
        $producto->getCorreo(),
        $producto->getDireccion(),
        $producto->getIdProducto(),
        $producto->getIdLocal(),
        $producto->getNombreProd(),
        $producto->getDescripcionProd(),
        $producto->getPrecioVenta(),
        $producto->getCantidad(),
        $producto->getPrecioTotal(),
        $producto->getFechaPedido())
        );
        database::disconnet();
    }
    public function agregarCarrito($carrito, $codigoProducto) {
        $producto = $this->getProducto($codigoProducto);
        if (!isset($carrito)) {
            $carrito = array(); //inicializamos el array
        }
        $item = new Item();
        $item->setCodigo($producto->getCodigo());
        $item->setNombre($producto->getNombre());
        $item->setDescripcion($producto->getDescricion());
        $item->setPrecio($producto->getPrecio());
        $item->setCantidad($producto->getCantidad());
        if ($item->getPrecio() >= 100) {
            $item->setTieneDescuento(true);
        } else {
            $item->setTieneDescuento(false);
        }
        array_push($carrito, $item);
        return $carrito;
    }

    public function eliminarProductoCarrito($carrito, $codigoProducto){
        $producto = $this->getProducto($codigoProducto);
        if (!isset($carrito)) {
            $carrito = array(); //inicializamos el array
        }
        $item = new Item();
      $item->setCodigo($producto->getIdProducto());
      $item->setNombre($producto->getNombreProd());
      $item->setDescripcion($producto->getDescripcionProd());
      $item->setPrecio($producto->getPrecioVenta());
      $item->setCantidad($producto->getCantidad());
      if ($item->getPrecio() >= 100) {
          $item->setTieneDescuento(true);
      } else {
          $item->setTieneDescuento(false);
      }
      $key= array_search($item, $carrito);
      if($key!==false){
        //  unset($item[$producto->getNombre()]); 
          unset($carrito[$key]);
      }
      array_values($carrito);
      return $carrito;  
        }
        
        
    public function valorCarrito($carrito) {
        if (!isset($carrito)) {
            return 0;
        }
        $valor = 0;
        foreach ($carrito as $item) {
            if ($item->getTieneDescuento() == true) {
                $valor += $item->getPrecio() - $item->getPrecio() * 0.1;
            } else {
                $valor += $item->getPrecio();
            }
        }
        return $valor;
    }
    
     public function consultarPedidos_RepG($idPedido) {
        $pdo= database::connect();
        $sql='SELECT pedido.idpedido, pedido.correo, pedido.direccion, local.nombreLocal, pedido.idproducto, pedido.nombreProd, pedido.descripcionProd, pedido.precioProd, pedido.cantidadProd, pedido.precioTotal, pedido.fechaPedido, pedido.estado from pedido INNER JOIN local on pedido.idproveedor=local.idLocal and pedido.idPedido=?';
        $consulta = $pdo->prepare($sql);
        //Ejecutamos y pasamos los parametros para la consulta:
        $consulta->execute(array($idPedido));
        //Extraemos el registro especifico:
        $res = $consulta->fetch(PDO::FETCH_ASSOC);
        //Transformamos el registro obtenido a objeto:
        $pedido = new Pedido($res['idpedido'],
                                 $res['correo'],
                                 $res['direccion'],
                                 $res['idproducto'],
                                 $res['nombreLocal'],
                                 $res['nombreProd'],
                                 $res['descripcionProd'],
                                 $res['precioProd'],
                                 $res['cantidadProd'],
                                 $res['precioTotal'],
                                 $res['fechaPedido'],
                                 $res['estado']);
     
        database::disconnet();
        return $pedido;
}
//    UPDATE
//repartidor
//INNER JOIN
//usuarios
//ON
//usuarios.correo = repartidor.correoRepartidor
//SET
//repartidor.nombreRepartidor= 'Pepito', repartidor.apellidoRepartidor='Richard', repartidor.telefonoRepartidor='0973452348', repartidor.fechaNacRepartidor='1998-02-04', repartidor.direccion='otv', repartidor.correoRepartidor='pepito@gmail.com', repartidor.contrasenaRepartidor='pep123', usuarios.correo='pepito@gmail.com', usuarios.clave='pep123' WHERE
//repartidor.correoRepartidor = 'manu20@gmail.com'
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
