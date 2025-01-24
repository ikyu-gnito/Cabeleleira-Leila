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

            <div class="servicos-list">
                <?php foreach ($servicos as $servico): ?>
                    <div class="servico-item">
                        <img src="/public/imagens/<?= htmlspecialchars($servico['imagem']) ?>" alt="<?= htmlspecialchars($servico['nome']) ?>">
                        <div class="servico-info">
                            <h2><?= htmlspecialchars($servico['nome']) ?></h2>
                            <p>Preço: R$ <?php echo number_format($servico['preco'], 2, ',', '.'); ?> | Duração: <?php echo $servico['duracao']; ?> min</p>
                        </div>
                        <form action="/agendamentos/agendar" method="POST">
                            <input type="hidden" name="servico_id" value="<?php echo $servico['id']; ?>">
                            <label for="data-<?php echo $servico['id']; ?>">Data:</label>
                            <input type="date" id="data-<?php echo $servico['id']; ?>" name="data" required>
                            <label for="hora-<?php echo $servico['id']; ?>">Hora:</label>
                            <input type="time" id="hora-<?php echo $servico['id']; ?>" name="hora" required>
                            <button type="submit" class="btn-agendar">Agendar</button>
                        </form>
                    </div>
                <?php endforeach; ?>
            </div>
        </main>

    <?php include '../app/views/footer.php'; ?>
</html>