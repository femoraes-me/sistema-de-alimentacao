$('#escolaCadastro').on('click', function(event) {
    $('#formEscola').removeClass("d-none");
});

$('.close').on('click', function(event) {
    $('.alert').hide();
});


//cadastra escola 
$(document).on('click', '#btnCadastrar', function(event) {
    e.preventDefault();
    var data = {
        'nome': $('#nome').val(),
        'qtd_alunos': $('#qtd_alunos').val()
    }
    //console.log(data);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var inputNome = $('#nome');
    var inputQtd_alunos = $('#qtd_alunos');

    function verification(divName) {
        return divName.hasClass('is-invalid');
    }

    function isKeyExists(obj, key) {
        return key in obj;
    }

    $.ajax({
        type: "POST",
        url: "/secretaria/escolas",
        data: data,
        success: function(response) {
            $('.alert').show();
            $('#divMessage').removeClass('d-none');
            if (!$('#message').hasClass('alert-success')) {
                $('#message').addClass('alert-success');
                $('#message').append("<span>" + response.message + "</span>");
            }
            $('#formEscola').find('input').val("");
            $('#formEscola').find('input').removeClass("is-invalid");
            $('.invalid-feedback').empty();
        },
        error: function(data) {
            $('.alert').hide();
            if (data.status === 422) {
                $('#divMessage').addClass('d-none');
                var errors = data.responseJSON['errors'];
                if (isKeyExists(errors, "nome") && !verification(inputNome)) {
                    $('#nome').addClass('is-invalid');
                    $('#nomeErrorMessage').append(errors['nome']);
                } else if (!isKeyExists(errors, "nome") && verification(
                        inputNome)) {
                    $('#nome').removeClass('is-invalid');
                    $('#nomeErrorMessage').empty();
                }

                if (isKeyExists(errors, "qtd_alunos") && !verification(
                        inputQtd_alunos)) {
                    $('#qtd_alunos').addClass('is-invalid');
                    $('#qtd_alunosErrorMessage').append(errors['qtd_alunos']);
                } else if (!isKeyExists(errors, "qtd_alunos") && verification(
                        inputNome)) {
                    $('#qtd_alunos').removeClass('is-invalid');
                    $('#qtd_alunosErrorMessage').empty();
                }
            } else {
                $('#divMessage').removeClass('d-none');
                $('#message').addClass('alert-danger');
                $('#message').append('Erro ao cadastrar escola');
            }
        }

    });
});

//alerta ao excluir
$(document).on('click', '#btnDelete', function(event){
    event.preventDefault();
    const form = $(this).parent();
    var role = $(this).closest("tr");
    var nome = role.find('#tdNome').text();
    $('.modal-body').append('<span class="font-weight-bolder">Tem certeza que deseja excluir a escola: '+nome+'</span>');
    $('#btnConfirm').on('click', function(e){
        form.trigger('submit');
    });
});