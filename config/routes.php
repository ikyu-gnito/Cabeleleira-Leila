<?php

    $router = new Router(); // Instância do roteador (ex.: Router personalizado)

    // Defina as rotas
    $router->get('/', 'HomeController@index'); // Rota para a página inicial
    $router->post('/agendamentos/agendar', 'AgendamentoController@agendar'); // Rota para agendar

    // Inclua o arquivo no ponto de entrada (index.php)
    return $router;

    $router->post('/agendamentos/agendar', 'AgendamentoController@agendar');

?>