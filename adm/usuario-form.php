<?php
    include_once('inc/classes.php');

    if (isset($_POST['btnCadastrar'])) {

        $u = new Usuario();
        $u->cadastrar($_POST);
        header('location:usuarios.php');
    }

    if (isset($_POST['btnEditar'])) {
        $u = new Usuario();
        $u->editar($_POST, $_POST['id_usuario']);
        header('location:usuarios.php');
    }

    // Verificar se um ID foi enviado por GET
    if (isset($_GET['id']) && $_GET['id'] != '') {
        $objUsuario = new Usuario();
        $usuario = $objUsuario->mostrar($_GET['id']);
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
                <?php
                if (isset($usuario) && $usuario != '') {
                    echo 'Editar ';
                    $formEdicao = true;
                } else {
                    echo 'Cadastrar ';
                    $formEdicao = false;
                }
                ?>
                <i class="fa-solid fa-user"></i>
                Usuário
            </h1>

            <form action="?" method="post" enctype="multipart/form-data">
                <!-- campos ocultos -->
                <?php
                if ($formEdicao) {
                ?>
                    <input type="hidden" name="id_usuario" value="<?php echo $usuario->id_usuario; ?>">
                <?php
                }
                ?>
                <!-- /campos ocultos -->
                <div class="row">
                    <div class="col-md-12">
                        <label class="form-label" for="nome">Nome*</label>
                        <input class="form-control" type="text" name="nome" id="nome" 
                        placeholder="Ex.: Pedro de Alcântara Francisco Antônio" 
                        value="<?php ($formEdicao) ? print $usuario->nome : ''; ?>" 
                        required>
                    </div>

                    <div class="col-md-12">
                        <label class="form-label" for="email">E-mail*</label>
                        <input class="form-control" type="email" 
                        name="email" id="email" 
                        value="<?php ($formEdicao) ? print $usuario->email : ''; ?>"
                        required>
                    </div>

                     <?php
                      if (! $formEdicao) {
                     ?>
                    <div class="col-md-6 mt-2 mb-2">
                        <label class="form-label" for="senha">Senha*</label>
                        <input class="form-control" type="password" name="senha" id="senha"
                        minlength="4"
                        required>
                    </div>
                    <div class="col-md-6 mt-2 mb-2">
                        <label class="form-label" for="confirma_senha">Confirma Senha</label>
                        <input class="form-control" type="password" name="confirma_senha" id="confirma_senha"
                        minlength="4"
                        required>
                    </div>
                    
                    <!-- ALERTA DE SENHAS -->
                    
                    <div class="alert alert-danger" role="alert" id="alertaSenhas" style="display:none">
                        As Duas Senhas Devem Ser Iguais
                    </div>
                    <!-- /ALERTA DE SENHAS -->
                    

                    <?php 
                      }
                    ?>

                </div>

                <?php
                if ($formEdicao) {
                ?>
                    <input class="btn btn-primary mt-3" type="submit" name="btnEditar" id="btnEditar" value="Editar Usuário">
                <?php
                } else {
                ?>
                    <input 
                    class="btn btn-success mt-3" 
                    type="submit" 
                    name="btnCadastrar" 
                    id="btnCadastrar" 
                    value="Cadastrar Usuário" 
                    disabled>
                <?php
                }
                ?>


            </form>

        </div>
        <!-- /PRINCIPAL -->
        <!-- RODAPE -->
        <div class="row">
            rodapé
        </div>
        <!-- /RODAPE -->
    </div>

</body>

<!-- JAVA SCRIPT -->
<script>
    
    $('#nome').blur(function (e) { 
        e.preventDefault();
        
        let nome = $(this).val();
        $(this).val(nome.toUpperCase().trim());

    });

    $('#email').blur(function (e) { 
        e.preventDefault();
        
        let email = $(this).val();
        $(this).val(email.toLowerCase().trim());
    });

    $('#confirma_senha').blur(function (e) { 
        e.preventDefault();

        let senha = $('#senha').val();
        let confirma = $(this).val();

        console.log(senha);
        console.log(confirma);

        if (senha == confirma) {
            $('#btnCadastrar').removeAttr('disabled');
            $('#alertaSenhas').hide();
        } else {
            console.log('Deu RUIM...')
            $(this).val('');
            $(this).focus();
            $('#btnCadastrar').attr('disabled','disabled');
            $('#alertaSenhas').show();
        }
        
    });
</script>
<!-- /JAVA SCRIPT -->

</html>