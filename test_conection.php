<?php
require_once 'config/config.php';

try {
    // Testa a conexão
    $db = getDBConnection();
    echo "Conexão com o banco de dados estabelecida com sucesso!";
} catch (PDOException $e) {
    // Exibe o erro caso a conexão falhe
    echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
}
