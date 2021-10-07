<?php
require_once '../../vendor/autoload.php';

use App\Model as Model;

$vendedorDAO = new Model\VendedorDAO();

$vendedorDAO->deleteVendedor($_GET['id']);
header('location: ../../index.php');
