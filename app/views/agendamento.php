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
                        <button id="openPopup" class="btn-open-popup">Agendar</button>
                                <div id="popup" class="popup-overlay">
                                    <div class="popup-content">
                                        <span id="closePopup" class="popup-close">&times;</span>
                                        <h2>Selecione uma Data e Horário</h2>

                                        <!-- Calendário -->
                                        <label for="calendar">Data:</label>
                                        <input type="date" id="calendar" class="calendar-input">

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

                                        <!-- Botão Confirmar -->
                                        <form action="/agendamentos/agendar" method="POST">
                                                <input type="hidden" name="servico_id" value="<?php echo $servico['id']; ?>">
                                                <label for="data-<?php echo $servico['id']; ?>"></label>
                                                <input type="hidden" id="data-<?php echo $servico['id']; ?>" name="data" required>
                                                <label for="hora-<?php echo $servico['id']; ?>"></label>
                                                <input type="hidden" id="hora-<?php echo $servico['id']; ?>" name="hora" required>
                                                <button type="submit" class="btn-confirm">Confirmar Agendamento</button>
                                        </form>
                                    </div>
                                </div>

                                <script src="js/scripts.js"></script>
                    </div>
                <?php endforeach; ?>
            </div>
        </main>

    <?php include '../app/views/footer.php'; ?>
</html>