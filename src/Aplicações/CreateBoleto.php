<?php

require_once "../../vendor/autoload.php";

use ctodobom\APInterPHP\BancoInter;
use ctodobom\APInterPHP\BancoInterException;
use ctodobom\APInterPHP\Cobranca\Boleto;
use ctodobom\APInterPHP\Cobranca\Pagador;

// dados do correntista
$conta = "12000272";
$cnpj = "23629677000199";
$certificado = "C:\Users\Muril\IdeaProjects\APInter-PHP\key\Inter API_Certificado.crt";
$chavePrivada = "C:\Users\Muril\IdeaProjects\APInter-PHP\key\Inter API_Chave.key";


// dados de teste
$cpfPagador = "35240321841";
$estadoPagador = "SP";

$banco = new BancoInter($conta, $certificado, $chavePrivada);

$pagador = new Pagador();
$pagador->setTipoPessoa(Pagador::PESSOA_FISICA);
$pagador->setNome("Murilo Gomes Teixeira");
$pagador->setEndereco("Teste programação");
$pagador->setNumero(42);
$pagador->setBairro("Centro");
$pagador->setCidade("Cidade");
$pagador->setCep("12345000");

$pagador->setCnpjCpf($cpfPagador);
$pagador->setUf($estadoPagador);

$boleto = new Boleto();
$boleto->setCnpjCPFBeneficiario($cnpj);
$boleto->setPagador($pagador);
$boleto->setSeuNumero("123456");
$boleto->setDataEmissao(date('2021-05-30'));
$boleto->setValorNominal(100.10);

$boleto->setDataVencimento(date_add(new DateTime() , new DateInterval("P10D"))->format('Y-m-d'));

try {
    $banco->createBoleto($boleto);
    header('Content-type: text/plain');
    echo "Boleto Criado\n";
    echo "\n seu Numero: ".$boleto->getSeuNumero();
    echo "\n nosso Numero: ".$boleto->getNossoNumero();
    echo "\n codigo Barras: ".$boleto->getCodigoBarras();
    echo "\n linha Digitavel: ".$boleto->getLinhaDigitavel();
} catch ( BancoInterException $e ) {
    echo "\n\n".$e->getMessage();
    echo "\n\nCabeçalhos: \n";
    echo $e->reply->header;
    echo "\n\nConteúdo: \n";
    echo $e->reply->body;
}
