<?php

    $router = new Router(); // Instancia o Router
    $router->post('/agendamento/agendar', 'AgendamentoController@agendar'); // Rota para agendar um serviço

    $router->get('/', 'HomeController@index'); // Rota para a página inicial
    
    return $router;
?>