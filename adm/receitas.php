<?php

    include_once('inc/classes.php');


    if (isset($_POST['btnExcluir'])) {
        $r = new Receita();
        $r->excluir($_POST['id_receita']);
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
    include_once('inc/js.php');?>
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
            <h1><i class="bi bi-egg"></i>Receitas
                <a class="btn btn-primary" href="receita-form.php">
                    Nova Receita
                </a>
            </h1>
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th class="col-md-1">Ações </th>
                            <th class="col-md-1">Categoria</th>
                            <th class="col-md-1">Data</th>
                            <th class="col-md-1">Título</th>
                            <th class="col-md-1">Foto</th>
                        </tr>
                        <tbody>
                            <?php
                             $r = new Receita();
                             $receitas = $r->listar();
                            foreach ($receitas as $receita) {
                             ?>
                            <tr>
                                <td class="col-md-1">
                                    <a class="btn btn-primary mr-1" href="receita-form.php?id=<?php echo $receita->id_receita;?>"><i class="bi bi-pencil"></i></a>
                                    <button class="btn btn-dark" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#modalExcluir" 
                                    data-bs-idreceita="<?php echo $receita->id_receita;?>">    
                                    <i class="bi bi-trash3"></i>
                                    </button>
                                    <a class="btn btn-success" href="descricao-da-receita.php?id=<?php echo $receita->id_receita;?>"><i class="bi bi-eye-fill"></i></a>
                                </td>
                                    <td class="col-md-1"><?php echo $r->nomeCategoria($receita->id_categoria);?></td>
                                    <td class="col-md-1"><?php echo Helper::dataBrasil($receita->dt);?></td>
                                    <td class="col-md-1"> <?php echo $receita->titulo;?></td>
                                    <td class="col-md-1 img-fluid"><img src="../img/<?php echo $receita->foto;?>" alt="" width="50% "></td>
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
                            <input type="hidden" name="id_receita" id="id_receita" value="">
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
            let idreceita = botao.data('bs-idreceita');
            $('#identificacao').text('receita N°'+idreceita);
            $('#modalExcluirLabel').text('receita N°'+idreceita);
            $('#id_receita').val(idreceita);
        })
    </script>
    <!-- /SCRIPT -->

    </div>

</body>
</html> 