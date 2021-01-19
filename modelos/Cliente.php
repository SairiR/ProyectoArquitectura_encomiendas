<?php

class Cliente{

    private $nombre;
    private $apellido;
    private $telefono;
    private $direccion;
    private $fechaNac;
    private $correo;
    private $clave;
    private $rol;
    

    function __construct($nombre, $apellido, $telefono, $direccion,$fechaNac, $correo, $clave, $rol) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->telefono = $telefono;
        $this->direccion = $direccion;
        $this->fechaNac = $fechaNac;
        $this->correo = $correo;
        $this->clave = $clave;
        $this->rol = $rol;
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
