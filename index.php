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
        <?php include_once('inc/menu.php'); ?>
        <!-- /MENU -->

        <!-- BANNER -->
        <?php include_once('inc/banner.php'); ?>
        <!-- /BANNER -->

        <!-- CONTEUDO -->

        <div class="row mt-5"></div>

        <!-- ############## O QUE FAZEMOS ############# -->
        <div class="row text-center mt-4 md-4">
            <h2>O que fazemos</h2>
            <h3>Venha provar nossas delícias</h3>
        </div>

        <div class="row mt-5"></div>
        <div class="row mt-2"></div>

        <div class="row text-center oquefazemos">
                <div class="col-sm-3 col-xs-6">
                    <img src="img/icone-doces.png" alt="Doces" class="img-fluid">
                    <h4>Doces</h4>
                    <p>Doces Tradicionais e receitas secretas</p>
                </div>

                <div class="col-sm-3 col-xs-6">
                    <img src="img/icone-bolos.png" alt="Bolos" class="img-fluid">
                    <h4>Bolos</h4>
                    <p>Caseiros ou profissionais, sempre uma delícia</p>
                </div>

                <div class="col-sm-3 col-xs-6">
                    <img src="img/icone-sucos.png" alt="Sucos" class="img-fluid">
                    <h4>Sucos</h4>
                    <p>Naturais com as mais diversas frutas.</p>
                </div>

                <div class="col-sm-3 col-xs-6">
                    <img src="img/icone-pratos-quentes.png" alt="Pratos Quentes" class="img-fluid">
                    <h4>Pratos Quentes</h4>
                    <p>Nossas receitas vão te surpreender</p>
                </div>
        </div>
        <!-- ############## /O QUE FAZEMOS ############# -->

        <div class="row mt-5"></div>

        <!-- ################# DICAS ################ -->
        <div class="row text-center mt-4">
                <h2>Dicas de Receitas</h2>
            </div>
        <div class="row dicas mt-3">
                            <?php
                             $r = new Receita();
                             $receitas = $r->listar();
                            foreach ($receitas as $receita) {
                             ?>
                                <div class="col-sm-4 card" style="padding: 3%;">
                                    <img class="card card-img-top" src="./img/<?php echo $receita->foto;?>" alt=""> 
                                    <h2><?php echo $receita->titulo;?></h2>
                                    <p><?php echo $receita->descricao;?></p>
                                </div>            
                            <?php
                            }
                            ?>
        </div>
        <!-- ################# /DICAS ################ -->

        <div class="row mt-5"></div>

        <!-- /CONTEUDO -->

        <!-- RODAPE -->
        <?php include_once('inc/rodape.php');?>
        <!-- /RODAPE -->

    </div>
</body>

</html>