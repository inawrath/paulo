<?php

class spdo extends PDO {

    private static $instance = null;

    public function __construct() {
        $config = config::singleton();

        $conexion = $config->obtenerVariable('driver') .
                ':host=' . $config->obtenerVariable('dbhost') .
                ';dbname=' . $config->obtenerVariable('dbname');
        if ($config->obtenerVariable('driver') == 'oci') {
            $conexion .= ';port=' . $config->obtenerVariable('port');
        }

        parent::__construct($conexion, $config->obtenerVariable('dbuser'), $config->obtenerVariable('dbpass') , $config->obtenerVariable('options') );
    }

    public static function singleton() {
        if (self::$instance == null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

}

?>