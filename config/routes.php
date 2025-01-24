<?php

    $router = new Router(); // Instancia o Router

    $router->get('/', 'HomeController@index'); // Rota para a página inicial
    $router->post('/agendamentos/agendar', 'AgendamentoController@agendar'); // Rota para agendar

    return $router;
?>