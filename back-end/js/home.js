var status_atual = 0;

var datatable;

async function CarregarDados(status) {
    $('#tabelaAddBoleto').children('tbody').html("");
    var dados = await buscarBoleto(status);
    dados.forEach((value, index) => {

        var valor = parseFloat(value.valor);
        var statrow = "";
        if (value.id_stat == 3) {
            statrow = "table-success";


        } else if (value.id_stat == 2) {
            statrow = "table-danger";

        } else if (value.id_stat == 1) {
            statrow = "table-primary";

        }

        var row = $('#tabelaAddBoleto').children('tbody').html() + "<tr class='" + statrow + "'><td><input id=\"boleto_" + value.id_boleto + "\" type=\"checkbox\" class='selecionado' name=\"selected\" descricao='" + value.descricao + "' valor='" + valor.toLocaleString('pt-br', { style: 'currency', currency: 'BRL' }) + "' venc='" + value.vencimento + "' status='" + value.id_stat + "' value='" + value.id_boleto + "'/></input></td><td>" + value.id_boleto + "</td><td>" + value.descricao + "</td><td>" + valor.toLocaleString('pt-br', { style: 'currency', currency: 'BRL' }) + "</td><td>" + value.vencimento + "</td><td>" + value.status + "</td></tr>";

        $('#tabelaAddBoleto').children('tbody').html(row);


    });
}

function AtualizaTabela() {
    

}


function atribuirFiltro() {

    $("#pago").on("click", function () {
        status_atual = 3;
        $('.dropdown-item').removeClass('active');
        $('#pago').addClass('active');
        CarregarDados(3).then(() => {
            AtualizaTabela();

        });
    });

    $("#a_vencer").on("click", function () {
        status_atual = 1;
        $('.dropdown-item').removeClass('active');
        $('#a_vencer').addClass('active');

        CarregarDados(1).then(() => {
            AtualizaTabela();

        });
    });

    $("#vencido").on("click", function () {
        status_atual = 2;
        $('.dropdown-item').removeClass('active');
        $('#vencido').addClass('active');
        CarregarDados(2).then(() => {
            AtualizaTabela();

        });
    });

    $("#todos").on("click", function () {
        status_atual = 0;
        $('.dropdown-item').removeClass('active');
        $('#todos').addClass('active');
        CarregarDados(0).then(() => {
            AtualizaTabela();

        });
    });

}
window.onload = function (e) {

    document.getElementById("btn_edit").addEventListener("click", function () {
        btnEdit();
    });
    document.getElementById("btn_remove").addEventListener("click", function () {
        btnRemove();
    });

    CarregarDados(status_atual).then(() => {
        AtualizaTabela();

    });

}
$(document).ready(function () {
    var dNow = new Date();
    $('.fixed-action-btn').floatingActionButton();

    $('#dismiss, .overlay').on('click', function () {
        // hide sidebar
        $('#sidebar').removeClass('active');
        // hide overlay
        $('.overlay').removeClass('active');
    });

    $('#sidebarCollapse').on('click', function () {
        // open sidebar
        $('#sidebar').addClass('active');
        // fade in the overlay
        $('.overlay').addClass('active');
        $('.collapse.in').toggleClass('in');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
    });
    atribuirFiltro();
});
async function btnAdicionar() {
    var descricao = document.getElementsByName("descricao")[0].value;
    var valor = document.getElementsByName("valor")[0].value;
    var data = document.getElementsByName("data")[0].value;
    var status = document.getElementsByName("status")[0].value;

    if (descricao == "") {

        Swal.fire({
            title: "Opa!",
            text: "Digite uma descrição.",
            icon: "warning",
            confirmButtonText: 'Ok!'
        });
        return false;
    }

    if (valor == "") {
        Swal.fire({
            title: "Opa!",
            text: "Digite um valor.",
            icon: "warning",
            confirmButtonText: 'Ok!'
        });
        return false;
    }


    if (data == "") {
        Swal.fire({
            title: "Opa!",
            text: "Digite uma data.",
            icon: "warning",
            confirmButtonText: 'Ok!'
        });
        return false;
    }


    if (status == "") {
        Swal.fire({
            title: "Opa!",
            text: "Selecione um status.",
            icon: "warning",
            confirmButtonText: 'Ok!'
        });
        return false;
    }



    var retorno = await addBoleto(status, descricao, valor, data);

    if (retorno.status) {
        CarregarDados(status_atual).then(() => {
            AtualizaTabela();

        });

        document.getElementsByName("descricao")[0].value = "";
        document.getElementsByName("valor")[0].value = "";
        document.getElementsByName("data")[0].value = "";

    }

    Swal.fire({
        title: (retorno.status ? "Tudo certo!" : "Erro!"),
        text: retorno.msg,
        icon: (retorno.status ? "success" : "error"),
        confirmButtonText: 'Ok!'
    });



}
function dateToEN(date) {
    return date.split('/').reverse().join('-');
}
async function btnEdit() {
    if (conta_selec() != 1) {
        Swal.fire({
            title: "Opa!",
            text: "Selecione somente um boleto.",
            icon: "warning",
            confirmButtonText: 'Ok!'
        });
        return false;

    }

    $('.selecionado:checked').each(async (index, valor) => {


        var { value: formValues } = await Swal.fire({
            title: 'Editar',
            showCancelButton: true,
            confirmButtonColor: '#007bff',
            confirmButtonText: 'Salvar!',
            cancelButtonText: 'Cancelar',
            closeOnConfirm: true,
            html:
                '<input name="desc_edit" type="text" class="swal2-input" placeholder="Descrição" value="' + valor.getAttribute('descricao') + '"/>' +
                '<input name="valor_edit" type="text" class="swal2-input money" placeholder="Digite o valor do boleto" value="' + valor.getAttribute('valor') + '"/>' +
                '<input type="date" name="venc_edit" class="swal2-input" name="data" placeholder="Vencimento: DD/MM/AAAA" value="' + dateToEN(valor.getAttribute('venc')) + '"/>' +
                '<select class="swal2-select" name="status_edit" name="status">' +
                '<option value="3" ' + (valor.getAttribute('status') == 3 ? 'selected' : '') + '>Pago</option>' +
                '<option value="2" ' + (valor.getAttribute('status') == 2 ? 'selected' : '') + '>Vencido</option>' +
                '<option value="1" ' + (valor.getAttribute('status') == 1 ? 'selected' : '') + '>A vencer</option>' +
                '</select>',

            onOpen: () => {
                $('.money').mask('000.000.000.000.000,00', { reverse: true });
            },
            preConfirm: (tst) => {
                if (document.getElementsByName('desc_edit')[0].value == '') {
                    return Swal.showValidationMessage('Por favor, digite uma descrição.');
                }

                if (document.getElementsByName('valor_edit')[0].value == '') {
                    return Swal.showValidationMessage('Por favor, digite um valor.');
                }

                if (document.getElementsByName('venc_edit')[0].value == '') {
                    return Swal.showValidationMessage('Por favor, digite uma data.');
                }

                if (document.getElementsByName('status_edit')[0].value == '') {
                    return Swal.showValidationMessage('Por favor, selecione um status.');
                }

                return [
                    document.getElementsByName('desc_edit')[0].value,
                    document.getElementsByName('valor_edit')[0].value,
                    document.getElementsByName('venc_edit')[0].value,
                    document.getElementsByName('status_edit')[0].value
                ]
            }

        });

        if (formValues) {

            var id = valor.value;
            var result = await EditarBoleto(id, formValues[3], formValues[0], formValues[1], formValues[2]);
            if (result.status) {
                Swal.fire({
                    title: "Tudo certo!",
                    text: "Boleto editado com sucesso.",
                    icon: "success",
                    confirmButtonText: 'Ok!'
                });
                CarregarDados(status_atual).then(() => {
                    AtualizaTabela();

                });



            } else {
                Swal.fire({
                    title: "Erro!",
                    text: "Ocorreu um erro ao tentar editar.",
                    icon: "error",
                    confirmButtonText: 'Ok!'
                });

                CarregarDados(status_atual).then(() => {
                    AtualizaTabela();

                });

            }

        }


    });

}
function conta_selec() {
    var cont = 0;
    $('.selecionado:checked').each((index, valor) => {
        cont++;

    });

    return cont;
}

async function btnRemove() {
    if (conta_selec() == 0) {
        Swal.fire({
            title: "Opa!",
            text: "Selecione algum boleto.",
            icon: "warning",
            confirmButtonText: 'Ok!'
        });
        return false;

    }

    var promises = [];

    $('.selecionado:checked').each((index, valor) => {
        promises.push(new Promise(async (resolve, reject) => {
            var id = valor.value;
            var result = await RemoverBoleto(id);

            if (result.status) {
                resolve(true);

            } else {
                reject(true);

            }

        }));
    });

    Promise.all(promises).then((values) => {
        Swal.fire({
            title: "Tudo certo!",
            text: "Boletos removidos com sucesso.",
            icon: "success",
            confirmButtonText: 'Ok!'
        });
        CarregarDados(status_atual).then(() => {
            AtualizaTabela();

        });
    }).catch(() => {
        Swal.fire({
            title: "Erro!",
            text: "Ocorreu um erro ao tentar remover.",
            icon: "error",
            confirmButtonText: 'Ok!'
        });

        CarregarDados(status_atual).then(() => {
            AtualizaTabela();

        });

    });


}



