<?php
require_once "../classes/boletos.php";

$b = new Boletos();

if(isset($_POST['id_boleto'])) {
    $id_boleto = $_POST['id_boleto'];

    echo json_encode($b->RemoveBoleto($id_boleto));

} else {
    $resposta = [];
    $resposta['status'] = false;
    $resposta['msg'] = "ocorreu um erro ao enviar dados.";

    echo json_encode($resposta);

}



