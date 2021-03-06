<style>
    @media (max-width: 900px) {
        img {
            width: 8rem !important;
            height: 8rem !important;
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
                        <img class="rounded-circle float-end" src="<?php echo "assets/img/vendedores/" . $vendedor['imagem_perfil'] . ".jpg"; ?>" alt="Imagem Perfil" style="object-fit: cover;">
                    </div>
                    <div class="ms-3 me-3 col" style="text-align: justify;">
                        <h3>
                            <?= $vendedor['nome']; ?> <?= $vendedor['sobrenome']; ?>
                        </h3>
                        <a href="mailto:<?= $vendedor['email'] ?>" class="mb-2 text-muted" style="text-decoration: none;">
                            <?php echo $vendedor['email']; ?>
                        </a>
                        <div class="d-flex justify-content-start">
                            <a href="https://api.whatsapp.com/send?phone=<?php echo $vendedor['telefone1'] ?>" class='btn tooltip1'>
                                <i class='bi bi-whatsapp text-success fs-2'></i>
                                <span class="tooltiptext">
                                    <?= $vendedor['telefone1']; ?>
                                </span>
                            </a>
                            <?php
                            if ($vendedor['telefone2'] != "") {
                            ?>
                                <a href="https://api.whatsapp.com/send?phone=<?php echo $vendedor['telefone2'] ?>" class='btn tooltip1'>
                                    <i class='bi bi-whatsapp text-secondary fs-2'></i>
                                    <span class="tooltiptext">
                                        <?= $vendedor['telefone2']; ?>
                                    </span>
                                </a>
                            <?php
                            } else {
                            }
                            ?>
                            <a href='https://www.facebook.com/<?php echo $vendedor['facebook'] ?>/' class='btn tooltip1'>
                                <i class='bi bi-facebook text-primary fs-2'></i>
                                <span class="tooltiptext">
                                    <?= $vendedor['facebook']; ?>
                                </span>
                            </a>
                            <a href='https://www.instagram.com/<?php echo $vendedor['instagram'] ?>/' class='btn tooltip1'>
                                <i class='bi bi-instagram text-secondary fs-2'></i>
                                <span class="tooltiptext">
                                    <?= $vendedor['instagram']; ?>
                                </span>
                            </a>

                        </div>
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