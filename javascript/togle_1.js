/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


//crear admi
function ocultarinadmi(){
    $('.ingresar-rep').hide();
    $('.ingresar-prov').hide();
    $('.modificar-prod').hide();
    $('.eliminar-prod').hide();
    
}
function mostrarinadmi(){
    $('.crear-admi').show();
    
}
function ocultarinprov(){
    $('.crear-admi').hide();
    $('.ingresar-rep').hide();
    $('.modificar-prod').hide();
    $('.eliminar-prod').hide();
    
}
function mostrarinprov(){
    $('.ingresar-prov').show();
    
}

//ingresar producto
function ocultarinprod(){

    $('.modificar-prod').hide();
    $('.eliminar-prod').hide();
     $('.crear-admi').hide();
     $('.ingresar-prov').hide();
    
}
function mostrarinprod(){
   
        $('.ingresar-rep').show();
}

//modificar producto
function ocultarmodpro(){

    
    $('.eliminar-prod').hide();
     $('.crear-admi').hide();
      $('.ingresar-rep').hide();
      $('.ingresar-prov').hide();
    
}
function mostrarmodpro(){
   $('.modificar-prod').show();
       
}

//eliminar productos
function ocultarformeliminar(){
    $('.ingresar-rep').hide();
    $('.ingresar-prov').hide();
    $('.modificar-prod').hide();
    $('.crear-admi').hide();
}
function mostrarformeliminar(){
    $('.eliminar-prod').show();
    
}