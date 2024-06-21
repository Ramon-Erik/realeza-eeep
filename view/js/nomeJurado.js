const nomeJuradoSpan = document.querySelector('#nomeJurado');
let nome;
switch (localStorage.getItem('jurado')) {
    case '1':
        nome = 'Bruna Fly'
    case '2':
        nome = 'Daniel Mesquita'
    case '3':
        nome = 'Drielly Sanny'
        break;
    case '4':
        nome = 'Maju Moura'
        break;
    case '5':
        nome = 'Mariana Freitas'
        break;
    case '6':
        nome = 'Mariana Cruz'
        break;
    case '7':
        nome = 'Samuel Freitas'
        break;
    default:
        nome = 'Vish'
        break;
}
// alert(localStorage.getItem('jurado'));
nomeJuradoSpan.innerText = nome;