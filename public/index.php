<?php

    require_once '../app/controllers/HomeController.php';
    require_once '../app/controllers/AboutController.php';
    require_once '../app/controllers/AgendaController.php';
    require_once '../app/controllers/ContactController.php';
    require_once '../app/controllers/LoginController.php';

    // Captura a rota da URL (ex.: ?route=home)
    $route = isset($_GET['route']) ? $_GET['route'] : 'home';

    // Define qual controlador será chamado
    switch ($route) {
        case 'home':
            $controller = new HomeController();
            $controller->index();
            break;

        case 'about':
            $controller = new AboutController();
            $controller->index();
            break;

        case 'agenda':
            $controller = new AgendaController();
            $controller->index();
            break;

        case 'contact':
            $controller = new ContactController();
            $controller->index();
            break;

        case 'login':
            $controller = new LoginController();
            $controller->index();
            break;

        default:
            echo "Página não encontrada.";
            break;
}

