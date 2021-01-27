<?php

class Item {

    private $correo;
    private $idProducto;
    private $idLocal;
    private $nombre;
    private $descripcion;
    private $precio;
    private $cantidad;
    private $precioTotal;
    
    
    function __construct($correo, $idProducto, $idLocal, $nombre, $descripcion, $precio, $cantidad, $precioTotal) {
        $this->correo = $correo;
        $this->idProducto = $idProducto;
        $this->idLocal = $idProveedor;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
        $this->cantidad = $cantidad;
        $this->precioTotal = $precioTotal;
    }
    function getIdProducto() {
        return $this->idProducto;
    }
    function getCorreo() {
        return $this->correo;
    }

    function setCorreo($correo) {
        $this->correo = $correo;
    }

        function getIdLocal() {
        return $this->idProveedor;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getPrecio() {
        return $this->precio;
    }

    function getCantidad() {
        return $this->cantidad;
    }

    function getPrecioTotal() {
        return $this->precioTotal;
    }

    function setIdProducto($idProducto) {
        $this->idProducto = $idProducto;
    }

    function setIdLocal($idProveedor) {
        $this->idProveedor = $idProveedor;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setPrecio($precio) {
        $this->precio = $precio;
    }

    function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    function setPrecioTotal($precioTotal) {
        $this->precioTotal = $precioTotal;
    }




}
