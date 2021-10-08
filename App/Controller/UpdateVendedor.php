<?php

namespace App\Controller;

session_start();

require_once '../../vendor/autoload.php';

use App\Model as Model;

$vendedor = new Model\Vendedor($_POST['nome'], $_POST['sobrenome'], $_POST['telefone1']);

$vendedor->setId($_GET['id']);
$vendedor->setTelefone2($_POST['telefone2']);
$vendedor->setEmail($_POST['email']);
$vendedor->setFacebook($_POST['facebook']);
$vendedor->setInstagram($_POST['instagram']);

$vendedorDAO = new Model\VendedorDAO();
$vendedorDAO->updateVendedor($vendedor);

$_SESSION['status'] = 'update';
header('location: ../../index.php');
