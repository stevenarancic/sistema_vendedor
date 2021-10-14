<?php

namespace App\Controller;

session_start();

require_once '../../vendor/autoload.php';

$nomeArquivo = $_COOKIE['ultimoIdVendedor'] + 1;
$caminhoAtualArquivo = $_FILES['arquivo']['tmp_name'];
$caminhoSalvar = '../../assets/img/vendedores/' . $nomeArquivo . '.jpg';

move_uploaded_file($caminhoAtualArquivo, $caminhoSalvar);

use App\Model as Model;
use App\Model\Conexao;

$vendedor = new Model\Vendedor($_POST['nome'], $_POST['sobrenome'], $_POST['telefone1']);
$vendedorDAO = new Model\VendedorDAO();

$vendedor->setTelefone2($_POST['telefone2']);
$vendedor->setEmail($_POST['email']);
$vendedor->setFacebook($_POST['facebook']);
$vendedor->setInstagram($_POST['instagram']);
$vendedor->setImagem_perfil($nomeArquivo);

$vendedorDAO->createVendedor($vendedor);

setcookie('ultimoIdVendedor', Conexao::getInstance()->lastInsertId(), time() + (86400 * 30), "/"); // 86400 = 1 dia. Cookie dura 1 mês.

$_SESSION['status'] = 'create';
header('location: ../../index.php');
