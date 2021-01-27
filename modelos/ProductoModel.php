<?php

include_once '../modelos/Database.php';
include_once '../modelos/Producto.php';
include_once '../modelos/Item.php';

class ProductoModel {

    public function getProductos() {
        //obtenemos la informacion de la bdd:
        $pdo= database::connect();
        //verificamos el ordenamiento asc o desc:
        $sql = "select * from producto order by nombreProd";
        $resultado = $pdo->query($sql);
        //transformamos los registros en objetos de tipo Producto:
        $listado = array();
        foreach ($resultado as $res) {
              $producto=new Producto($res['idproducto'],
                                 $res['idproveedor'],
                                 $res['nombreProd'],
                                 $res['descripcionProd'],
                                 $res['precioProd'],
                                 $res['cantidadProd']);
//            $producto = new Producto();
//            $producto->setIdProducto($res['idproducto']);
//            $producto->setIdLocal($res['idproveedor']);
//            $producto->setNombreProd($res['nombreProd']);
//            $producto->setDescripcionProd($res['descripcionProd']);
//            $producto->setPrecioVenta($res['precioProd']);
//            $producto->setCantidad($res['cantidadProd']);
            array_push($listado, $producto);
        }
        database::disconnet();
        //retornamos el listado resultante:
        return $listado;
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

    public function getProducto($codigo) {
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
            $producto->setIdProducto($dato['idproducto']);
            $producto->setIdLocal($dato['idproveedor']);
            $producto->setNombreProd($dato['nombreProd']);
            $producto->setDescripcionProd($dato['descripcionProd']);
            $producto->setPrecioVenta($dato['precioProd']);
            $producto->setCantidad($dato['cantidadProd']);
        Database::disconnect();
        return $producto;
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

    public function eliminarProducto($carrito, $codigoProducto){
        $producto = $this->getProducto($codigoProducto);
        if (!isset($carrito)) {
            $carrito = array(); //inicializamos el array
        }
        $item = new Item();
      $item->setCodigo($producto->getCodigo());
      $item->setNombre($producto->getNombre());
      $item->setDescripcion($producto->getDescripcion());
      $item->setPrecio($producto->getPrecio());
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

}
