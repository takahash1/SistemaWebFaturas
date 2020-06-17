<?php
require_once "global.php";
require_once "database.php";

Class Boletos
{
    public $pdo;
	public $functions;

	public function __construct()
	{
        session_start();
		$this->functions = new GlobalFunctions();
		$this->pdo = new Database();
    }
    
    public function AddBoleto($status, $descricao, $valor, $vencimento) {

        $resposta = [];

        if(!isset($_SESSION['id_usuario']))
        {
            $resposta['status'] = false;
            $resposta['msg'] = "Erro de autenticação.";

            return $resposta;

        } else {
            $usuario = $_SESSION['id_usuario'];

        }
        $valor = $this->functions->f_grava_real($valor);

        $sql = $this->pdo->query("INSERT INTO boleto(descricao, 
                                                        valor, 
                                                        vencimento, 
                                                        id_usuario, 
                                                        status) 
                                                        VALUES ('$descricao',
                                                                $valor,
                                                                '$vencimento',
                                                                $usuario,
                                                                $status);");
                                                        
		if($sql != false)
		{
			$resposta['status'] = true;
            $resposta['msg'] = "Dados gravados com sucesso.";
            return $resposta;
		}
		else
		{
            $resposta['status'] = false;
            $resposta['msg'] = "Ocorreu um erro durante a gravação.";
			return $resposta;
		}



    }

    public function EditBoleto($id_boleto, $status, $descricao, $valor, $vencimento) {

        $resposta = [];

        if(!isset($_SESSION['id_usuario']))
        {
            $resposta['status'] = false;
            $resposta['msg'] = "Erro de autenticação.";

            return $resposta;

        } else {
            $usuario = $_SESSION['id_usuario'];

        }
        $valor = $this->functions->f_grava_real($valor);

        $sql = $this->pdo->query("UPDATE boleto SET descricao = '$descricao', 
                                                        valor = $valor, 
                                                        vencimento = '$vencimento', 
                                                        status = $status
                                                        WHERE 1 = 1
                                                        AND id_boleto = $id_boleto
                                                        AND id_usuario = $usuario;");
                                                        
		if($sql != false)
		{
			$resposta['status'] = true;
            $resposta['msg'] = "Dados atualizadas com sucesso.";
            return $resposta;
		}
		else
		{
            $resposta['status'] = false;
            $resposta['msg'] = "Ocorreu um erro durante a alteração.";
			return $resposta;
		}



    }

    public function RemoveBoleto($id_boleto) {

        $resposta = [];

        if(!isset($_SESSION['id_usuario']))
        {
            $resposta['status'] = false;
            $resposta['msg'] = "Erro de autenticação.";

            return $resposta;

        } else {
            $usuario = $_SESSION['id_usuario'];

        }
        

        $sql = $this->pdo->query("DELETE FROM boleto WHERE 1 = 1
                                                        AND id_boleto = $id_boleto
                                                        AND id_usuario = $usuario;");
                                                        
		if($sql != false)
		{
			$resposta['status'] = true;
            $resposta['msg'] = "Dados removidos com sucesso.";
            return $resposta;
		}
		else
		{
            $resposta['status'] = false;
            $resposta['msg'] = "Ocorreu um erro durante a remoção.";
			return $resposta;
		}



    }

    public function VerBoleto($status, $descricao = null, $valor = null, $vencimento = null) {

        if(!isset($_SESSION['id_usuario']))
        {
            return array();

        } else {
            $usuario = $_SESSION['id_usuario'];

        }

        if($status != 0) {
            $status = "AND status = " . $status;

        } else {
            $status = "";

        }
        if(!empty($descricao)) {
            $descricao = "AND descricao LIKE '%" . $descricao . "%'";

        } else {
            $descricao = "";

        }
        if(!empty($valor)) {
            $valor = "AND valor = " . number_format($valor, 2, '.', '');

        } else {
            $valor = "";

        }
        if(!empty($vencimento)) {
            $vencimento = "AND vencimento = '" . $vencimento . "'";

        } else {
            $vencimento = "";

        }
        $sql = $this->pdo->query("SELECT id_boleto
                                        , descricao
                                        , valor
                                        , DATE_FORMAT(vencimento, '%d/%m/%Y') AS vencimento
                                        , CASE
                                            WHEN status = 1
                                            THEN 'A vencer'
                                            WHEN status = 2
                                            THEN 'Vencido'
                                            WHEN status = 3
                                            THEN 'Pago'
                                            ELSE ''
                                        END AS 'status'
                                        , status AS id_stat
                                    FROM boleto
                                    WHERE 1 = 1 
                                    $status
                                    $descricao
                                    $valor
                                    $vencimento
                                    AND id_usuario = $usuario");
        
		if($sql->rowCount() > 0)
		{
			$dados = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $dados;
		}
		else
		{
			return array();
		}



    }




}