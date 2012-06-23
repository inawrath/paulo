<?php

//forma de controlar el acceso del usuario desde una clase =)
class autentificacion {

    //retorno un 1 si se tiene permiso y no se necesita id
    //retorno un 2 si se tiene permiso y necesita id
    //retorno un 3 si se tiene permiso, necesita id y subId
    //retorno un 4 si no se tiene permiso

    public static function invitado($var) {
        $nombreControlador = $var['controlador'];
        $nombreAccion = $var['accion'];
        //echo $nombreControlador.$nombreAccion;
        switch ($nombreControlador) {
            case 'inicio':
                switch ($nombreAccion) {
                    case 'inicio':
                        return 1;
                        break;
                    case 'nuevoUsuario':
                        return 1;
                        break;
                    default: return 4;
                        break;
                }
                break;
            case 'usuario':
                switch ($nombreAccion) {
                    case 'ingresar':
                        return 1;
                        break;
                    case 'salir':
                        return 1;
                        break;
                    default: return 4;
                        break;
                }
                break;
            default: return 4;
                break;
        }
        return 4;
    }

    public static function usuario($var) {
        //modificar para las cosas que solo puede hacer el usuario
        if ($var['id'] != '') {
            if ($var['subId'] != '') {
                return 3;
            } else {
                return 2;
            }
        } else {
            return 1;
        }
    }

    public static function administrador($var) {
        //modificar para las cosas que solo puede hacer el usuario
        if ($var['id'] != '') {
            if ($var['subId'] != '') {
                return 3;
            } else {
                return 2;
            }
        } else {
            return 1;
        }
        
        /*$nombreControlador = $var['controlador'];
        $nombreAccion = $var['accion'];
        switch ($nombreControlador) {
            case 'inicio':
                switch ($nombreAccion) {
                    case 'inicio':
                        return 1;
                        break;
                    case 'nuevoUsuario':
                        return 1;
                        break;
                    default: return 4;
                        break;
                }
                break;
            case 'usuario':
                switch ($nombreAccion) {
                    case 'nuevo':
                        return 1;
                        break;
                    case 'salir':
                        return 1;
                        break;
                    default: return 4;
                        break;
                }
                break;
            default: return 4;
                break;
        }
        return 4;//*/
    }

}

?>