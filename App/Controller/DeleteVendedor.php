<?php
session_start();

require_once '../../vendor/autoload.php';

use App\Model as Model;

$vendedorDAO = new Model\VendedorDAO();

$vendedorDAO->deleteVendedor($_GET['id']);

$_SESSION['status'] = 'delete';
header('location: ../../index.php');
