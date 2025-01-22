<?php

    require_once '../app/models/ServicoModel.php';

    class AgendaController {
        public function index() {
            $servicoModel = new ServicoModel();
            $servicos = $servicoModel->getServicos();
            require_once '../app/views/agendamento.php';
        }
    }
?> 