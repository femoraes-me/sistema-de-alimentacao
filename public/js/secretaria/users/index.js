
//alerta ao excluir
$(document).on('click', '#btnDelete', function (event) {
    event.preventDefault();
    const form = $(this).parent();
    var role = $(this).closest("tr");
    var nomeUsuario = role.find('#tdNome').text();
    $('.modal-body').append('<span class="font-weight-bolder">Tem certeza que deseja excluir o usuário: ' + nomeUsuario + '</span>');
    $('#btnConfirm').on('click', function (event) {
        form.trigger('submit');
    });
    
    $('#confirmationModal').on('hide.bs.modal, hidden.bs.modal ', function () {
        $('.modal-body').empty();
    });

});