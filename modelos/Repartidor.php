<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Repartidor
 *
 * @author Sairi
 */

class Repartidor {
   
    private $idRepartidor;
    private $nombre;
    private $apellido;
    private $telefono;
    private $fechaNac;
    private $direccion;
    private $correo;
    private $clave;
    private $rol;
    
    
    function __construct($idRepartidor, $nombre, $apellido, $telefono, $fechaNac, $direccion, $correo, $clave, $rol) {
        $this->idRepartidor = $idRepartidor;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->telefono = $telefono;
        $this->fechaNac = $fechaNac;
        $this->direccion = $direccion;
        $this->correo = $correo;
        $this->clave = $clave;
        $this->rol = $rol;
    }

    function getIdRepartidor() {
        return $this->idRepartidor;
    }

    function setIdRepartidor($idRepartidor) {
        $this->idRepartidor = $idRepartidor;
    }

        function getNombre() {
        return $this->nombre;
    }

    function getApellido() {
        return $this->apellido;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getFechaNac() {
        return $this->fechaNac;
    }

    function getCorreo() {
        return $this->correo;
    }

    function getClave() {
        return $this->clave;
    }

    function getRol() {
        return $this->rol;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function setFechaNac($fechaNac) {
        $this->fechaNac = $fechaNac;
    }

    function setCorreo($correo) {
        $this->correo = $correo;
    }

    function setClave($clave) {
        $this->clave = $clave;
    }

    function setRol($rol) {
        $this->rol = $rol;
    }
    
    function getDireccion() {
        return $this->direccion;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }




}
