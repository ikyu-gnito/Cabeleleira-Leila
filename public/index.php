<?php

    require_once '../app/controllers/HomeController.php';
    require_once '../app/controllers/AboutController.php';
    require_once '../app/controllers/AgendaController.php';
    require_once '../app/controllers/ContactController.php';
    require_once '../app/controllers/LoginController.php';

    // Captura a rota da URL (ex.: ?route=home)
    $route = isset($_GET['route']) ? $_GET['route'] : 'home';
   
    class Router {
        private $routes = [];

        // Define uma rota GET
        public function get($route, $action) {
            $this->routes['GET'][$route] = $action;
        }

        // Define uma rota POST
        public function post($route, $action) {
            $this->routes['POST'][$route] = $action;
        }

        // Direciona a URL para o Controller/Método
        public function direct($url, $method) {
            if (isset($this->routes[$method][$url])) {
                $this->callAction(
                    ...explode('@', $this->routes[$method][$url])
                );
            } else {
                http_response_code(404);
                echo "Página não encontrada.";
            }
        }

    // Chama o Controller e Método especificados
    private function callAction($controller, $method) {
        $controller = new $controller();

        if (!method_exists($controller, $method)) {
            throw new Exception("Método {$method} não existe no Controller {$controller}");
        }

        $controller->$method();
    }
}


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

