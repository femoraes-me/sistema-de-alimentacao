

jQuery(function() {
    $('.phone').mask('(00) 0000-0000');
    var qtdAlunosInput = $('#qtd_alunos');
    var qtdTelefoneInput = $('#telefone')
    var oldAlunos = qtdAlunosInput.val();
    var oldTelefone = qtdTelefoneInput.val();

    qtdAlunosInput.on('change keyup input', function() {
        if (oldAlunos !== qtdAlunosInput.val() || oldTelefone !== qtdTelefoneInput.val()) {
            $('#btnSave').removeAttr("disabled");
        } else {
            $('#btnSave').attr("disabled", 'true');
        }
    });

    qtdTelefoneInput.on('change keyup input', function() {
        if (oldAlunos !== qtdAlunosInput.val() || oldTelefone !== qtdTelefoneInput.val()) {
            $('#btnSave').removeAttr("disabled");
        } else {
            $('#btnSave').attr("disabled", 'true');
        }
    });
});