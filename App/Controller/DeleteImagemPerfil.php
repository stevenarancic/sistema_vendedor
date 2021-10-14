<?php
$nomeArquivo = $_GET['id'];
$caminhoArquivo = '../../assets/img/vendedores/' . $nomeArquivo . '.jpg';

if (unlink($caminhoArquivo)) {
    echo 'O arquivo ' . $nomeArquivo . ' foi deletado !';
} else {
    echo 'A imagem de perfil não pode ser apagada! nome do arquivo: ' . $filename;
}

$_SESSION['status'] = 'delete';
header('location: ../View/editarvendedor.php?id=' . $_GET['id']);
