<?php

    include_once('inc/classes.php')

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
           <?php include_once('inc/menu-adm.php'); ?>
    <!-- /Menu -->


    <!-- Principal -->
    <div class="row">
            <h1><i class="bi bi-person-fill"></i>Usuários
                <a class="btn btn-primary" href="cadastro-usuarios.php">Cadastrar Novo Usuário</a>
            </h1>
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th class="col-md-1">Ações</th>
                            <th class="col-md-1">Id Usuário</th>
                            <th class="col-md-1">Nome</th>
                            <th class="col-md-1">Email</th>
                        </tr>
                        <tbody>
                            <?php
                             $u = new Usuario();
                             $usuarios = $u->listar();
                            foreach ($usuarios as $usuario) {
                             ?>
                            <tr>
                                <td class="col-md-1">
                                    <a class="btn btn-primary mr-1" href="editar-usuarios.php?id="><i class="bi bi-pencil"></i></a>
                                    <a class="btn btn-dark" href="categoria-excluir.php?id="><i class="bi bi-trash3"></i></a>
                                    <a class="btn btn-success" href="descricao-da-receita.php?id="><i class="bi bi-eye-fill"></i></a>
                                </td>                              
                                    <td class="col-md-1"><?php echo $usuario->id_usuario;?></td>
                                    <td class="col-md-1"><?php echo $usuario->nome;?></td>
                                    <td class="col-md-1"><?php echo $usuario->email;?></td>
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

    </div>

</body>
</html>