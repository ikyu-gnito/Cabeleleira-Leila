<!DOCTYPE html>
    <?php include '../app/views/header.php'; 
        $actionUrl = '/agendamento/agendar';
    
    ?>

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
                    <img src="<?= htmlspecialchars($servico['imagem']); ?>" alt="<?= htmlspecialchars($servico['nome']); ?>">
                    <div class="servico-info">
                        <h2><?= htmlspecialchars($servico['nome']) ?></h2>
                        <p>Preço: R$ <?= number_format($servico['preco'], 2, ',', '.'); ?> | Duração: <?= $servico['duracao']; ?> min</p>
                    </div>
                    <button id="openPopup-<?= $servico['id']; ?>" class="btn-open-popup" data-servico-id="<?= $servico['id']; ?>">Agendar</button>

                    <div id="popup-<?= $servico['id']; ?>" class="popup-overlay">
                        <div class="popup-content">
                            <span id="closePopup-<?= $servico['id']; ?>" class="popup-close">&times;</span>
                            <h2>Selecione uma Data e Horário</h2>

                            <!-- Calendário -->
                            <label for="calendar-<?= $servico['id']; ?>">Data:</label>
                            <input type="date" id="calendar-<?= $servico['id']; ?>" class="calendar-input">

                            <!-- Horários -->
                            <div class="time-slots-container">
                                <p>Horários Disponíveis:</p>
                                <div class="time-slots">
                                    <button class="time-slot" data-time="08:00">08:00</button>
                                    <button class="time-slot" data-time="09:00">09:00</button>
                                    <button class="time-slot" data-time="10:00">10:00</button>
                                    <button class="time-slot" data-time="11:00">11:00</button>
                                    <button class="time-slot" data-time="14:00">14:00</button>
                                    <button class="time-slot" data-time="15:00">15:00</button>
                                </div>
                            </div>

                            <!-- Formulário de Confirmação -->
                            <form action="<?= htmlspecialchars($actionUrl); ?>" method="POST">
                                <input type="hidden" name="idServico" value="<?= $servico['id']; ?>">
                                <input type="hidden" id="dtaAgendamento-<?= $servico['id']; ?>" name="data" required>
                                <input type="hidden" id="horaAgendamento-<?= $servico['id']; ?>" name="hora" required>
                                <button type="submit" class="btn-confirm">Confirmar Agendamento</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <script src="js/scripts.js"></script>
        </main>

    <?php include '../app/views/footer.php'; ?>
</html>