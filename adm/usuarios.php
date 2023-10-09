<?php
include_once('inc/classes.php');

if (isset($_POST['btnExcluir'])) {
    $u = new Usuario();
    $u->excluir($_POST['id_usuario']);
    header('location:?e');
}

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área Administrativa</title>
    <!-- CSS/ JS -->
    <?php
    include_once('inc/css.php');
    include_once('inc/js.php');
    ?>
    <!-- /CSS/ JS -->


</head>

<body>
    <div class="container">
        <!-- MENU -->
        <?php include_once('inc/menu-adm.php'); ?>
        <!-- /MENU -->
        <!-- PRINCIPAL -->
        <div class="row">
            <h1>
                <i class="fa-solid fa-user"></i>
                Usuários -
                <a class="btn btn-primary" href="usuario-form.php">
                    Novo Usuário
                </a>
            </h1>
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th class="col-md-2">Ações</th>
                        <th class="col-md-1">ID</th>
                        <th>Nome</th>
                        <th>E-mail</th>                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $u = new Usuario();
                    $usuarios = $u->listar();
                    foreach ($usuarios as $usuario) {

                    ?>
                        <tr>
                            <td>
                                <div class="flex-row">
                                    <!-- mostrar --> 
                                    <!-- editar -->
                                    <a class="btn btn-primary mr-1" href="usuario-form.php?id=<?php echo $usuario->id_usuario; ?>">
                                    <i class="bi bi-pencil"></i>
                                    </a>
                                    <!-- excluir -->
                                    <button class="btn btn-dark" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#modalExcluir" 
                                    data-bs-idusuario="<?php echo $usuario->id_usuario;?>">    
                                    <i class="bi bi-trash3"></i>
                                    </button>
                                    <a class="btn btn-success " href="usuario-show.php?id=<?php echo $usuario->id_usuario; ?>">
                                        <i class="bi bi-eye-fill"></i>
                                    </a>   


                                </div>
                            </td>
                            <td><?php echo $usuario->id_usuario;?></td>
                            <td><?php echo $usuario->nome; ?></td>
                            <td><?php echo $usuario ->email; ?>                            
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <!-- /PRINCIPAL -->
        <!-- RODAPE -->
        <div class="row">
            rodapé
        </div>
        <!-- /RODAPE -->

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
                            <input type="hidden" name="id_usuario" id="id_usuario" value="">
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
            let idusuario = botao.data('bs-idusuario');
            $('#identificacao').text('usuario N°'+idusuario);
            $('#modalExcluirLabel').text('usuario N°'+idusuario);
            $('#id_usuario').val(idusuario);
        })
    </script>
    <!-- /SCRIPT -->
    </div>




</body>

</html>