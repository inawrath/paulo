<?php

class inicioControlador extends baseControladores {

    //Accion inicio
    public function inicio() {
        switch ($_SESSION['tipo']) {
            case 0:
                //Incluye el modelo que corresponde
                require 'modelos/inicioModelo.php';

                //Creamos una instancia de nuestro "modelo"
                $items = new inicioModelo();

                //Le pedimos al modelo todos los items usuarios
                $listado = $items->listarMateriales();

                //Pasamos a la vista toda la informacion que se desea representar
                $data['listado'] = $listado;

                $this->vista->desplegar("inicio", "inicio.php", $data);
                break;
            case 1:
                $this->vista->desplegar("usuario", "usuario.php");
                break;
            case 2:
                $this->vista->desplegar("administrador", "administrador.php");
                break;
            default:
                break;
        }
    }

    public function nuevoUsuario() {
        $usuario = 'admin';
        $password = 'resu';
        $nombre = 'administrador';
        $tipo = 2;
        /* tipo:
         * 0=invitado
         * 1=usuarioNormal
         * 2=administrador
         */

        $encriptado = sha1(md5($password));

        echo "INSERT INTO `prueba`.`usuarios` (
            `usu_usuario` ,
            `usu_contrasena` ,
            `usu_tipo` ,
            `usu_nombre` )
        VALUES ('$usuario','$encriptado',$tipo,'$nombre')";
    }

    public static function valida_rut($r) {
        $r = strtoupper(ereg_replace('\.|,|-', '', $r));
        $sub_rut = substr($r, 0, strlen($r) - 1);
        $sub_dv = substr($r, -1);
        $x = 2;
        $s = 0;
        for ($i = strlen($sub_rut) - 1; $i >= 0; $i--) {
            if ($x > 7) {
                $x = 2;
            }
            $s += $sub_rut[$i] * $x;
            $x++;
        }
        $dv = 11 - ($s % 11);
        if ($dv == 10) {
            $dv = 'K';
        }
        if ($dv == 11) {
            $dv = '0';
        }
        if ($dv == $sub_dv) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 
     * @return int Este Metodo retorna 0 si <b>fecha</b> es igual a <b>fechaActual</b>; 1 si <b>fecha</b> es mayor a <b>fechaActual</b>; 2 si <b>fecha</b> es menor a <b>fechaActual</b>
     */

    public static function compararFechas($fecha, $fechaActual) {
        if ($fecha['year'] == $fechaActual['year'] && $fecha['mon'] == $fechaActual['mon'] && $fecha['mday'] == $fechaActual['mday']) {
            return 0;
        } else {
            if ($fecha['year'] > $fechaActual['year']) {
                return 1;
            } else {
                if ($fecha['year'] == $fechaActual['year']) {
                    if ($fecha['mon'] > $fechaActual['mon']) {
                        return 1;
                    } else {
                        if ($fecha['mon'] == $fechaActual['mon']) {
                            if ($fecha['mday'] > $fechaActual['mday']) {
                                return 1;
                            } else {
                                return 2;
                            }
                        } else {
                            return 2;
                        }
                    }
                } else {
                    return 2;
                }
            }
        }
    }

}

?>