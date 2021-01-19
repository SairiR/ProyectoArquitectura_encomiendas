<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Tienda
 *
 * @author Sairi
 */

class Local {

    private $seccion;
    private $nombre;
    private $direccion;
    private $telefono;
    private $correo;
    private $clave;
    private $horario;
    private $rol;
    
    function __construct($seccion, $nombre, $direccion, $telefono, $correo, $clave, $horario, $rol) {
        $this->seccion = $seccion;
        $this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
        $this->correo = $correo;
        $this->clave = $clave;
        $this->horario = $horario;
        $this->rol = $rol;

    }
    
    function getSeccion() {
        return $this->seccion;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getCorreo() {
        return $this->correo;
    }

    function getClave() {
        return $this->clave;
    }

    function getHorario() {
        return $this->horario;
    }

    function getRol() {
        return $this->rol;
    }

    function setSeccion($seccion) {
        $this->seccion = $seccion;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function setCorreo($correo) {
        $this->correo = $correo;
    }

    function setClave($clave) {
        $this->clave = $clave;
    }

    function setHorario($horario) {
        $this->horario = $horario;
    }

    function setRol($rol) {
        $this->rol = $rol;
    }



}
