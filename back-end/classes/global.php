<?php

class GlobalFunctions {
    public function f_grava_data($dt)
    {
        ### recebe uma data no formato Brasileiro e retorna formato mysql
        if (!empty($dt)) {
            $data = array(substr($dt, 0, 2), substr($dt, 3, 2), substr($dt, 6, 4));
            $nova_data = $data[2] . "-" . $data[1] . "-" . $data[0];
        } else {
            $nova_data = '0000-00-00';
        }
        return $nova_data;
    }
    
    public function f_grava_real($valor)
    {
        // Essa função recebe um valor no formator usuário (000.000,00) e transforma para do formato banco (000000.00)
        $valor = str_replace(".", "", $valor);
        $valor = str_replace(",", ".", $valor);
        return $valor;
    }


}