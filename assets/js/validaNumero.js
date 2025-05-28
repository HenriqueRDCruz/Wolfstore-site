
document.addEventListener("DOMContentLoaded", function () {
    const phoneInputField = document.querySelector("#telefone");

    // Bloqueia letras e caracteres inválidos
    phoneInputField.addEventListener("input", function (e) {
        this.value = this.value.replace(/[^0-9\s\-\+\(\)]/g, '');
    });
});
