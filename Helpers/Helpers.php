<?php

function base_url(){
    return base_url;
}

function media(){
    return base_url."/Assets/img";
}

function header_nav($data=""){
    $header = dirname(__DIR__)."/Views/Templates/header.php";
    if (file_exists($header)) {
        require_once $header;
    }else {
        echo "Error: El archivo no existe en la ruta: " . $header;
    }
    //return $header;

    require_once dirname(__DIR__)."/Views/Templates/navbar.php";
}

function footer($data=""){
    $footer = dirname(__DIR__)."/Views/Templates/footer.php";
    if (file_exists($footer)) {
        require_once $footer;
    }else {
        echo "Error: El archivo no existe en la ruta: " . $footer;
    }
    //return $header;
}

function debug($data){

    $format = print_r('<pre>');
    $format .= print_r($data);
    $format .= print_r('</pre>');
    //return $format;
}

function limpiar($datos) {
    $datos = trim($datos);
    $datos = stripslashes($datos);
    $datos = htmlspecialchars($datos, ENT_QUOTES, 'UTF-8');
    //$datos = utf8_decode($datos);
    return $datos;
}