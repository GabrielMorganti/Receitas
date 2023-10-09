<?php

    include_once('inc/classes.php');

    if(isset($_POST['btnCadastrar'])){
        $b = new Banner();
        $b->cadastrar($_FILES['banner'], $_POST['url']);
        header('location:Banners.php');
    }

    if(isset($_POST['btnExcluir'])){
        $b = new Banner();
        $b->excluir($_POST['id_banner']);
        header('location:Banners.php');
    }


// Verificar se um ID RECEiTA foi enviado para o GET
if(isset($_GET['id']) && $_GET['id'] != ''){
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

       
            <h1>
            <?php  

            if(isset($banner) && $banner != '')
            {
                echo 'Excluir';
                $formEdicao = true;
            }
            else{
                echo 'Cadastrar';
                $formEdicao = false;
            }
            ?>
            Banners <i class="bi bi-camera"></i>
            </h1>

                        <div class="row mt-3"></div>
            
            <form action="?" method="post" enctype="multipart/form-data">

            <!-- CAMPO OCULTO -->
                <?php 
                    if($formEdicao)
                    {
                ?>
                    <input type="hidden" name="id_banner" value="<?php echo $banner->id_banner;?>">
                    <input type="hidden" name="foto_atual" value="<?php echo $banner->banner;?>">
                <?php     
                    }
                ?>

            <!-- /CAMPO OCULTO -->
            
                <div class="row">

                        <div class="row mt-2"></div>

                        <div class="row">
                        <?php
                        if($formEdicao) 
                        {
                            if ($banner->banner != '')
                            {
                        ?>
                        <div class="col-md-6">
                            <img class="img-fluid receita_mini" src="../img/banner/<?php echo $banner->banner;?>"  width="60%" alt="">
                        </div>
                        <?php
                        }
                        }
                        ?>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="banner">Foto</label>
                            <input class="form-control" type="file" name="banner" name="banner" id="banner">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="url">URL do Banner</label>
                            <input class="form-control" type="url" name="url" value="<?php ($formEdicao)? print $banner->url: '' ;?>" id="url">          
                        </div>    
                        
                        <div class="row mt-2"></div>
                </div>

                <?php ;
                if($formEdicao){
                ?>
                    <input class="btn btn-warning mt-4" type="submit"
                    name="btnExcluir" id="btnExcluir"
                    value="Excluir Banner">
                <?php
                }else{

                ?>
                    <input class="btn btn-dark mt-4" type="submit"
                    name="btnCadastrar" id="btnCadastrar"
                    value="Cadastrar Banner">
                <?php
                }
                ?>
                

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