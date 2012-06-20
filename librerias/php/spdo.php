<?php

class spdo extends PDO {

    private static $instance = null;

    public function __construct() {
        $config = config::singleton();
        $tns = "
(DESCRIPTION =
    (ADDRESS_LIST =
      (ADDRESS = (PROTOCOL = TCP)(HOST = localhost)(PORT = 1521))
    )
    (CONNECT_DATA =
      (SERVICE_NAME = orcl)
    )
  )
       ";

        //parent::__construct('mysql:host=' . $config->obtenerVariable('dbhost') . ';dbname=' . $config->obtenerVariable('dbname'), $config->obtenerVariable('dbuser'), $config->obtenerVariable('dbpass'));
        parent::__construct('oci:host=localhost;dbname=XE;port=1521;', 'SYSTEM', 'oracle');
    }

    public static function singleton() {
        if (self::$instance == null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

}

?>