<?php
    //Model para agendamento
    class AgendamentoModel {
        private $db;

        public function __construct() {
            $this->db = getDBConnection(); // Função para conexão com o banco
        }
        public function criarAgendamento($idCliente, $idServico, $dataAgendamento, $horaAgendamento) {
            $sql = "INSERT INTO agendamentos (idCliente, idServico, dtaAgendamento, horaAgendamento, status)
                    VALUES (:idCliente, :idServico, :dtaAgendamento, :horaAgendamento, 'Pendente')";

            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':idCliente', $idCliente);
            $stmt->bindParam(':idServico', $idServico);
            $stmt->bindParam(':dtaAgendamento', $dtaAgendamento);
            $stmt->bindParam(':horaAgendamento', $horaAgendamento);

            return $stmt->execute();
        }

        // Verificar agendamentos na mesma semana para o mesmo cliente
        public function verificarAgendamentoMesmoCliente($idCliente, $dtaAgendamento) {
            $stmt = $this->db->prepare("
                SELECT dtaAgendamento
                FROM agendamento
                WHERE idCliente = :cliente_id
                AND YEARWEEK(dtaAgendamento, 1) = YEARWEEK(:data, 1)
            ");
            $stmt->bindParam(':idCliente', $idCliente);
            $stmt->bindParam(':dtaAgendamento', $dtaAgendamento);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC); // Retorna a data se encontrada
        }
    }
?>