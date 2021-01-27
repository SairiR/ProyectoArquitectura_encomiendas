<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Producto
 *
 * @author Sairi
 */
class Producto {
    private $idProducto;
    private $idLocal;
    private $nombreProd;
    private $descripcionProd;
    private $precioVenta;
    private $cantidad;
    
    function __construct($idProducto, $idLocal, $nombreProd, $descripcionProd, $precioVenta, $cantidad) {
        $this->idProducto = $idProducto;
        $this->idLocal = $idLocal;
        $this->nombreProd = $nombreProd;
        $this->descripcionProd = $descripcionProd;
        $this->precioVenta = $precioVenta;
        $this->cantidad = $cantidad;
    }
    function getIdLocal() {
        return $this->idLocal;
    }

    function setIdLocal($idLocal) {
        $this->idLocal = $idLocal;
    }

        
    function getIdProducto() {
        return $this->idProducto;
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

    function setIdProducto($idProducto) {
        $this->idProducto = $idProducto;
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



}
