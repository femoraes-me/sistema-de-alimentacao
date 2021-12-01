var btnEscolaCadastro = document.getElementById('escolaCadastro');
var formEscola = document.getElementById('formEscola');
function showForm(){
    formEscola.classList.remove('d-none');
}

btnEscolaCadastro.addEventListener('click', showForm);