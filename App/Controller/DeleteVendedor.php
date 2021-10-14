<?php
session_start();

require_once '../../vendor/autoload.php';

use App\Model as Model;

$vendedorDAO = new Model\VendedorDAO();

$vendedorDAO->deleteVendedor($_GET['id']);

$nomeArquivo = ($_GET['id'] + 1) - 1;
$caminhoArquivo = '../../assets/img/vendedores/' . $nomeArquivo . '.jpg';

if (unlink($caminhoArquivo)) {
    echo 'O arquivo ' . $nomeArquivo . ' foi deletado !';
} else {
    echo 'A imagem de perfil não pode ser apagada! nome do arquivo: ' . $filename;
}

header('location: ../../index.php');
