<?php
    //Model para agendamento
    class AgendamentoModel {
        private $db;

        public function __construct() {
            $this->db = getDBConnection(); // Função para conexão com o banco
        }
        public function criarAgendamento($cliente_id, $servico_id, $data, $hora) {
            $sql = "INSERT INTO agendamentos (idCliente, idServico, dtaAgendamento, horaAgendamento, status)
                    VALUES (:cliente_id, :servico_id, :data_agendamento, :hora_agendamento, 'Pendente')";

            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':cliente_id', $cliente_id);
            $stmt->bindParam(':servico_id', $servico_id);
            $stmt->bindParam(':data_agendamento', $data);
            $stmt->bindParam(':hora_agendamento', $hora);

            return $stmt->execute();
        }

        // Verificar agendamentos na mesma semana para o mesmo cliente
        public function verificarAgendamentoMesmoCliente($cliente_id, $data) {
            $stmt = $this->db->prepare("
                SELECT dtaAgendamento
                FROM agendamento
                WHERE idCliente = :cliente_id
                AND YEARWEEK(dtaAgendamento, 1) = YEARWEEK(:data, 1)
            ");
            $stmt->bindParam(':cliente_id', $cliente_id);
            $stmt->bindParam(':data', $data);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC); // Retorna a data se encontrada
        }
    }
?>