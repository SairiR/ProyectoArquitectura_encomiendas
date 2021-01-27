<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pedido
 *
 * @author Sairi
 */
class Pedido {
    
    private $idPedido;
    private $correo;
    private $direccion;
    private $idProducto;
    private $idLocal;
    private $nombreProd;
    private $descripcionProd;
    private $precioVenta;
    private $cantidad;
    private $precioTotal;
    private $fechaPedido;
    private $estado;
    
    function __construct($idPedido, $correo, $direccion, $idProducto, $idLocal, $nombreProd, $descripcionProd, $precioVenta, $cantidad, $precioTotal, $fechaPedido, $estado) {
        $this->idPedido = $idPedido;
        $this->correo = $correo;
        $this->direccion = $direccion;
        $this->idProducto = $idProducto;
        $this->idLocal = $idLocal;
        $this->nombreProd = $nombreProd;
        $this->descripcionProd = $descripcionProd;
        $this->precioVenta = $precioVenta;
        $this->cantidad = $cantidad;
        $this->precioTotal = $precioTotal;
        $this->fechaPedido = $fechaPedido;
        $this->estado = $estado;
    }

    function getPrecioTotal() {
        return $this->precioTotal;
    }
    
    function getFechaPedido() {
        return $this->fechaPedido;
    }

    function setFechaPedido($fechaPedido) {
        $this->fechaPedido = $fechaPedido;
    }

    
    function setPrecioTotal($precioTotal) {
        $this->precioTotal = $precioTotal;
    }

        function getIdPedido() {
        return $this->idPedido;
    }

    function getCorreo() {
        return $this->correo;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getIdProducto() {
        return $this->idProducto;
    }

    function getIdLocal() {
        return $this->idLocal;
    }

    function getNombreProd() {
        return $this->nombreProd;
    }

    function getDescripcionProd() {
        return $this->descripcionProd;
    }

    function getPrecioVenta() {
        return $this->precioVenta;
    }

    function getCantidad() {
        return $this->cantidad;
    }

    function setIdPedido($idPedido) {
        $this->idPedido = $idPedido;
    }

    function setCorreo($correo) {
        $this->correo = $correo;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setIdProducto($idProducto) {
        $this->idProducto = $idProducto;
    }

    function setIdLocal($idLocal) {
        $this->idLocal = $idLocal;
    }

    function setNombreProd($nombreProd) {
        $this->nombreProd = $nombreProd;
    }

    function setDescripcionProd($descripcionProd) {
        $this->descripcionProd = $descripcionProd;
    }

    function setPrecioVenta($precioVenta) {
        $this->precioVenta = $precioVenta;
    }

    function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }
    
    function getEstado() {
        return $this->estado;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }





    
}
