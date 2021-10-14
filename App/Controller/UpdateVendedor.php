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

$nomeArquivo = $_FILES['arquivo']['name'];
$caminhoAtualArquivo = $_FILES['arquivo']['tmp_name'];

if (file_exists('../../assets/img/vendedores/' . (($_GET['id'] + 1) - 1) . '.jpg')) {
    if ($nomeArquivo != "") {
        if (unlink('../../assets/img/vendedores/' . (($_GET['id'] + 1) - 1) . '.jpg')) {
            $caminhoSalvar = '../../assets/img/vendedores/' . (($_GET['id'] + 1) - 1) . '.jpg';
            move_uploaded_file($caminhoAtualArquivo, $caminhoSalvar);
        } else {
            echo 'A imagem de perfil não pode ser apagada! nome do arquivo: ' . $filename . '<br>Erro!';
        }
    }
} else {
    if ($nomeArquivo != "") {
        if (unlink('../../assets/img/vendedores/' . (($_GET['id'] + 1) - 1) . '.jpg')) {
            $caminhoSalvar = '../../assets/img/vendedores/' . (($_GET['id'] + 1) - 1) . '.jpg';
            move_uploaded_file($caminhoAtualArquivo, $caminhoSalvar);
        } else {
            echo 'A imagem de perfil não pode ser apagada! nome do arquivo: ' . $filename . '<br>Erro!';
        }
    }
}
$vendedorDAO = new Model\VendedorDAO();
$vendedorDAO->updateVendedor($vendedor);

$_SESSION['status'] = 'update';
header('location: ../../index.php');
