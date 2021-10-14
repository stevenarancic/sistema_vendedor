<?php

namespace App\Controller;

session_start();

require_once '../../vendor/autoload.php';

use App\Model as Model;
use App\Model\Conexao;

$vendedorDAO = new Model\VendedorDAO();

$vendedorDAO->createImagemPerfil($_COOKIE['ultimoIdVendedor'] + 1, $_FILES['arquivo']['tmp_name']);

$vendedor = new Model\Vendedor($_POST['nome'], $_POST['sobrenome'], $_POST['telefone1']);

$vendedor->setTelefone2($_POST['telefone2']);
$vendedor->setEmail($_POST['email']);
$vendedor->setFacebook($_POST['facebook']);
$vendedor->setInstagram($_POST['instagram']);
$vendedor->setImagem_perfil($_COOKIE['ultimoIdVendedor'] + 1);

$vendedorDAO->createVendedor($vendedor);

setcookie('ultimoIdVendedor', Conexao::getInstance()->lastInsertId(), time() + (86400 * 30), "/"); // 86400 = 1 dia. Cookie dura 1 mês.

$_SESSION['status'] = 'create';
header('location: ../../index.php');
