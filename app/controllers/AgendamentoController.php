<?php

class AgendamentoController {
    private $agendamentoModel;

    public function __construct() {
        $this->agendamentoModel = new AgendamentoModel(); // Instancia o Model
    }

    public function agendar() {
        // Verificar se a requisição é POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Obter os dados enviados pelo formulário
            $servico_id = $_POST['servico_id'];
            $data = $_POST['data'] ?? date('Y-m-d'); // Data enviada ou padrão
            $hora = $_POST['hora'] ?? date('H:i:s'); // Hora enviada ou padrão

            // Simulação de cliente logado (substitua por sistema de autenticação)
            session_start();
            $cliente_id = $_SESSION['cliente_id'] ?? null;

            if (!$cliente_id) {
                echo "Você precisa estar logado para agendar!";
                exit;
            }

            // Verificar se já existe um agendamento na mesma semana
            $agendamentoExistente = $this->agendamentoModel->verificarAgendamentoMesmoCliente($cliente_id, $data);

            if ($agendamentoExistente) {
                echo "Você já tem um agendamento nesta semana em: " . $agendamentoExistente['data_agendamento'];
                exit;
            }

            // Criar o agendamento no banco de dados
            $resultado = $this->agendamentoModel->criarAgendamento($cliente_id, $servico_id, $data, $hora);

            if ($resultado) {
                echo "Agendamento realizado com sucesso!";
                header('Location: /agendamentos/sucesso'); // Redireciona para página de sucesso
                exit;
            } else {
                echo "Erro ao realizar o agendamento.";
            }
        } else {
            echo "Método não permitido.";
        }
    }
}

