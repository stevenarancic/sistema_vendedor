<?php

use App\Model\Conexao;

$vendedorDAO = new \App\Model\VendedorDAO();

include_once 'vendor/autoload.php';

if (!isset($_COOKIE['ultimoIdVendedor'])) {
    $vendedor = new App\Model\Vendedor("", "", "");

    $vendedor->setTelefone2("");
    $vendedor->setEmail("");
    $vendedor->setFacebook("");
    $vendedor->setInstagram("");
    $vendedor->setImagem_perfil("");

    $vendedorDAO->createVendedor($vendedor);

    setcookie('ultimoIdVendedor', Conexao::getInstance()->lastInsertId(), time() + (86400 * 30), "/"); // 86400 = 1 dia. Cookie dura 1 mês.

    $vendedorDAO->deleteVendedor($_COOKIE['ultimoIdVendedor'] + 1);
}
