<?php

class index {

    static function iniciarPagina() {
        //Incluimos algunas clases
        require 'librerias/php/controlPrincipal.php';

        if (isset($_GET['controlador'])&&isset($_GET['accion'])) {
                /* asignar variables */
                if (isset($_GET['controlador'])) {$variablesUrl['controlador'] = $_GET['controlador'];} else {$variablesUrl['controlador'] = 'inicio';}
                if (isset($_GET['accion'])) {$variablesUrl['accion'] = $_GET['accion'];} else {$variablesUrl['accion'] = 'inicio';}
                if (isset($_GET['id'])) {$variablesUrl['id'] = $_GET['id'];} else {$variablesUrl['id'] = '';}
                if (isset($_GET['subId'])) {$variablesUrl['subId'] = $_GET['subId'];} else {$variablesUrl['subId'] = '';}
            
        } else {
            $variablesUrl['controlador'] = 'inicio';
            $variablesUrl['accion'] = 'inicio';
            $variablesUrl['id'] = '';
            $variablesUrl['subId'] = '';
        }

        controlPrincipal::main($variablesUrl);
    }
}

/* * * */
//se inicia sesion
session_start();
/* compruebo si el acceso a sido declarado y asigno a tipo 0 */
if (!isset($_SESSION['ACCESO'])) {
    //para comprobar que nadie a ingresado aun entonces tomo al personaje como invitado
    $_SESSION['tipo'] = 0;
}

index::iniciarPagina();

?>