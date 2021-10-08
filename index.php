<?php
include_once 'vendor/autoload.php';

$vendedorDAO = new \App\Model\VendedorDAO();
$vendedorDAO->readVendedor();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- owl carousel -->
    <link rel="stylesheet" href="assets/OwlCarousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/OwlCarousel/dist/assets/owl.theme.default.min.css">

    <!-- main css -->
    <link rel="stylesheet" href="assets/css/style.css">

    <title>Sistema de Vendedores</title>
</head>

<body class="bg-light">
    <header>
        <div class="container">
            <h1>
                Sistema de Vendedores
            </h1>
        </div>
    </header>
    <main>
        <section class="article container">
            <a class="btn btn-success w-100 mb-3" href="App/View/cadastroVendedor.php">Cadastrar Vendedor</a>
            <?php
            foreach ($vendedorDAO->readVendedor() as $key => $vendedor) { ?>
                <div class='shadow p-3 mb-4 bg-body rounded' style='width: 100%;'>
                    <div class='row g-0'>
                        <div class='col-md-8'>
                            <div class='card-body'>
                                <h5 class='card-title'>
                                    <?= $vendedor['nome']; ?> <?= $vendedor['sobrenome']; ?>
                                </h5>
                                <h6 class='card-subtitle mb-2 text-muted'>
                                    <?= $vendedor['telefone1']; ?> <?= $vendedor['telefone2']; ?>
                                </h6>
                                <p class='card-text'>
                                    <?= $vendedor['email']; ?>
                                </p>
                                <a href='#' class='btn'>
                                    <i class='bi bi-facebook'></i> <?= $vendedor['facebook']; ?>
                                </a>
                                <a href='#' class='btn'>
                                    <i class='bi bi-instagram'></i> <?= $vendedor['instagram']; ?>
                                </a>
                            </div>
                        </div>
                        <div class='col-md-4 d-flex flex-row-reverse '>
                            <a class='btn btn-light' href="App/View/editarVendedor.php?id=<?= $vendedor['id'] ?>">
                                <i class='bi bi-pencil-square'></i>
                            </a>
                            <button class="btn btn-danger" onclick="alertButton()">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </section>
        <?php require_once 'App/Stucture/bannerVendedores.php' ?>
    </main>
    <footer>
        Feito por @SteveNarancic
    </footer>

    <!-- jquery -->
    <script src="node_modules/jquery/dist/jquery.min.js"></script>

    <!-- owl carousel -->
    <script>
        $(document).ready(function() {
            $(".owl-carousel").owlCarousel({
                loop: true,
                autoplay: true,
                autoplayTimeout: 5000,
                margin: 10,
                nav: false,
                dots: false,
                rewind: true,
                responsive: {
                    0: {
                        items: 1,
                    }
                }
            });
        });
    </script>
    <script src="assets/OwlCarousel/dist/owl.carousel.min.js"></script>

    <!-- sweetalert -->
    <script src="node_modules/sweetalert2/dist/sweetalert2.all.js"></script>
    <script>
        function alertButton() {
            Swal.fire({
                title: 'Tem certeza?',
                text: 'Deseja mesmo apagar?',
                icon: 'warning',
                showConfirmButton: true,
                confirmButtonText: 'Sim',
                confirmButtonColor: '#78c696',
                showDenyButton: true,
                denyButtonText: 'Não',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "App/Controller/DeleteVendedor.php?id=<?= $vendedor['id'] ?>";
                } else if (result.isDenied) {}
            })
        }
    </script>
</body>

</html>