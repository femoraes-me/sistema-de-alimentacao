$('.phone').mask('(00) 0000-0000');


$('#showForm').on('click', function () {
    console.log('carregado');
    var btn = $('#hideForm');
    btn.removeClass('d-none');
    $('#formEscola').removeClass('d-none');
    $('.alert').alert('close')
});

$('#hideForm').on('click', function () {
    console.log('carregado');
    $(this).addClass('d-none');
    $('#formEscola').addClass('d-none');
});

//alerta ao excluir
$(document).on('click', '#btnDelete', function (event) {
    event.preventDefault();
    const form = $(this).parent();
    var role = $(this).closest("tr");
    var nomeEscola = role.find('#tdNome').text();
    $('.modal-body').append('<span class="font-weight-bolder">Tem certeza que deseja excluir a escola: ' + nomeEscola + '</span>');
    $('#btnConfirm').on('click', function (e) {
        form.trigger('submit');
    });
    
    $('#confirmationModal').on('hide.bs.modal, hidden.bs.modal ', function (event) {
        $('.modal-body').empty();
      })

});