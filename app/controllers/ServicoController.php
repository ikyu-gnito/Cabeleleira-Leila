<?php

require_once '../app/models/ServicoModel.php';

class ServicosController {
    private $servicoModel;

    public function __construct() {
        $this->servicoModel = new ServicoModel();
    }

    public function index() {
        $servicos = $this->servicoModel->getServicos();
        require_once '../app/views/agendamento.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nome'];
            $descricao = $_POST['descricao'];
            $preco = $_POST['preco'];
            $duracao = $_POST['duracao'];
            $imagem = $_POST['imagem'];

            if ($this->servicoModel->createServico($nome, $descricao, $preco, $duracao, $imagem)) {
                header("Location: /servicos");
            } else {
                echo "Erro ao criar o serviço.";
            }
        } else {
            require_once '../app/views/create_servico.php';
        }
    }
}

