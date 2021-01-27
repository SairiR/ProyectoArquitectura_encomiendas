/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function mensajeCrearAdmi() {
    if (alert('Acepta Crear Nuevo Administrador')) {
        document.formadmi.submit();
    }
}

function mensajeIngPed() {
    if (alert('Pedido realizado con exito!')) {
        document.forming.submit();
    }
}
function mensajeModArt() {
    if (alert('Desea Modificar el Producto')) {
        document.formmod.submit();
    }
}
function mensajeEliArt() {
    if (alert('Desea Eliminar el Producto!')) {
        document.formeli.submit();
    }
function mensajeCrearCli() {
    if (alert('Nuevo Cliente Registrado ¡Exitosamente!')) {
        document.formcreatecli.submit();
    }
}
}