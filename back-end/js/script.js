
function buscarBoleto(status) {
	return new Promise(function (resolve, reject) {
		var url = "../back-end/views/ver_boleto.php";
		var xhttp = new XMLHttpRequest();
		xhttp.onload = function() {
			if (this.status == 200) {
				var myArr = this.response;
				resolve(myArr);
			} else {
				reject();
			}
		};
		xhttp.open("POST", url, true);
		xhttp.responseType = 'json';
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("status=" + status);
	});
}
function alteraFormatoValor(a) {
    // Altera para o formato javascript. (.) é o separador de decimal
    var b = a;
    if ((b.length - 3) == b.indexOf(',')) {
        b = b.replace(',', '.');
    }
    if (b.length > 7) {
        var loop = (b.length) / 6;
        for (i = 0; i < loop; i++) {
            if (b.indexOf('.') < (b.length - 3)) {
                b = b.replace('.', '');
            }
        }
    }

    return b;

}

function addBoleto(status, descricao, valor, vencimento) {
	return new Promise(function (resolve, reject) {
		var url = "../back-end/views/add_boleto.php";
		var xhttp = new XMLHttpRequest();
		xhttp.onload = function() {
			if (this.status == 200) {
				var myArr = this.response;
				resolve(myArr);
			} else {
				reject();
			}
		};
		xhttp.open("POST", url, true);
		xhttp.responseType = 'json';
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("status=" + status + "&descricao=" + descricao + "&valor=" + valor + "&vencimento=" + vencimento);
	});
}

function EditarBoleto(id_boleto, status, descricao, valor, vencimento) {
	return new Promise(function (resolve, reject) {
		var url = "../back-end/views/edit_boleto.php";
		var xhttp = new XMLHttpRequest();
		xhttp.onload = function() {
			if (this.status == 200) {
				var myArr = this.response;
				resolve(myArr);
			} else {
				reject();
			}
		};
		xhttp.open("POST", url, true);
		xhttp.responseType = 'json';
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("id_boleto=" + id_boleto + "&status=" + status + "&descricao=" + descricao + "&valor=" + valor + "&vencimento=" + vencimento);
	});
}

function RemoverBoleto(id_boleto) {
	return new Promise(function (resolve, reject) {
		var url = "../back-end/views/remove_boleto.php";
		var xhttp = new XMLHttpRequest();
		xhttp.onload = function() {
			if (this.status == 200) {
				var myArr = this.response;
				resolve(myArr);
			} else {
				reject();
			}
		};
		xhttp.open("POST", url, true);
		xhttp.responseType = 'json';
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("id_boleto=" + id_boleto);
	});
}

$(document).ready(function(){
	$('.date').mask('00/00/0000');
	$('.time').mask('00:00:00');
	$('.date_time').mask('00/00/0000 00:00:00');
	$('.cep').mask('00000-000');
	$('.phone').mask('0000-0000');
	$('.phone_with_ddd').mask('(00) 0000-0000');
	$('.phone_us').mask('(000) 000-0000');
	$('.mixed').mask('AAA 000-S0S');
	$('.cpf').mask('000.000.000-00', {reverse: true});
	$('.cnpj').mask('00.000.000/0000-00', {reverse: true});
	$('.money').mask('000.000.000.000.000,00', {reverse: true});
	$('.money2').mask("#.##0,00", {reverse: true});
	$('.ip_address').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
	  translation: {
		'Z': {
		  pattern: /[0-9]/, optional: true
		}
	  }
	});
	$('.ip_address').mask('099.099.099.099');
	$('.percent').mask('##0,00%', {reverse: true});
	$('.clear-if-not-match').mask("00/00/0000", {clearIfNotMatch: true});
	$('.placeholder').mask("00/00/0000", {placeholder: "__/__/____"});
	$('.fallback').mask("00r00r0000", {
		translation: {
		  'r': {
			pattern: /[\/]/,
			fallback: '/'
		  },
		  placeholder: "__/__/____"
		}
	  });
	$('.selectonfocus').mask("00/00/0000", {selectOnFocus: true});
  });