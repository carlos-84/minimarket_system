<?php
  require_once("Config/Config.php");
  require_once("Helpers/Helpers.php");
   echo APP_JS;
    $ruta  = !empty($_GET['url']) ? $_GET['url'] : CONTROLLER_DEFAULT."/".METHOD_DEFAULT;
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
    //$dirContrller = "Controllers/". $controller. ".php";
    $dirContrller = CONTROLLER . DS . $controller . ".php";
    //$errorController = "Controllers/Error404.php";
    $errorController = CONTROLLER . DS . CONTROLLER_ERROR .".php";

    if (file_exists($dirContrller)) {
        require_once $dirContrller;
        $controller = new $controller();
        if (method_exists($controller, $metodo)) {
            $controller->$metodo($parametro);
        }else {
            
            require_once $errorController;
            $controller = new Error404();
            $controller->error404();
            //echo "No existe el método. ";
        }
    }else {

        require_once $errorController;
        $controller = new Error404();
        $controller->error404();
        //echo "No existe el controlador. ";
    }




?>