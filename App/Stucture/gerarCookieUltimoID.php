<?php

// Esse arquivo serve para gerar um cookie que dura um mês. A informação contida nesse cookie é qual o último ID de vendedor cadastrado no banco de dados. Serve para que ao cadastrar um novo vendedor, a imagem de perfil sempre venha com o ID do novo vendedor como nome.

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

    setcookie('ultimoIdVendedor', Conexao::getInstance()->lastInsertId(), time() + (86400 * 30), "/"); // 86400 = 1 dia. Cookie dura 1 mês. Registro vazio que logo após criado é deletado.

    $vendedorDAO->deleteVendedor($_COOKIE['ultimoIdVendedor'] + 1);
}
