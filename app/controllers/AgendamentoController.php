<?php
    //controller para agendamento
    class AgendamentoController {
    private $agendamentoModel;

    public function __construct() {
        // Instancia o Model
        $this->agendamentoModel = new AgendamentoModel();
    }

    public function agendar(){
        // Verificar se a requisição é POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Obter os dados enviados pelo formulário
            $idServico = $_POST['idServico'] ?? null;
            $dtaAgendamento = $_POST['dtaAgendamento'] ?? date('Y-m-d'); 
            $horaAgendamento = $_POST['horaAgendamento'] ?? date('H:i:s'); 

            // Simulação de cliente logado (substitua por sistema de autenticação)
            session_start();
            $idCliente = $_SESSION['idCliente'] ?? null;

            if (!$idCliente) {
                echo "Você precisa estar logado para agendar!";
                exit;
            }

            // Verificar se já existe um agendamento na mesma semana
            $agendamentoExistente = $this->agendamentoModel->verificarAgendamentoMesmoCliente(idCliente: $idCliente, dtaAgendamento:  $dtaAgendamento);

            if ($agendamentoExistente) {
                echo "Você já tem um agendamento nesta semana em: " . $agendamentoExistente['dtaAgendamento'];
                exit;
            }

            // Criar o agendamento no banco de dados
            $resultado = $this->agendamentoModel->criarAgendamento(idCliente: $idCliente, idServico: $idServico, $dtaAgendamento, $horaAgendamento);

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


