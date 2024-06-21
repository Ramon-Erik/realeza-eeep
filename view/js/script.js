const btnConfirmarEnvio = document.querySelector('#btnAtivarModalId');
const btnCancelarEnvio = document.querySelector('#btnCancelarId');
const modalConf = document.querySelector('#confirmarId');
const modalErro = document.querySelector('#erroId');
const jurado = document.querySelector('#juradoId');

btnConfirmarEnvio.addEventListener('click', () => {
    const radios = document.querySelectorAll('input[type=radio]:checked');
    if (radios.length === 4) {
        const notas = document.querySelectorAll('span.nota')
        const totalSpan = document.querySelector('span.nota-total')
        let total = 0;
        notas.forEach((nota,chave) => {
            nota.innerText = radios[chave].value
            total += Number(radios[chave].value);
        });
        console.log(totalSpan)
        totalSpan.innerText = total;
        modalConf.showModal();
    } else {
        modalErro.showModal();
    }
});

btnCancelarEnvio.addEventListener("click", function () {
    modalConf.close();
});

window.addEventListener('click', (event) => {
    if (event.target === modalConf || event.target === modalErro) {
        modalConf.close();
        modalErro.close();
    }
});

document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('#voto');
    const submitButton = document.querySelector('#btnEnviarId');
    if (localStorage.getItem('jurado') !== null) {
        jurado.value = localStorage.getItem('jurado');
    }

    form.addEventListener('submit', function(event) {
        localStorage.setItem('jurado', jurado.value);
        submitButton.disabled = true;
        submitButton.value = 'Enviando...';
    });
});