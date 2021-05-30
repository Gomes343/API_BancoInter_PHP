<?php

require_once "../../vendor/autoload.php";
use ctodobom\APInterPHP\BancoInter;
use ctodobom\APInterPHP\BancoInterException;
use ctodobom\APInterPHP\Cobranca\Boleto;
use ctodobom\APInterPHP\Cobranca\Pagador;
use ctodobom\APInterPHP\Aplication\Correntista;

$correntista = new Correntista();
$banco = new BancoInter($correntista->getNumero_da_Conta(),$correntista->getCertificado(), $correntista->getChavePrivada());

try {
    echo "\nConsultando boleto\n";
    $boleto2 = $banco->listaBoletos("2021-05-01","2021-05-31");
    //var_dump($boleto2);


} catch ( BancoInterException $e ) {
    echo "\n\n".$e->getMessage();
    echo "\n\nCabeçalhos: \n";
    echo $e->reply->header;
    echo "\n\nConteúdo: \n";
    echo $e->reply->body;
}
