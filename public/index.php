<?php

    require_once '../app/controllers/AgendaController.php';

    $url = isset($_GET['url']) ? rtrim($_GET['url'], '/') : 'agenda';
    $url = explode('/', $url);

    $controllerName = ucfirst($url[0]) . 'Controller';
    $method = $url[1] ?? 'index';

    if (file_exists("../app/controllers/$controllerName.php")) {
        $controller = new $controllerName();
        if (method_exists($controller, $method)) {
            $controller->$method();
        } else {
            echo "Método não encontrado!";
        }
    } 
    else {
        echo "Controlador não encontrado!";
    }
?>
