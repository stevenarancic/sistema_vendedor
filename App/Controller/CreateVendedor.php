<?php

namespace App\Controller;

session_start();

require_once '../../vendor/autoload.php';

use App\Model as Model;

$vendedor = new Model\Vendedor($_POST['nome'], $_POST['sobrenome'], $_POST['telefone1']);
$vendedorDAO = new Model\VendedorDAO();

$vendedor->setTelefone2($_POST['telefone2']);
$vendedor->setEmail($_POST['email']);
$vendedor->setFacebook($_POST['facebook']);
$vendedor->setInstagram($_POST['instagram']);

$vendedorDAO->createVendedor($vendedor);

$nomeArquivo = $_FILES['arquivo']['name'];
$caminhoAtualArquivo = $_FILES['arquivo']['tmp_name'];
$caminhoSalvar = '../../assets/img/vendedores/' . $nomeArquivo;

move_uploaded_file($caminhoAtualArquivo, $caminhoSalvar);

$_SESSION['status'] = 'create';
header('location: ../../index.php');
