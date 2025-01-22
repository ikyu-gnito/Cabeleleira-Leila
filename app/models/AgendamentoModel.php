<?php

class AgendamentoModel {
    private $db;

    public function __construct() {
        $this->db = getDBConnection(); // Função para conexão com o banco
    }

    // Verificar agendamentos na mesma semana para o mesmo cliente
    public function verificarAgendamentoMesmoCliente($cliente_id, $data) {
        $stmt = $this->db->prepare("
            SELECT data_agendamento
            FROM agendamentos
            WHERE cliente_id = :cliente_id
              AND YEARWEEK(dtaAgendamento, 1) = YEARWEEK(:data, 1)
        ");
        $stmt->bindParam(':cliente_id', $cliente_id);
        $stmt->bindParam(':data', $data);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC); // Retorna a data se encontrada
    }
}
