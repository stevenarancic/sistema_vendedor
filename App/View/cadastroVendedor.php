<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <link rel="stylesheet" href="../../assets/css/style.css">

    <title>Cadastro de Vendedor</title>
</head>

<body>
    <header class="bg-light">
        <div class="container">
            <h1>
                Cadastro de Vendedor
            </h1>
        </div>
    </header>
    <main>
        <section class="article container">
            <form action="../Controller/CreateVendedor.php" method="POST" enctype="multipart/form-data">
                <div class="form-floating mb-3 mt-4">
                    <input type="text" name="nome" class="form-control" placeholder="ex: Carlos" id="inputNome" required>
                    <label for="inputNome">
                        Nome <i class="bi bi-person"></i>
                    </label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="sobrenome" class="form-control" placeholder="ex: Oliveira" required>
                    <label for="">
                        Sobrenome <i class="bi bi-person"></i>
                    </label>
                </div>
                <div class="form-floating mb-3">
                    <input type="tel" name="telefone1" class="form-control" placeholder="(99) 99999-9999" maxlength="11" required pattern="[0-9]+$">
                    <label for="">
                        Telefone <i class="bi bi-phone"></i>
                    </label>
                </div>
                <div class="form-floating mb-3">
                    <input type="tel" name="telefone2" class="form-control" placeholder="(99) 99999-9999" maxlength="11" pattern="[0-9]+$">
                    <label for="">
                        Telefone 2 (opcional) <i class="bi bi-telephone"></i>
                    </label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" name="email" class="form-control" placeholder="exemplo@exemplo.com.br"> <label for="">
                        E-Mail <i class="bi bi-envelope"></i>
                    </label>
                    <div id="emailHelp" class="form-text">N??o compartilharemos seu e-mail com ningu??m.</div>
                </div>
                <div class="mb-3">
                    <label for="">
                        Facebook <i class="bi bi-facebook"></i>
                    </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1">
                            @
                        </span>
                        <input type="text" name="facebook" class="form-control" placeholder="nome.de.usuario11">
                    </div>
                </div>
                <div class=" mb-3">
                    <label for="">
                        Instagram <i class="bi bi-instagram"></i>
                    </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1">
                            @
                        </span>
                        <input type="text" name="instagram" class="form-control" placeholder="nome_de.usuario123">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Imagem de Perfil</label>
                    <input class="form-control" type="file" name="arquivo">
                </div>
                <button type="submit" class="btn btn-primary">Cadastrar</button>
                <a href="../../index.php" class="btn">Cancelar</a>
            </form>
            <footer>
                Feito por @SteveNarancic
            </footer>
        </section>
    </main>
</body>

</html>