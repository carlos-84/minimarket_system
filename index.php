<?php
  require_once("Config/Config.php");
  require_once("Helpers/Helpers.php");
  
    $ruta  = !empty($_GET['url']) ? $_GET['url'] : "Home/home";
    $arrExplode = explode("/",$ruta);
    $controller = $arrExplode[0];
    $metodo = !empty($arrExplode[1]) ? $arrExplode[1] : $arrExplode[0];
    $parametro = "";
   

    if (!empty($arrExplode[1])) {
        if (!empty($arrExplode[1] != '')) {
            $metodo = $arrExplode[1];
        }
    }

    if (!empty($arrExplode[2])) {
        if (!empty($arrExplode[2] != '')) {
            for ($i=2; $i < count($arrExplode); $i++) { 
                $parametro .= $arrExplode[$i] . ",";
            }
            $parametro = trim($parametro, ",");
        }
    }
    require_once("Config/App/Autoload.php");
    $dirContrller = "Controllers/". $controller. ".php";
    if (file_exists($dirContrller)) {
        require_once $dirContrller;
        $controller = new $controller();
        if (method_exists($controller, $metodo)) {
            $controller->$metodo($parametro);
        }else {
            echo "No existe el método. ";
        }
    }else {
        echo "No existe el controlador. ";
    }




?>