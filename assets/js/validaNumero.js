
// Função para validar número de telefone
function initPhoneValidation() {
    const phoneInputField = document.querySelector("#telefone");

    // Verifica se o elemento existe antes de adicionar o event listener
    if (phoneInputField) {
        console.log('Campo telefone encontrado, aplicando validação...');
        
        // Bloqueia letras e caracteres inválidos
        phoneInputField.addEventListener("input", function (e) {
            this.value = this.value.replace(/[^0-9\s\-\+\(\)]/g, '');
        });
    } else {
        console.log('Campo telefone não encontrado nesta página.');
    }
}

// Executa quando o DOM estiver carregado
document.addEventListener("DOMContentLoaded", initPhoneValidation);
