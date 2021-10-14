<?php
session_start();

require_once '../../vendor/autoload.php';

use App\Model as Model;

$vendedorDAO = new Model\VendedorDAO();
$vendedorDAO->filtrarVendedor($_GET['id']);

foreach ($vendedorDAO->filtrarVendedor($_GET['id']) as $vendedor) {
    $nome =  $vendedor['nome'];
    $sobrenome = $vendedor['sobrenome'];
    $telefone1 = $vendedor['telefone1'];
    $telefone2 = $vendedor['telefone2'];
    $email = $vendedor['email'];
    $facebook = $vendedor['facebook'];
    $instagram = $vendedor['instagram'];
    $imagem = $vendedor['imagem_perfil'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <link rel="stylesheet" href="../../assets/css/style.css">

    <title>Edição de Vendedor</title>

    <style>
        @media (min-width: 900px) {

            .col-lg-8,
            .col-md-8 {
                padding-left: 1rem !important;
            }
        }

        .col-lg-4,
        .col-md-4 {
            padding-bottom: 1rem !important;
        }
    </style>
</head>

<body>
    <header class="bg-light">
        <div class="container">
            <h1>
                Edição de Vendedor
            </h1>
        </div>
    </header>
    <main>
        <section class="article container">
            <button type="button" class="btn mt-4 text-secondary fs-5" onclick="alertButton('Você perderá suas alterações.', 'voltar')">
                <i class="bi bi-arrow-left"></i> Voltar
            </button>
            <form id="myForm" action="../Controller/UpdateVendedor.php?id=<?= $vendedor['id'] ?>" method="POST" enctype="multipart/form-data">
                <div class="d-flex justify-content-center">
                    <img class="rounded-circle" src="<?php echo "../../assets/img/vendedores/" . $imagem . ".jpg"; ?>" alt="Imagem indiponível :(" style="height: auto!important; max-height: 15rem!important; object-fit: cover;">
                </div>
                <div class="mb-3 text-center fs-3 text-dark">
                    <p>Alterar Imagem de Perfil</p>
                </div>
                <input class="form-control mb-3" type="file" name="arquivo">
                <div class="form-floating mb-3">
                    <input type="text" name="nome" class="form-control" placeholder="ex: Carlos" value="<?php echo $nome ?>" required>
                    <label for="">
                        Nome <i class="bi bi-person"></i>
                    </label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="sobrenome" class="form-control" placeholder="ex: Oliveira" value="<?php echo $sobrenome ?>" required>
                    <label for="">
                        Sobrenome <i class="bi bi-person"></i>
                    </label>
                </div>
                <div class="form-floating mb-3">
                    <input type="tel" name="telefone1" class="form-control" placeholder="(99) 99999-9999" value="<?php echo $telefone1 ?>" maxlength="11" required pattern="[0-9]+$">
                    <label for="">
                        Telefone <i class="bi bi-phone"></i>
                    </label>
                </div>
                <div class="form-floating mb-3">
                    <input type="tel" name="telefone2" class="form-control" placeholder="(99) 99999-9999" value="<?php echo $telefone2 ?>" maxlength="11" pattern="[0-9]+$">
                    <label for="">
                        Telefone 2 (opcional) <i class="bi bi-telephone"></i>
                    </label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" name="email" class="form-control" placeholder="exemplo@exemplo.com.br" value="<?php echo $email ?>">
                    <div id="emailHelp" class="form-text">
                        Não compartilharemos seu e-mail com ninguém.
                    </div>
                    <label for="">
                        E-Mail <i class="bi bi-envelope"></i>
                    </label>
                </div>
                <label for="">
                    Facebook <i class="bi bi-facebook"></i>
                </label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">
                        @
                    </span>
                    <input type="text" name="facebook" class="form-control" placeholder="nome.de.usuario11" value="<?php echo $facebook ?>">
                </div>
                <label for="">
                    Instagram <i class="bi bi-instagram"></i>
                </label>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">
                        @
                    </span>
                    <input type="text" name="instagram" class="form-control" placeholder="nome_de.usuario123" value="<?php echo $instagram ?>">
                </div>
                <button type="submit" class="btn btn-success">
                    Confirmar Edição
                </button>
                <button type="button" class="btn" onclick="alertButton('Essa ação não pode ser desfeita.', 'resetar')">
                    Resetar Campos
                </button>
            </form>
            <footer>
                Feito por @SteveNarancic
            </footer>
        </section>
    </main>

    <script src="../../node_modules/sweetalert2/dist/sweetalert2.all.js"></script>
    <script>
        function alertButton(text, condicional) {
            Swal.fire({
                title: 'Tem certeza?',
                text: text,
                icon: 'warning',
                showConfirmButton: true,
                confirmButtonText: 'Sim',
                confirmButtonColor: '#78c696',
                showDenyButton: true,
                denyButtonText: 'Não',
            }).then((result) => {
                switch (condicional) {
                    case 'voltar':
                        if (result.isConfirmed) {
                            window.location = "../../index.php";
                        } else if (result.isDenied) {}
                        break;
                    case 'resetar':
                        if (result.isConfirmed) {
                            document.getElementById("myForm").reset();
                        } else if (result.isDenied) {}
                        break;
                    default:
                        break;
                }
            })
        }
    </script>

    <!-- jquery -->
    <script src="node_modules/jquery/dist/jquery.min.js"></script>

    <!-- statusCRUD -->
    <script src="../../assets/js/StatusCRUD.js"></script>
    <?php require_once '../Stucture/statusCRUD.php' ?>
</body>

</html>