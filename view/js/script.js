const btnConfirmarEnvio = document.querySelector('#btnAtivarModalId');
const btnCancelarEnvio = document.querySelector('#btnCancelarId');
const modalConf = document.querySelector('#confirmarId');
const modalErro = document.querySelector('#erroId');

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