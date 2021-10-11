<?php

namespace App\Controller;

session_start();

require_once '../../vendor/autoload.php';

$nomeArquivo = $_SESSION['ultimo_id'] + 1;
$caminhoAtualArquivo = $_FILES['arquivo']['tmp_name'];
$caminhoSalvar = '../../assets/img/vendedores/' . $nomeArquivo . '.jpg';

move_uploaded_file($caminhoAtualArquivo, $caminhoSalvar);

use App\Model as Model;

$vendedor = new Model\Vendedor($_POST['nome'], $_POST['sobrenome'], $_POST['telefone1']);
$vendedorDAO = new Model\VendedorDAO();

$vendedor->setTelefone2($_POST['telefone2']);
$vendedor->setEmail($_POST['email']);
$vendedor->setFacebook($_POST['facebook']);
$vendedor->setInstagram($_POST['instagram']);
$vendedor->setImagem_perfil($nomeArquivo);

$vendedorDAO->createVendedor($vendedor);

$_SESSION['status'] = 'create';
unset($_SESSION['ultimo_id']);

header('location: ../../index.php');
