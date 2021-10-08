<style>
    @media (max-width: 900px) {
        img {
            width: 5rem !important;
            height: 5rem !important;
        }
    }

    @media (min-width: 900px) {
        img {
            width: 13rem !important;
            height: 13rem !important;
            margin-inline-end: 1rem !important;
        }
    }
</style>
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
                        <img class="rounded-circle float-end" src="assets/img/vendedores/profile.png" alt="Imagem">
                    </div>
                    <div class="ms-3 col" style="text-align: justify;">
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