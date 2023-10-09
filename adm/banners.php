<?php

include_once('inc/classes.php');

if (isset($_POST['btnCadastrar'])) {
    $b = new Banner();
    $b->cadastrar($_FILES['banner'], $_POST['url']);
    header('location:Banners.php');
}

if (isset($_POST['btnExcluir'])) {
    $b = new Banner();
    $b->excluir($_POST['id_banner']);
    header('location:?e');
}


// Verificar se um ID RECEiTA foi enviado para o GET
if (isset($_GET['id']) && $_GET['id'] != '') {
    $objB = new Banner();
    $banner = $objB->visualizar($_GET['id']);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área administrativa</title>

    <!-- CSS / JS -->
    <?PHP
    include_once('inc/css.php');
    include_once('inc/js.php'); ?>
    <!-- / CSS / JS -->
</head>

<body>

    <div class="container">
        <!-- Menu -->
        <div class="row">
            <?php include_once('inc/menu-adm.php'); ?>
        </div>
        <!-- /Menu -->


        <!-- Principal -->
        <div class="row">
            <h1><i class="bi bi-camera"></i></i>Banners
            </h1>

            <div class="row mt-3"></div>

            <form action="?" method="post" enctype="multipart/form-data" class="border">
                <div class="row mt-3"></div>
                <div class="row">
                    <div class="col-md-6">
                            <label class="form-label" for="banner">Foto</label>
                            <input class="form-control" type="file" name="banner" name="banner" id="banner" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="url">URL do Banner</label>
                        <input class="form-control" type="url" name="url" value="" id="url">
                    </div>

                    <div class="row">
                        <div class="col-md-12 text-end">
                            <input class="btn btn-primary mt-4" type="submit" name="btnCadastrar" id="btnCadastrar" value="Cadastrar Banner">
                        </div>
                        <div class="row mt-3"></div>
                    </div>
                </div>
            </form>

            <div class="row mt-5"></div>
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th class="col-md-1">Ações </th>
                        <th class="col-md-4">ID Banner</th>
                        <th class="col-md-4">Foto</th>
                    </tr>
                <tbody>
                    <?php
                    $b = new Banner();
                    $banner = $b->listar();
                    foreach ($banner as $banner) {
                    ?>
                        <tr>
                            <td class="col-md-1">
                                <button class="btn btn-dark" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#modalExcluir" 
                                    data-bs-idbanner="<?php echo $banner->id_banner;?>">    
                                <i class="bi bi-trash3"></i>
                                </button>
                                <a class="btn btn-success" href="banner-form.php?id=<?php echo $banner->id_banner; ?>"><i class="bi bi-eye-fill"></i></a>
                            </td>
                            <td class="col-md-1"><?php echo $banner->id_banner; ?></td>
                            <td class="col-md-1 img-fluid"><img src="../img/banner/<?php echo $banner->banner; ?>" alt="" width="80% "></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
                </thead>


            </table>
        </div>
        <!-- /Principal -->


        <!-- Rodape -->
        <div class="row">
            Rodapé
        </div>
        <!-- /Rodape -->

        <!-- EXCLUIR -->
    <div class="modal fade" id="modalExcluir" tabindex="-1" aria-labelledby="modalExcluirLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalExcluirLabel">New message</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <div class="modal-body">
                    <p class="text-bold" id="identificacao"></p>
                    <p>Deseja realmente realizar essa operação? 
                        <br>
                        A operação não podera ser desfeita.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Não</button>
                        <form action="?" method="post">
                            <input type="hidden" name="id_banner" id="id_banner" value="">
                            <input type="submit" class="btn btn-success" value="Sim, Excluir." name="btnExcluir" id="btnExcluir">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /EXCLUIR -->

     <!-- SCRIPT -->
     <script>
        $('#modalExcluir').on('show.bs.modal', function(event){
            let botao = $(event.relatedTarget);
            let idbanner = botao.data('bs-idbanner');
            $('#identificacao').text('banner N°'+idbanner);
            $('#modalExcluirLabel').text('banner N°'+idbanner);
            $('#id_banner').val(idbanner);
        })
    </script>
    <!-- /SCRIPT -->

    </div>

</body>

</html>