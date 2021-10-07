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
                            <a class='btn btn-danger' href="App/Controller/DeleteVendedor.php?id=<?= $vendedor['id'] ?>">
                                <i class='bi bi-trash'></i>
                            </a>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </section>
        <div class="container-fluid bg-white">
            <div class="container pt-4">
                <h2 class="p-5 pb-4 text-uppercase border-bottom border-danger border-5 rounded-3 tw-bold " style="text-align: center;">Nossos Vendedores</h2>
            </div>
            <div class="container">
                <div class="owl-carousel owl-theme bg-body pb-4 pt-4">
                    <?php foreach ($vendedorDAO->readVendedor() as $vendedor) { ?>
                        <div class="d-flex flex-row align-items-center" style="max-height: 15rem;">
                            <!-- <div class="col-4" style="margin-left: 8%;"></div> -->
                            <div class="col">
                                <img src="assets/img/vendedores/profile.png" alt="Imagem" style="border-radius: 50%; width: 13rem!important; height: 13rem!important;">
                            </div>
                            <div class="ms-3 col ms-2" style="text-align: justify;">
                                <h3>
                                    <?= $vendedor['nome']; ?> <?= $vendedor['sobrenome']; ?>
                                </h3>
                                <h6 class=' mb-2 text-muted'>
                                    <?= $vendedor['email']; ?>
                                </h6>
                                <a href="https://api.whatsapp.com/send?phone=<?php echo $vendedor['telefone1'] ?>" class='btn'>
                                    <i class='bi bi-whatsapp text-success fs-2'></i>
                                    <!--?=// $vendedor['telefone1']; ?-->
                                </a>
                                <a href='https://www.facebook.com/<?php echo $vendedor['facebook'] ?>/' class='btn'>
                                    <i class='bi bi-facebook text-primary fs-2'></i>
                                    <!--?=// $vendedor['facebook']; ?-->
                                </a>
                                <a href='https://www.instagram.com/<?php echo $vendedor['instagram'] ?>/' class='btn'>
                                    <i class='bi bi-instagram text-secondary fs-2'></i>
                                    <!--?=//$vendedor['instagram'];?-->
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="container">
                    <div class="d-grid gap-2 col-6 mx-auto pb-5">
                        <a href="#" class="btn btn-danger btn-lg">
                            Ver Todos
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer>
        Feito por @SteveNarancic
    </footer>
    <!-- owl carousel -->
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
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
</body>

</html>