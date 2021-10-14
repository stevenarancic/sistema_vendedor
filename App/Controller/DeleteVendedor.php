<?php
session_start();

require_once '../../vendor/autoload.php';

use App\Model as Model;

$vendedorDAO = new Model\VendedorDAO();

$vendedorDAO->deleteVendedor($_GET['id']);

$nomeArquivo = ($_GET['id'] + 1) - 1;

$vendedorDAO->deleteImagemPerfil($nomeArquivo);

$_SESSION['status'] = 'delete';
header('location: ../../index.php');
