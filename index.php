<?php
session_start();

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

    <style>
        .card-body {
            padding: 1rem 0 !important;
        }

        @media (max-width: 900px) {
            .col-md-7 {
                text-align: center !important;
            }

            .col-md-2 a,
            button {
                width: 50% !important;
                margin-top: 1rem;
                margin-bottom: 1rem;
                margin-left: 2rem;
                margin-right: 2rem;
            }

            .col-md-2 a {
                margin-left: .5rem !important;
            }

            .col-md-2 button {
                margin-right: .5rem !important;
            }
        }
    </style>
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
                        <div class="col-md-3 d-flex justify-content-center align-items-center">
                            <img class="rounded-circle float-end" src="<?php echo "assets/img/vendedores/" . $vendedor['imagem_perfil'] . ".jpg"; ?>" alt="Imagem Perfil" style="object-fit: cover; width: 8rem!important; height: 8rem!important">
                        </div>
                        <div class='col-md-7'>
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
                        <div class='col-md-2 d-flex flex-row-reverse '>
                            <a class='btn btn-light' href="App/View/editarVendedor.php?id=<?= $vendedor['id'] ?>">
                                <i class='bi bi-pencil-square'></i>
                            </a>
                            <button class="btn btn-danger" onclick="alertButton('<?= $vendedor['id'] ?>', 'Deseja mesmo apagar?', 'Essa ação não pode ser desfeita.')">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </section>
        <?php $_SESSION['ultimo_id'] = $vendedor['id']; ?>
        <?php require_once 'App/Stucture/bannerVendedores.php' ?>
    </main>
    <footer>
        Feito por @SteveNarancic
    </footer>

    <!-- jquery -->
    <script src="node_modules/jquery/dist/jquery.min.js"></script>

    <!-- owl carousel -->
    <script src="assets/OwlCarousel/dist/owl.carousel.min.js"></script>
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

    <!-- sweetalert -->
    <script src="node_modules/sweetalert2/dist/sweetalert2.all.js"></script>
    <script>
        function alertButton(id, title, text) {
            Swal.fire({
                title: title,
                text: text,
                icon: 'warning',
                showConfirmButton: true,
                confirmButtonText: 'Sim',
                confirmButtonColor: '#78c696',
                showDenyButton: true,
                denyButtonText: 'Não',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "App/Controller/DeleteVendedor.php?id=" + id;
                } else if (result.isDenied) {}
            })
        }
    </script>

    <!-- statusCRUD -->
    <script src="assets/js/StatusCRUD.js"></script>
    <?php require_once 'App/Stucture/statusCRUD.php' ?>
</body>

</html>