<?php
require_once "../classes/boletos.php";

$b = new Boletos();

if(isset($_POST['status']) && isset($_POST['descricao']) && isset($_POST['valor']) && isset($_POST['vencimento'])) {
    $status = $_POST['status'];
    $descricao = $_POST['descricao'];
    $valor = $_POST['valor'];
    $vencimento = $_POST['vencimento'];

    echo json_encode($b->AddBoleto($status, $descricao, $valor, $vencimento));

} else {
    $resposta = [];
    $resposta['status'] = false;
    $resposta['msg'] = "ocorreu um erro ao enviar dados.";

    echo json_encode($resposta);

}



