<?php

    require_once '../config/config.php';

    class ServicoModel {
        private $db;

        public function __construct() {
            $this->db = getDBConnection();
        }

        // Buscar todos os serviços do banco de dados
        public function getServicos() {
            $stmt = $this->db->prepare("SELECT * FROM servico");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retorna os serviços como array associativo
        }

        // Buscar um serviço específico pelo ID
        public function getServicoById($id) {
            $stmt = $this->db->prepare("SELECT * FROM servico WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC); // Retorna um único serviço
        }

        // Inserir um novo serviço no banco de dados
        public function createServico($nome, $descricao, $preco, $duracao, $imagem) {
            $stmt = $this->db->prepare("
                INSERT INTO servicos (nome, descricao, preco, duracao, imagem)
                VALUES (:nome, :descricao, :preco, :duracao, :imagem)
            ");
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':descricao', $descricao);
            $stmt->bindParam(':preco', $preco);
            $stmt->bindParam(':duracao', $duracao);
            $stmt->bindParam(':imagem', $imagem);
            return $stmt->execute(); // Retorna true se a inserção for bem-sucedida
        }

        // Atualizar um serviço existente
        public function updateServico($id, $nome, $descricao, $preco, $duracao, $imagem) {
            $stmt = $this->db->prepare("
                UPDATE servicos
                SET nome = :nome, descricao = :descricao, preco = :preco, duracao = :duracao, imagem = :imagem
                WHERE id = :id
            ");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':descricao', $descricao);
            $stmt->bindParam(':preco', $preco);
            $stmt->bindParam(':duracao', $duracao);
            $stmt->bindParam(':imagem', $imagem);
            return $stmt->execute(); // Retorna true se a atualização for bem-sucedida
        }

        // Excluir um serviço
        public function deleteServico($id) {
            $stmt = $this->db->prepare("DELETE FROM servicos WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute(); // Retorna true se a exclusão for bem-sucedida
        }
    }
?>