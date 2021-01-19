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
class Usuario {
    private $correo;
    private $rol;
    private $clave;
    
    function __construct($correo, $rol, $clave) {
        $this->correo = $correo;
        $this->rol = $rol;
        $this->clave = $clave;
    }
    
    function getCorreo() {
        return $this->correo;
    }

    function getRol() {
        return $this->rol;
    }

    function getClave() {
        return $this->clave;
    }

    function setCorreo($correo) {
        $this->correo = $correo;
    }

    function setRol($rol) {
        $this->rol = $rol;
    }

    function setClave($clave) {
        $this->clave = $clave;
    }




}
