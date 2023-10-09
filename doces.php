<?php
include_once('inc/classes.php');

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

    <title>Receitas</title>
</head>

<body>
    <div class="container">

        <!-- TOPO -->
        <?php include_once('inc/topo.php');?>
        <!-- /TOPO -->

        <div class="row mt-3"></div>

        <!-- MENU -->
        <?php include_once('inc/menu.php');?>
        <!--/ MENU -->
        
         <!-- BANNER -->
         <?php include_once('inc/banner.php');?>
        <!-- /BANNER -->

        <!-- CONTEUDO -->
        <div class="row text-center">
        <H1><i class="fa-solid fa-candy-cane"></i> DOCES</H1>
        </div>
        <?php
                    $objReceita = new Receita();
                    $receitas = $objReceita->mostrareceita($_GET['id']);
                    foreach ($receitas as $receita) {
        ?>
            <div class="row mt-2 border-top border-1 p-2">
                <div class="col-sm-2 col-3"> <img class="img-fluid" src="img/<?php echo $receita->foto; ?>" alt="Foto Receita" width="100%"> </div>
                <div class="col-sm-8 col-6 p-2 pl-5 text-start"><?php echo $receita->titulo; ?></div>
                <div class="col-sm-2 col-3 p-2"> <a href="descricao-da-receita.php?id=<?php echo $receita->id_receita;?>" target="_self">Ver</a></div>
            </div>   
        <?php
        }
        ?>
        
        <!-- /CONTEUDO -->

        <!-- RODAPE -->
        <?php include_once('inc/rodape.php');?>
        <!-- /RODAPE -->
    </div>
</body>

</html>