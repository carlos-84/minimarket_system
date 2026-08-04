<?php

const base_url = "http://localhost/minimarket";

// contante para archivos
define("BASE_PATH", "C:\wamp64\www\minimarket");


// CONSTANTES DE CONEXION

    const DB_HOST = "localhost";
    const DB_NAME = "mmsdb";
    const DB_USER = "root";
    const DB_PASWWORD = "";
    const DB_CHARSET = "utf8";

    /*-------------------------------------------------------*/
    
    /*     CONTROLLER METHOD DEFAULT                        */
    
    /*----------------------------------------------------*/
    define("DS", DIRECTORY_SEPARATOR);
    define("ROOT", dirname(__DIR__));
    define("CONTROLLER", ROOT . DS . "Controllers");

    /*-------------------------------------------------------*/
    
    /*     CONTROLLER METHOD DEFAULT                        */
    
    /*----------------------------------------------------*/

    define("CONTROLLER_DEFAULT", "Home");
    define("METHOD_DEFAULT", "home");