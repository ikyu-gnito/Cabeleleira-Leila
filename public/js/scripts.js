// Elementos do DOM
const openPopupButton = document.getElementById('openPopup');
const closePopupButton = document.getElementById('closePopup');
const popup = document.getElementById('popup');
const timeSlots = document.querySelectorAll('.time-slot');
const calendarInput = document.getElementById('calendar');
const selectedDateInput = document.getElementById('selected-date');
const selectedTimeInput = document.getElementById('selected-time');

// Abrir o popup
openPopupButton.addEventListener('click', () => {
    popup.style.display = 'flex';
});

// Fechar o popup
closePopupButton.addEventListener('click', () => {
    popup.style.display = 'none';
});

// Seleção de Horários
timeSlots.forEach(slot => {
    slot.addEventListener('click', () => {
        // Remover a seleção de outros botões
        timeSlots.forEach(s => s.classList.remove('selected'));
        // Adicionar classe "selected" ao botão clicado
        slot.classList.add('selected');
        // Atualizar o valor do input oculto
        selectedTimeInput.value = slot.dataset.time;
    });
});

// Validação no envio
const confirmButton = document.querySelector('.btn-confirm');
confirmButton.addEventListener('click', (e) => {
    if (!selectedTimeInput.value) {
        alert('Por favor, selecione um horário válido!');
        e.preventDefault(); // Impede o envio do formulário
    }
});