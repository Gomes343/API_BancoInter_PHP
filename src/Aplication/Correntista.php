<?php
namespace ctodobom\APInterPHP\Aplication;

use ctodobom\APInterPHP\BancoInter;

class Correntista{

    public $numero_da_conta = "12000272";
    public $cnpj = "23629677000199";
    public $certificado = "C:\Users\Muril\IdeaProjects\APInter-PHP\key\Inter API_Certificado.crt";
    public $chavePrivada = "C:\Users\Muril\IdeaProjects\APInter-PHP\key\Inter API_Chave.key";

    public function getNumero_da_Conta(){
        return $this->numero_da_conta;
    }

    public function getCnpj(){
        return $this->cnpj;
    }

    public function getCertificado(){
        return $this->certificado;
    }

    public function getChavePrivada(){
        return $this->chavePrivada;
    }
}
