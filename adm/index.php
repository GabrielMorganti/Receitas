<?php

    include_once('inc/classes.php');

    $Usuario = new Usuario();

    if(isset($_POST['btnLogar']))
    {
        $u = $Usuario->logar($_POST['email'], $_POST['senha']);


        if($u)
        {
            header('location:receitas.php');
        }
        else 
        {
            header('location:?e');
        }
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

    <!-- Principal -->
    <div class="row">
    <div class="offset-md-4 col-md-4 p-4"><h1>ÁREA RESTRITA</h1></div>
            <div class="offset-md-4 col-md-4 border border-dark p-4">
                <form action="?" method="post">
                    <div class="col-12 mt-2">
                        <label for="email" class="form-label fw-bold">
                            E-mail*
                        </label>
                        <input type="email" class="form-control" name="email" id="email" required>
                    </div>
                    <div class="col-12 mt-2">
                        <label for="senha" class="form-label fw-bold">
                            Senha* 
                        </label>
                        <input type="password" class="form-control" name="senha" id="senha" required>
                    </div>
                
                <div class="row mt-3">

                    <div class="col-md-6">
                        <a href="#">
                            Esqueci minha senha.
                        </a>
                    </div>
                    <div class="col-md-6 text-center">
                        <input type="submit" class="btn btn-warning fw-bold" name="btnLogar" id="btnLogar" value="Logar">
                    </div>
                </div>

                <div class="row mt-3"></div>

                <?php
                if(isset($_GET['e'])){
                ?>

                <div class="alert alert-danger" >
                    Usuário ou Senha Incorretos
                </div>

                <?php
                }
                ?>

                </form>
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