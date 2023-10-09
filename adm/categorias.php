<?php

include_once('inc/classes.php');

if (isset($_POST['btnCadastrar'])) {
    $cat = new Categoria();
    $cat->cadastrar($_POST);
    header('location:?ok');
}

if (isset($_POST['btnExcluir'])) {
    $cat = new Categoria();
    $cat->excluir($_POST['id_categoria']);
    header('location:?e');
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
            <h1><i class="bi bi-justify"></i>Categorias</h1>
            <!-- Formulario -->
            <form action="?" method="post" class="border">
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label mt-3" for="categoria">Categoria</label>
                        <input type="text" class="form-control mb-4" name="categoria" id="categoria" value="" required>
                    </div>

                    <div class="col-md-2">
                        <input class="btn btn-dark mt-5" name="btnCadastrar" id="btnCadastrar" type="submit" value="Cadastrar">
                    </div>

                </div>
            </form>

            <div class="row mt-4"></div>

            <!-- /Formulario -->
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th class="col-md-1">Ações</th>
                        <th class="col-md-1">ID</th>
                        <th>Categoria</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $objCategoria = new Categoria();
                    $categorias = $objCategoria->listar();
                    foreach ($categorias as $categoria) {
                    ?>
                        <tr>
                            <td class="col-md-1">
                                <a class="btn btn-primary mr-1" href="categoria-editar.php?id=<?php echo $categoria->id_categoria; ?>"><i class="bi bi-pencil"></i></a>
                                <button class="btn btn-danger" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#modalExcluir" 
                                    data-bs-idcategoria="<?php echo $categoria->id_categoria;?>">    
                                <i class="bi bi-trash3"></i>
                                </button>
                        </td>
                            <td class="col-md-1"><?php echo $categoria->id_categoria; ?></td>
                            <td class="col-md-1"><?php echo $categoria->categoria; ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <!-- /Principal -->


        <!-- Rodape -->
        <div class="row">
            Rodapé
        </div>
        <!-- /Rodape -->

    </div>

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
                            <input type="hidden" name="id_categoria" id="id_categoria" value="">
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
            let idcategoria = botao.data('bs-idcategoria');
            $('#identificacao').text('Categoria N°'+idcategoria);
            $('#modalExcluirLabel').text('Categoria N°'+idcategoria);
            $('#id_categoria').val(idcategoria);
        })
    </script>
    <!-- /SCRIPT -->

</body>

</html>