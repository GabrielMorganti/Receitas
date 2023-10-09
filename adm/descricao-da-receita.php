
<?php
include_once('inc/classes.php');

if(isset($_GET['id']) && $_GET['id'] != ''){
    $objR = new Receita();
    $receita = $objR->mostrar($_GET['id']);
}
else{
    header('location:receitas.php');
}


 if(isset($receita) && $receita != '')
{
    $formEdicao = true;
}
else{
    $formEdicao = false;
}

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- JS / CSS -->
    <?php include_once('inc/css.php'); ?>
    <?php include_once('inc/js.php'); ?>
    <!-- / JS / CSS -->

    <title>Area Administrativa |<?php echo $receita->titulo;?></title>
</head>

<body>
    <div class="container">

        <!-- MENU -->
        <?php include_once('inc/menu-adm.php'); ?>
        <!--/ MENU -->

        <div class="row mt-3"></div>


        <div class="row mt-5"></div>
        
        <!-- CONTEUDO -->
    
        <div class="row">
            <div class="col-md-6">
            <h1><?php echo $receita->titulo;?></h1>
            </div>

            <div class="col-md-6">
                <h1>Descrição</h1>
                <?php ($formEdicao)? print $receita->descricao : '' ;?>
            </div>
        </div>

        <div class="row">
            <?php 
                if ($receita->foto != '')
                {
            ?>
            <div class="col-md-6">
                 <img class="img-fluid receita_mini" src="../img/<?php echo $receita->foto;?>"  width="60%" alt="">
            </div>
            <?php
            }
            ?>
        </div>   

        <div class="row mt-3"></div>

            <input type="hidden" name="Gabriel Morganti">

        <div class="row">
            <div class="col-md-6">
            <h2>Ingredientes</h2>
       <ul>
        <li><?php ($formEdicao)? print $receita->ingredientes : '' ;?></li> 
        </ul>
            </div>
            
        </div>

        <div class="row mt-4">  
            
            <div class="col-md-6">
                <h2>Modo de Preparo</h2>
                <ol>
                    <?php ($formEdicao)? print $receita->modo_fazer : '' ;?>
                </ol>
            </div>
            <div class="col-md-6">
                <h2>Vídeo da Receita</h2>
                <iframe width="100%" height="315" src="<?php ($formEdicao)? print $receita->video: '' ;?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
        </div>

        <div class="row mt-5">  

        <div class="row">
            <H1>SUGESTÕES</H1>
        </div>

        <div class="row mt-3"> 

        <div class="row">
            <div class="col-md-6">
            </div>
        </div>
        <!-- /CONTEUDO -->
        
        <!-- RODAPE -->
        <?php include_once('inc/rodape.php');?>
        <!-- /RODAPE -->
    </div>
</body>
</html>

