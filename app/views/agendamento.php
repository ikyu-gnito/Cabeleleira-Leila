<!DOCTYPE html>
    <?php include '../app/views/header.php'; ?>
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Cabeleleira Leila</title>
            <link rel="stylesheet" href="css/styles.css">
        </head>
        <main>
            <h1>Serviços</h1>
            <div class="search-bar">
                <input type="text" placeholder="Pesquisar">
            </div>

            <div class="servicos-list">
                <?php foreach ($servicos as $servico): ?>
                    <div class="servico-item">
                        <img src="/public/imagens/<?= htmlspecialchars($servico['imagem']) ?>" alt="<?= htmlspecialchars($servico['nome']) ?>">
                        <div class="servico-info">
                            <h2><?= htmlspecialchars($servico['nome']) ?></h2>
                            <p><?= htmlspecialchars($servico['descricao']) ?></p>
                            <span class="preco"><?= htmlspecialchars($servico['preco']) ?></span>
                            <span class="duracao"><?= htmlspecialchars($servico['duracao']) ?></span>
                        </div>
                        <button class="agendar-btn">Agendar</button>
                    </div>
                <?php endforeach; ?>
            </div>
        </main>

    <?php include '../app/views/footer.php'; ?>
</html>