// Elementos do DOM
const openPopupButton = document.getElementById('openPopup');
const closePopupButton = document.getElementById('closePopup');
const popup = document.getElementById('popup');
const timeSlots = document.querySelectorAll('.time-slot');
const calendarInput = document.getElementById('calendar');
const selectedDateInput = document.getElementById('selected-date');
const selectedTimeInput = document.getElementById('selected-time');

// Abrir o popup
const openButtons = document.querySelectorAll('.btn-open-popup');
openButtons.forEach(button => {
    button.addEventListener('click', () => {
        const servicoId = button.getAttribute('data-servico-id');
        const popup = document.getElementById(`popup-${servicoId}`);
        popup.style.display = 'flex';
    });
});

// Fechar o popup
const closeButtons = document.querySelectorAll('.popup-close');
closeButtons.forEach(button => {
    button.addEventListener('click', () => {
        const popup = button.closest('.popup-overlay');
        popup.style.display = 'none';
    });
});

// Fechar o popup ao clicar fora do conteúdo
const popups = document.querySelectorAll('.popup-overlay');
popups.forEach(popup => {
    popup.addEventListener('click', (event) => {
        if (event.target === popup) {
            popup.style.display = 'none';
        }
    });
});

// Seleção de horário
timeSlots.forEach(slot => {
    slot.addEventListener('click', () => {
        // Obter o popup atual
        const popup = slot.closest('.popup-content');
        const servicoId = popup.parentElement.id.split('-')[1]; // Extrai o ID do popup

        // Atualizar o valor do horário selecionado no input oculto
        const horaInput = document.getElementById(`hora-${servicoId}`);
        horaInput.value = slot.getAttribute('data-time');

        // Destacar o horário selecionado
        const allSlots = popup.querySelectorAll('.time-slot');
        allSlots.forEach(s => s.classList.remove('selected'));
        slot.classList.add('selected');
    });
});

// Atualizar a data no formulário
const calendarInputs = document.querySelectorAll('.calendar-input');
calendarInputs.forEach(calendar => {
    calendar.addEventListener('change', () => {
        const servicoId = calendar.id.split('-')[1]; // Extrai o ID do input
        const dataInput = document.getElementById(`data-${servicoId}`);
        dataInput.value = calendar.value;
    });
});
