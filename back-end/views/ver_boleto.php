<?php
require_once "../classes/boletos.php";

$b = new Boletos();

if(isset($_POST['status'])) {
    $status = $_POST['status'];
    $descricao = $_POST['descricao'] ?? null;
    $valor = $_POST['valor'] ?? null;
    $vencimento = $_POST['vencimento'] ?? null;

    echo json_encode($b->VerBoleto($status, $descricao, $valor, $vencimento));

} else {

    echo json_encode(array($_POST));

}



