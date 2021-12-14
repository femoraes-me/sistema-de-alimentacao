function desativar(elemento, attr, alvo, attrAlvo) {
    if ($(elemento).prop(attr)) {
        $(alvo).attr(attrAlvo, 'true');
    } else {
        $(alvo).removeAttr(attrAlvo);
    }

}

//desativa o select
$(document).on('click', '#userRole', function () {
    desativar('#userRole', 'checked', '#escolas_id', 'disabled');
});

//desativa a checkbox
$(document).on('click', '#escolas_id', function () {
    desativar('#escolas_id', 'selectedIndex', '#userRole', 'disabled');
});