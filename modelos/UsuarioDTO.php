<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author Sairi
 */
class UsuarioDTO {

    

    private $correo;
    private $clave;
    private $rol;

    function __construct($correo, $clave, $rol) {
        $this->correo = $correo;
        $this->clave = $clave;
        $this->rol = $rol;
    }

    function getNombre() {
        return $this->nombre;
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

    function setCorreo($correo) {
        $this->correo = $correo;
    }

    function setClave($clave) {
        $this->clave = $clave;
    }

    function setRol($rol) {
        $this->rol = $rol;
    }



}
