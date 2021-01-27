<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pago
 *
 * @author Sayuri
 */
class Pago {
    private $idpago;
    private $correo;
    private $tipoPago;
    private $monto;
    
    function __construct($idpago, $correo, $tipoPago, $monto) {
        $this->idpago = $idpago;
        $this->correo = $correo;
        $this->tipoPago = $tipoPago;
        $this->monto = $monto;
    }
    
    function getIdpago() {
        return $this->idpago;
    }

    function getCorreo() {
        return $this->correo;
    }

    function getTipoPago() {
        return $this->tipoPago;
    }

    function getMonto() {
        return $this->monto;
    }

    function setIdpago($idpago) {
        $this->idpago = $idpago;
    }

    function setCorreo($correo) {
        $this->correo = $correo;
    }

    function setTipoPago($tipoPago) {
        $this->tipoPago = $tipoPago;
    }

    function setMonto($monto) {
        $this->monto = $monto;
    }

}
