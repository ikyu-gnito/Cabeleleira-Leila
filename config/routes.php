<?php

    $router = new Router(); // Instancia o Router

    $router->get('/', 'HomeController@index'); // Rota para a página inicial
    $router->post('/agendamento/agendar', 'AgendamentoController@agendar'); // Rota para agendar um serviço
    return $router;
?>