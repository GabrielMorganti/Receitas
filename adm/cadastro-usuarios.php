<?php

    include_once('inc/classes.php');

    if(isset($_POST['btnCadastrar'])){
        $users = new Usuario();
        $users->cadastrar($_POST);
        header('location:base.php');
    }

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuários</title>

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
            <h1>Cadastrar Usuário</h1>

            <form action="?" method="post" enctype="multipart/form-data">

            <!-- CAMPO OCULTO -->

            <!-- /CAMPO OCULTO -->
            
                <div class="row">
                        <div class="col-md-6">
                            <label class="form-label" for="nome">Nome Completo</label>
                            <input class="form-control" type="text" name="nome" value="" id="nome">          
                        </div>

                        <div class="row mt-2"></div>

                        <div class="col-md-6">
                            <label class="form-label" for="video">Email</label>
                            <input class="form-control" type="email" name="email" value="" id="email">          
                        </div>    
                        
                        <div class="row mt-2"></div>

                        <div class="col-md-4">
                            <label class="form-label" for="senha">Senha</label>
                            <input class="form-control" type="password" name="senha" value="" id="senha">          
                        </div>

                    <div class="row">
                        <div class="col-md-4">
                            <label class="form-label" for="senha">Confirmar Senha</label>
                            <input class="form-control" type="password" name="senha" value="" id="senha">          
                        </div>
                    </div>
                    
                </div>

                    <input class="btn btn-dark mt-4" type="submit"
                    name="btnCadastrar" id="btnCadastrar"
                    value="Cadastrar Usuário">
                

            </form>
        </div>
    <!-- /Principal -->

    <div class="row mt-5"></div>                                              

    <!-- Rodape -->
        <div class="row">
            Rodapé  
        </div>
    <!-- /Rodape -->

    </div>

</body>
</html>